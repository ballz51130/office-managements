<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobsModel;
use Illuminate\Pagination\Paginator;
use App\Models\jobs_propertyModel;
use App\Models\jobs_welfareModel;
use Alert;
use Carbon\Carbon;
use App\Models\positionModel;
use Illuminate\Support\Facades\Storage;
class JobsAppicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        //

        $sth = jobsModel::select('*');
        if( !empty($request->search) ){
            $keyword = $request->search;

            $sth->where(function ($query) use ($keyword)
            {
                $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('position', 'like',$keyword.'%')
                ->orWhere('status', 'like',$keyword.'%')
                ;
            });
        }

        $jobs = $sth->orderby('created_at', 'desc')->paginate( 4 );

        return view('jobs.index', compact('jobs'));
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = jobsModel::where('name','like','%'.$search.'%')
                ->orWhere('department', 'like','%'.$search.'%')
                ->orWhere('position', 'like','%'.$search.'%')
                ->paginate(15);
        return view('jobs.index')->with(["data"=>$data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $position = positionModel::get();
        return view('jobs.create',compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $request->validate([
                'property.*.detail' => 'required',
                'welfare.*.detail' => 'required',
                'name' => 'required',
                'subtitle' => 'required',
                'salary' => 'required|numeric',
                'position' => 'required',
                'type' => 'required',
                'quantity' => 'required',
                'times' => 'required',

            ],[
                'property.*.detail.required'=>'กรุณากรอกคุณสมบัติของผู้สมัคร',
                'welfare.*.detail.required'=>'กรุณากรอกสวัสดิการของบริษัท',
                'name.required'=>'กรุณากรอกชื่อใบรับสมมัคร',
                'subtitle.required'=>'กรุณากรอกคำบรรยายของใบรับสมัคร',
                'salary.required'=>'กรุณากรอกเงินเดือน',
                'salary.numeric'=>'เงินเดือนต้องเป็นตัวเลข 0-9 เท่านั้น',
                'position.required'=>'กรุณาเลือกประเภทงาน',
                'type.required'=>'กรุณาเลือกประเภทงาน',
                'quantity.required'=>'กรุณากรอกจำนวนที่รับสมัครงาน',
                'times.required'=>'กรุณากำหนดเวลาที่สมัคร',
                'start.required'=>'กรุณาเลือกวันที่เริ่มต้น',
                'start_time.required'=>'กรุณาเลือกเวลาที่เริ่มต้น',
                'end.required'=>'กรุณาเลือกวันที่สิ้นสุด',
                'end_time.required'=>'กรุณาเลือกเวลาที่สิ้นสุด',
            ]);

            if($request->times == 1){
                $request->validate([
                    'start' => 'required',
                    'start_time' => 'required',
                    'end' => 'required',
                    'end_time' => 'required',

                ],[

                    'start.required'=>'กรุณากรอก',
                    'start_time.required'=>'กรุณากรอก',
                    'end.required'=>'กรุณากรอก',
                    'end_time.required'=>'กรุณากรอก',
                ]);

            }

        $jobs = new jobsModel();


         if($jobs->fill( $request->input() )->save()){
            $jobs->fill([
                'status'=>'เปิดรับสมัคร',
                ])->update();
            if($request->has('image') ){
                $jobs->image = $request->file('image')->store('jobs','public');
                $jobs->update();

            }
             if($request->times == 0)
             {
                 $jobs->fill([
                    'start' => null,
                    'start_time'=>null ,
                    'end' => null,
                    'end_time'=>null,
                    ])->update();
             }


            $job_id = $jobs->id;
         }

        foreach ($request->property as $key => $value) {
            jobs_propertyModel::create([
                'job_id' => $job_id,
                'detail' => $value['detail'],
            ]);
        }
        foreach ($request->welfare as $key => $value) {
            jobs_welfareModel::create([
                'job_id' => $job_id,
                'detail' => $value['detail'],
            ]);
        }
        return redirect()->to('/jobs')->with('success', 'บันทึกข้อมูลสำเร็จ',5);
    }

    public function active()
    {
        $data = jobsModel::where('status','เปิดรับสมัคร')->get();

        return view('jobs.index')->with(["data"=>$data]);
    }

    public function notactive()
    {
        $data = jobsModel::where('status','ปิดรับสมัคร')->get();

        return view('jobs.index')->with(["data"=>$data]);
    }

    public function timeout()
    {
        $data = jobsModel::where('status','หมดอายุ')->get();

        return view('jobs.index')->with(["data"=>$data]);
    }

    public function memberindex(Request $request)
    {
        $position = positionModel::get();
       // $sth = User::select('*');

        // if( !empty($request->position) ){
        //     $keyword = $request->position;
        //     $sth->where(function ($query) use ($keyword)
        //     {
        //         $query
        //             ->where('position', 'like', '%' . $keyword . '%')

        //         ;
        //     });
        // }
        // if( !empty($request->search)){
        //     $keyword = $request->search;
        //     $sth->where(function ($query) use ($keyword)
        //     {
        //         $query
        //             ->where('name', 'like', '%' . $keyword . '%')
        //             ->orWhere('email', 'like', '%' . $keyword . '%')
        //         ;
        //     });
        // }

        // $data = $sth->orderby('created_at', 'desc')->paginate( 15 );

        return view('jobs.member.index',compact('position'));
    }
    public function member_create(){
        return view('jobs.member.create');
    }

    public function applicationlist()
    {
        return view('jobs.member.application_list');
    }
    public function applicationdetail()
    {
        return view('jobs.member.application_detail');
    }
    public function detail($id)
    {
        return view('jobs.detail');
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
        $jobs = jobsModel::findOrFail($id);
        $positions = positionModel::get();
        return view('jobs.edit', compact('jobs','positions'));

    }
    public function history()
    {
        return view('jobs.page.history-jobs');
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

        $request->validate([
            'property.*' => 'required',
            'welfare.*' => 'required',
            'name' => 'required',
            'subtitle' => 'required',
            'salary' => 'required',
            'position' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'times' => 'required',

        ],[
            'property.*.required'=>'กรุณากรอก',
            'welfare.*.required'=>'กรุณากรอก',
            'name.required'=>'กรุณากรอก',
            'subtitle.required'=>'กรุณากรอก',
            'salary.required'=>'กรุณากรอก',
            'position.required'=>'กรุณากรอก',
            'type.required'=>'กรุณากรอก',
            'quantity.required'=>'กรุณากรอก',
            'times.required'=>'กรุณากรอก',
            'start.required'=>'กรุณากรอก',
            'start_time.required'=>'กรุณากรอก',
            'end.required'=>'กรุณากรอก',
            'end_time.required'=>'กรุณากรอก',
        ]);

        if($request->times == 1){
            $request->validate([
                'start' => 'required',
                'start_time' => 'required',
                'end' => 'required',
                'end_time' => 'required',

            ],[

                'start.required'=>'กรุณากรอก',
                'start_time.required'=>'กรุณากรอก',
                'end.required'=>'กรุณากรอก',
                'end_time.required'=>'กรุณากรอก',
            ]);

        }
        foreach ($request->property as $key => $value) {

            jobs_propertyModel::where('id', $key)
            ->update(['detail' =>$value ]);

          }
          foreach ($request->welfare as $key => $value) {

            jobs_welfareModel::where('id', $key)
            ->update(['detail' =>$value ]);

          }
          $date = Carbon::now();
          $jobs = jobsModel::findOrFail($id);
          if ($request->start <= $date)
          {
            $jobs->fill([
                'status'=>'เปิดรับสมัคร',

              ]);

             $jobs->update();
          }
          else{
            $jobs->fill([
                'status'=>'ปิดรับสมัคร',

              ]);

             $jobs->update();
        }
          if($jobs->fill( $request->input() )->update()){
            if( $request->has('image') ){
                if( !empty($jobs->image) ){
                  storage::disk('public')->delete( $jobs->image );
                }

                     $jobs->image = $request->file('image')->store('jobs','public');
                     $jobs->update();
            }

            if($request->times == 0)
            {
                $jobs->fill([
                   'start' => null,
                   'start_time'=>null ,
                   'end' => null,
                   'end_time'=>null,
                   ])->update();
            }
            return redirect()->route('jobs')->with('success', 'แก้ไขข้อมูลสำเร็จ',5);
          }
          else
          {
            Alert::error('error', 'เกิดข้อผิดพลาด');
            return back();
          }

    }
    public function addproperty(Request $request)
    {
        $property = new jobs_propertyModel();
        $property->fill([
            'job_id' => $request->job_id,
            'detail'=> $request->property,
            ])->save();
            return redirect()->to('/jobs/edit/'.$request->job_id)->with('success', 'เพิ่มข้อมูลสำเร็จ',5);
    }
    public function addwelfare(Request $request)
    {
        $property = new jobs_welfareModel();
        $property->fill([
            'job_id' => $request->job_id,
            'detail'=> $request->welfare,
            ])->save();
            return redirect()->to('/jobs/edit/'.$request->job_id)->with('success', 'เพิ่มข้อมูลสำเร็จ',5);
    }
    public function delproperty($id)
    {
        $property = jobs_propertyModel::findOrFail($id);
        $property->delete();
        return redirect()->back();
    }
    public function delwelfare($id)
    {
        $welfare = jobs_welfareModel::findOrFail($id);
        $welfare->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status( jobsModel $jobs )
    {
      if($jobs->status == 'เปิดรับสมัคร')
      {
        $status = 'ปิดรับสมัคร';
      }
      else
      {
        $status = 'เปิดรับสมัคร';
      }
        if($jobs->fill( [
            'status'=> $status,
        ]
         )->update() ){
                return response()->json([
                    'message' => 'Deleted!!',
                    'title' => 'deleted.',
                    'type' => 'success',
                ]);

            }
            else{

                return response()->json([
                    'message' => 'Deleted Error!!',
                    'title' => 'Error Code 502.',
                    'type' => 'error',
                ]);
            }
    }
    public function destroy(jobsModel $jobs)
    {
        //

        jobs_propertyModel::where('job_id', $jobs->id)->delete();
        jobs_welfareModel::where('job_id', $jobs->id)->delete();

        if( $jobs->image ){
            Storage::disk('public')->delete( $jobs->image );
        }
        if( $jobs->delete() ){

            return response()->json([
                'message' => 'Deleted!!',
                'title' => 'deleted.',
                'type' => 'success',
            ]);

        }
        else{

            return response()->json([
                'message' => 'Deleted Error!!',
                'title' => 'Error Code 502.',
                'type' => 'error',
            ]);
        }

    }
}
