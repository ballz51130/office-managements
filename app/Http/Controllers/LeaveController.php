<?php

namespace App\Http\Controllers;
use auth;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Models\leave;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Models\departmentModel;
use App\Models\positionModel;
use App\Exports\LeaveExport;

// use Excel;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Events\AfterSheet;
// use Maatwebsite\Excel\Concerns\WithEvents;
use Rap2hpoutre\FastExcel\FastExcel;
use Box\Spout\Writer\Style\StyleBuilder;
use PDF;
class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {

        // dd( 'this users' );

        ## get users form model
        $sth = leave::select('*','leaves.id as id','departments.name as departments','positions.name as positions','leaves.status as status','leaves.date as date')
        ->leftjoin('users',"users.id","=","leaves.user_id")
        ->leftjoin('leaves_types',"leaves_types.id","=","leaves.leave_id")
        ->leftjoin('departments',"departments.id","=","users.dep_id")
        ->leftjoin('positions',"positions.id","=","users.pos_id");
        $positions = positionModel::get();
        $departments = departmentModel::get();
        $months = leave::select(leave::raw("MONTH(leaves.date) as month"),'date')
        ->groupBy('Month')->get();
        $years = leave::select(leave::raw("YEAR(leaves.date) as year"),'date')
        ->groupBy('year')->get();
        if( !empty($request->search) ){
            $keyword = $request->search;
            $sth->where(function ($query) use ($keyword)
            {
            $query->where('users.name', 'like', '%' . $keyword . '%')
                  ->orwhere('departments.name', 'like', '%' . $keyword . '%')
                  ->orwhere('positions.name', 'like', '%' . $keyword . '%')
                  ->orwhere('leaves_types.topic', 'like', '%' . $keyword . '%')
                  ->orwhere('leaves.status', 'like', '%' . $keyword . '%');
               
            });
        }
        if($request->department && $request->position  && $request->date != '' ){
            $sth->where('positions.name', '=', $request->position)
                ->where('departments.name', '=', $request->department)
                ->where('date', '=', $request->date);
        }
        elseif($request->department && $request->date != '' ){
            $sth->where('date', '=', $request->date)
                ->where('departments.name', '=', $request->department);  
        }
        elseif($request->position && $request->date != '' ){
            $sth->where('positions.name', '=', $request->position)
                ->where('date', '=', $request->date); 
        }
        elseif($request->department && $request->position != '' ){
            $sth->where('positions.name', '=', $request->position)
                ->where('departments.name', '=', $request->department);  
        }
        elseif ($request->department != ''  ){
            $sth->where('departments.name', '=', $request->department);
            
        }
        elseif ($request->position != '' ){
            $sth->where('positions.name', '=', $request->position);
            
        }
        elseif ($request->date != '' ){
            $sth->where('date', '=', $request->date);
            
        }
        $leaves = $sth->orderby('leaves.created_at', 'desc')->paginate( 15 );

