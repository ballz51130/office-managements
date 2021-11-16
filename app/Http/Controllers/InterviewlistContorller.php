<?php

namespace App\Http\Controllers;
use App\Models\registrations;
use Illuminate\Http\Request;
use App\Models\interviewlistModel;
use App\Models\interviewhistoryModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\RefusedWorkMail;
use App\Mail\waitinginterview;
use App\Mail\Throughjobinterview;
use App\Mail\Waitingconclusion;
use Alert;
class InterviewlistContorller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $sth = interviewlistModel::select('*','interviewlists.id as id')
        ->leftjoin('registrations',"registrations.id","=","interviewlists.registration_id");
        if( !empty($request->search) ){
            $keyword = $request->search;
            $sth->where(function ($query) use ($keyword)
            {
            $query->where('registrations.name', 'like', '%' . $keyword . '%')
            ->orWhere('registrations.email', 'like', '%' . $keyword . '%');
               
            });
        }
        $interviewlists = $sth->orderby('interviewlists.created_at', 'desc')->paginate( 15 );

        return view('jobs.interviewlist.index',compact('interviewlists'));
    }
    public function history(Request $request)
    {
        $sth = interviewlistModel::select('*','interviewlists.id as id')
        ->leftjoin('registrations',"registrations.id","=","interviewlists.registration_id");
        if( !empty($request->search) ){
            $keyword = $request->search;
            $sth->where(function ($query) use ($keyword)
            {
            $query->where('registrations.name', 'like', '%' . $keyword . '%')
            ->orWhere('registrations.email', 'like', '%' . $keyword . '%')
            ->orWhere('registrations.position', 'like', '%' . $keyword . '%');  
            });
        }
        $interviewhistorys = $sth->orderby('interviewlists.created_at', 'desc')->paginate( 15 );
        return view('jobs.interviewhistory.index',compact('interviewhistorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(interviewlistModel $interviewlist)
    {
    
        return view('jobs.interviewlist.edit',compact('interviewlist'));
    }
    public function detail(interviewlistModel $interviewhistory)
    {
    
        return view('jobs.interviewhistory.edit',compact('interviewhistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(interviewlistModel $interviewlist, Request $request)
    {
        //
        $interviewhistory = new interviewhistoryModel();
        $registrations = registrations::findOrFail( $interviewlist->registration_id );
        if($request->button == 2)
        {

            $registrations->fill([
                'status' => 'รอผลการสรุป',
              
                ])->update();
            if($interviewlist->fill([
                'detail' => $request->detail,
                'status' => 'รอผลการสรุป',
                ])->update())
                {
                    Mail::to($registrations->email)->send(new Waitingconclusion($registrations));
                    Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                    return  redirect()->route('Interviewlist');      
                }
                else{
    
                    Alert::error('error', 'เกิดข้อผิดพลาด');
                    return back();
                }
                
        }
        if($request->button == 1)
        {
            
            $request->validate([
                'status' => 'required',
            ]
            ,[
                'status.required'=> 'กรุณาเลือกสถานะ',
    
            ]); 
          
         if($request->status == 'รอสัมภาษณ์งาน' )
         {
            // validate
            $request->validate([
                'date' => 'required',
            ]
            ,[
                'date.required'=>'กรุณากำหนดวันนัดสัมภาษณ์',
    
            ]); 

            $registrations->fill([
                'status' => $request->status,
                'status_rols' =>$registrations->status_rols+1
                ])->update();
            $interviewlist->fill([
                'date' => $request->date,
                'status' => $request->status,
                ])->update();
            if($interviewhistory->fill([
                'interviewlist_id' => $interviewlist->id,
                'date' =>  $interviewlist->date,
                'detail' => $request->detail,
                'status' => $request->status,
                ])->save())
            {
                Mail::to($registrations->email)->send(new waitinginterview($registrations));
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('Interviewlist');      
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
         }
        
        if($request->status == 'ผ่านการสัมภาษณ์งาน' )
         {
            $request->validate([
                'detail' => 'required',
            ]
            ,[
                'detail.required'=> 'กรุณากรอก รายละเอียดการสัมภาษณ์งาน',
    
            ]); 

            $interviewlist->fill([
                'date' => $interviewlist->date,
                'status' => $request->status,
                ])->update();
            $registrations->fill([
                'status' => $request->status,
                ])->update();   
            if($interviewhistory->fill([
                'interviewlist_id' => $interviewlist->id,
                'date' => $interviewlist->date,
                'detail' => $request->detail,
                'status' => $request->status,
                ])->save())
            {
                Mail::to($registrations->email)->send(new Throughjobinterview($registrations));
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('Interviewlist');      
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
         }
            
         if($request->status == 'ไม่ผ่านการสัมภาษณ์งาน' )
         {
            $request->validate([
                'detail' => 'required',
            ]
            ,[
                'detail.required'=> 'กรุณากรอก เหตุผลไม่ผ่านการสัมภาษณ์งาน ',
    
            ]); 
            $registrations->fill([
                'status' => $request->status,
                'status_detail' => $request->detail,
                ])->update();
                if($interviewhistory->fill([
                    'interviewlist_id' => $interviewlist->id,
                    'detail' => $request->detail,
                    'date' => $interviewlist->date,
                    'status' => $request->status,
                    ])->save())
            if($interviewlist->fill([
                'status' => $request->status,
                ])->update())
            {
                Mail::to($registrations->email)->send(new RefusedWorkMail($registrations));
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('Interviewlist');      
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
         }
           
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