        return view('leave.index', compact('leaves','positions','departments','months','years'));
    }

    public function waitcheck()
    {
        $positions = positionModel::get();
        $departments = departmentModel::get();
        $months = leave::select(leave::raw("MONTH(leaves.date) as month"),'date')
        ->groupBy('Month')->get();
        $years = leave::select(leave::raw("YEAR(leaves.date) as year"),'date')
        ->groupBy('year')->get();
        $sth = leave::select('*');
        $sth->where('status','=','รออนุมัติ');
        $leaves = $sth->orderby('created_at', 'desc')->paginate( 15 );
        return view('leave.index', compact('leaves','positions','departments','months','years'));
      
    }
    public function active()
    {
        $positions = positionModel::get();
        $departments = departmentModel::get();
        $months = leave::select(leave::raw("MONTH(leaves.date) as month"),'date')
        ->groupBy('Month')->get();
        $years = leave::select(leave::raw("YEAR(leaves.date) as year"),'date')
        ->groupBy('year')->get();
        $sth = leave::select('*');
        $sth->where('status','=','ผ่านการอนุมัติ');
        $leaves = $sth->orderby('created_at', 'desc')->paginate( 15 );
        return view('leave.index', compact('leaves','positions','departments','months','years'));
    }
    public function notactive()
    {
        $positions = positionModel::get();
        $departments = departmentModel::get();
        $months = leave::select(leave::raw("MONTH(leaves.date) as month"),'date')
        ->groupBy('Month')->get();
        $years = leave::select(leave::raw("YEAR(leaves.date) as year"),'date')
        ->groupBy('year')->get();
        $sth = leave::select('*');
        $sth->where('status','=','ไม่ผ่านการอนุมัติ');
        $leaves = $sth->orderby('created_at', 'desc')->paginate( 15 );
        return view('leave.index', compact('leaves','positions','departments','months','years'));
      
    }
    public function cancelled()
    {
        $data = DB::table('leaves')
        ->select('leaves.id as id','date','topic','days','status','user_id','reason')
        ->join('leaves_types',"leaves_types.id","=","leaves.leave_id")
        ->where('user_id','1')
        ->where('status', '=', 'ยกเลิกคำขอ')
        ->paginate(5);

    return view('leave.user.index')->with(["data"=>$data]);
    }
    public function detail(leave $leave)
    {
       $users = leave::select('leaves.user_id',"departments.name as department","positions.name as position")
        ->leftjoin('users',"users.id","=","leaves.user_id")
        ->leftjoin('departments',"departments.id","=","users.dep_id")
        ->leftjoin('positions',"positions.id","=","users.pos_id")
        ->where('leaves.id',$leave->id)
        ->get();
        return view('leave.detail',compact('leave','users'));
    }
    public function detailupdate(Request $request, $id)
    {
        $data = leave::findOrFail( $id );
        $data->fill([
            'status'=>$request->status,
            'reason'=>$request->reason,
          ]);
         $data->update();
        return redirect()->route('leave')->with('success', 'บันทึกข้อมูลสำเร็จ',5);
    }
    public function report()
    {
       
        $data1 = leave::select('status',)
        ->where('leaves.status','รออนุมัติ')
        ->count('leaves.status');
        $data2 = leave::select('status',)
        ->where('leaves.status','ผ่านการอนุมัติ')
        ->count('leaves.status');
        $data3 = leave::select('status',)
        ->where('leaves.status','ไม่ผ่านการอนุมัติ')
        ->count('leaves.status');
        $count = leave::select('status',)
        ->count('leaves.status');
        return view('leave.report',compact('count','data1','data2','data3'));
    }
    public function history()
    {
        return view('leave.history');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('leave.leave');
    }

    // page user
    public function userindex()
    {

      $data = DB::table('leaves')
      ->select('leaves.id as id','date','topic','days','status','user_id','reason')
      ->join('leaves_types',"leaves_types.id","=","leaves.leave_id")
      ->where('user_id',1)
      ->orderByRaw( "FIELD(status,'รออนุมัติ', 'ผ่านการอนุมัติ', 'ไม่ผ่านการอนุมัติ', 'ยกเลิกคำขอ')" )
      ->paginate(7);

    return view('leave.user.index')->with(["data"=>$data]);
    }
    public function usercreate( User $user)
    {
        //
        $leave_type = DB::table('leaves_types')->get();

        // $users = DB::table('users')
        // ->select("*","users.id as id",)
        // ->leftjoin('departments',"departments.id","=","users.department")
        // ->leftjoin('positions',"positions.id","=","users.position")
        // ->where('users.id','1')
        // ->get();
        return view('leave.user.create', compact('user','leave_type') );

    }
    public function useredit($id)
    {
        //
        $data = leave::find($id);
        return view('leave.user.edit')->with(["data"=>$data]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'leave_id' => 'required',
            'write_at' => 'required',
            'date' => 'required',
            'leave_title' => 'required',
            'dear' => 'required',
            'detail' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'days' => 'required|numeric',
            'communication' => 'required|numeric',

        ],[
            'write_at.required'=>'กรุณากรอกสถานที่เขียนใบลา',
            'leave_id.required'=>'กรุณาเลือกประเภทการลา',
            'date.required'=>'กรุณาเลือกวันที่กรอกใบลา',
            'leave_title.required'=>'กรุณากรอกเรื่องที่ขอลา',
            'dear.required'=>'กรุณากรอกชื่อผู้จัดการบริษัท',
            'detail.required'=>'กรุณากรอกรายละเอียดการลา',
            'start_date.required'=>'กรุณาเลือกวันเริ่มต้นของการลา',
            'end_date.required'=>'กรุณาเลือกวันสิ้นสุดการลา',
            'days.required'=>'กรุณากรอกจำนวนวัน',
            'days.numeric'=>'จำนวนวันต้องกรอกเป็นตัวเลข 0-9 เท่านั้น',
            'comunication.required'=>'กรุณากรอกเบอร์ติดต่อ',
            'comunication.numeric'=>'เบอร์ติดต่อต้องกรอกเป็นตัวเลข 0-9 เท่านั้น',
        ]);
        $data = new leave();
        if( $data ->fill( $request->input(), $data->status = 'รออนุมัติ' )->save() ){
            if($request->has('document')){
               $data->document = $request->file('document')->store('leave','public');
              }
            $data ->update();
            return redirect()->to('/leave/user/'.'1')->with('success', 'บันทึกข้อมูลสำเร็จ',5);
        }
        else{
            return redirect()->route('user.create')
                ->withErrors([
                    'message' => 'เกิดข้อผิดผลาด, กรุณาลองใหม่',
                ])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if($request->status != 'ผ่านการอนุมัติ')
        {
            $data = leave::findOrFail( $id );

        $data->fill([
            'status'=>'รออนุมัติ',

          ]);
         $data->update();
         return redirect()->to('/leave/user/'.'1')->with('success', 'บันทึกข้อมูลสำเร็จ',5);
        }
        else
        {
            return redirect()->to('/leave/user/'.'1')->with('info', 'ไม่สามารถแก้ไขข้อมูลได้เนื่องจากได้รับการอนุมัติแล้ว',5);
        }
        $request->validate([
            'leave_id' => 'required',
            'write_at' => 'required',
            'date' => 'required',
            'leave_title' => 'required',
            'dear' => 'required',
            'detail' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'days' => 'required',
            'communication' => 'required',


        ],[
            'write_at.required'=>'กรุณากรอกสถานที่เขียนใบลา',
            'leave_id.required'=>'กรุณาเลือกประเภทการลา',
            'date.required'=>'กรุณาเลือกวันที่กรอกใบลา',
            'leave_title.required'=>'กรุณากรอกเรื่องที่ขอลา',
            'dear.required'=>'กรุณากรอกชื่อผู้จัดการบริษัท',
            'detail.required'=>'กรุณากรอกรายละเอียดการลา',
            'start_date.required'=>'กรุณาเลือกวันเริ่มต้นของการลา',
            'end_date.required'=>'กรุณาเลือกวันสิ้นสุดการลา',
            'days.required'=>'กรุณากรอกจำนวนวัน',
            'days.numeric'=>'กรุณากรอกจำนวนวันเป็นตัวเลข 0-9 เท่านั้น',
            'comunication.required'=>'กรุณากรอกเบอร์ติดต่อ',
            'comunication.numeric'=>'เบอร์ติดต่อต้องกรอกเป็นตัวเลข 0-9 เท่านั้น',
        ]);

        if( $data ->fill( $request->input(), $data->status = 'รออนุมัติ' )->save() ){
            if($request->has('document')){
               $data->document = $request->file('document')->store('leave','public');
              }
            $data ->update();
            return redirect()->to('/leave/user/'.'1')->with('success', 'บันทึกข้อมูลสำเร็จ',5);
        }
        else{
            return redirect()->route('user.create')
                ->withErrors([
                    'message' => 'เกิดข้อผิดผลาด, กรุณาลองใหม่',
                ])
                ->withInput();
        }

    }
    public function cancel($id)
    {
        //
        $data = leave::findOrFail( $id );
        $data->fill([
            "status"=>'ยกเลิกคำขอ',
          ]);
          $data->update();
          return redirect()->to('/leave/user/'.'1')->with('success', 'บันทึกข้อมูลสำเร็จ',5);
    }
    // export
    public function export(Request $request) 
    {
        $request->validate([
            'month' => 'required',
            'year' => 'required',
        ],[
            'month.required'=>'กรุณาเลือกเดือน',
            'year.required'=>'กรุณาเลือกปี',
            
        ]);
         $year = $request->year;
         $month = $request->month;
        if($request->button == 'Excel')
        {
            $data = leave::select(leave::raw('ROW_NUMBER() OVER(ORDER BY leaves.user_id,leaves.leave_id,leaves.date) AS No'),'users.name as ชื่อ',  'positions.name as ตำแหน่ง'
            ,leave::raw("DATE_FORMAT(leaves.date, '%d-%M-%Y') as วันที่ลา") ,'leaves_types.topic as ประเภทการลา','leaves.days as จำนวนที่ลา',)
          ->join('users', 'leaves.user_id', '=', 'users.id')
          ->join('leaves_types',"leaves_types.id","=","leaves.leave_id")
          ->join('positions',"positions.id","=","users.pos_id")
          ->where('leaves.status',"=","ผ่านการอนุมัติ")
          ->whereMonth('leaves.date', '=', $month)
          ->whereYear('leaves.date', '=',$year )
          ->groupBy('leaves.user_id','leaves.leave_id','leaves.date')
          ->get();
          
           $header_style = (new StyleBuilder())
           ->setFontBold()
           
           ->build();
   
           $rows_style = (new StyleBuilder())
               ->setFontSize(15)
              
               ->build();
   
           return (new FastExcel($data))
         
               ->headerStyle($header_style)
               ->rowsStyle($rows_style)
               ->download('file.xlsx');
        }
        if($request->button == 'PDF')
        {
            $data = leave::select('users.name as names',  'positions.name as positions','leaves.date as date' ,'leaves_types.topic as topic','leaves.days as days',)
            ->join('users', 'leaves.user_id', '=', 'users.id')
            ->join('leaves_types',"leaves_types.id","=","leaves.leave_id")
            ->join('positions',"positions.id","=","users.pos_id")
            ->where('leaves.status',"=","ผ่านการอนุมัติ")
            ->whereMonth('leaves.date', '=', $month)
            ->whereYear('leaves.date', '=',$year )
            ->groupBy('leaves.user_id','leaves.leave_id','leaves.date')
            ->get();
            $myDate = '01/'.$month.'/'.$year;
            $date = Carbon::createFromFormat('d/m/Y', $myDate);
            $monthName = $date->format('F Y');
            $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
            $fontDirs = $defaultConfig['fontDir'];
            $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
            $fontData = $defaultFontConfig['fontdata'];
            $html = view('leave.ExportPDF',compact('data','monthName'))->render();
            $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
            public_path('fonts/'),
            ]),
            'fontdata' => $fontData + [
            'sarabun_new' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            ],
            ],
            'default_font' => 'sarabun_new',
            ]);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            return $mpdf->Output();
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
