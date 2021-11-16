<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\positionModel;
use App\Models\registrations;
use App\Models\interviewlistModel;
use App\Models\interviewhistoryModel;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Mail\RefusedWorkMail;
use App\Mail\waitinginterview;
use Illuminate\Support\Facades\Mail;

class CandidatelistContorller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $position = positionModel::get();

        $sth = registrations::select('*');

         if( !empty($request->position) ){

             $keyword = $request->position;
             $sth->where(function ($query) use ($keyword)
             {
                 $query
                     ->where('position', 'like', '%' . $keyword . '%')
                 ;
             });
         }

         if( !empty($request->search)){
             $keyword = $request->search;
             $sth->where(function ($query) use ($keyword)
             {
                 $query
                     ->where('name', 'like', '%' . $keyword . '%')
                     ->orwhere('position', 'like', '%' . $keyword . '%')
                     ->orWhere('email', 'like', '%' . $keyword . '%')
                     ->orWhere('status', 'like', '%' . $keyword . '%')
                 ;
             });
         }

         $registrations = $sth->orderby('created_at', 'desc')->paginate( 15 );

         return view('jobs.candidatelist.index',compact('position','registrations'));
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
    public function edit(registrations $registration)
    {
        //

        return view('jobs.candidatelist.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registrations $registration )
    {
        // dd( $registration->toArray() );
        // validate unput
        if($request->status == 'รอสัมภาษณ์งาน')
        {
            $request->validate([
                'status' => 'required',
                'date' => 'required',
            ]
            ,[
                'stauts.required'=>'กรุณาเลิอกสถานะ',
                'date.required'=>'กรุณากำหนดวันนัดสัมภาษณ์',

            ]);
        }

        if($request->status =='ไม่ผ่านการสมัครงาน')
        {
            $request->validate([
                'status_detail' => 'required',
            ]
            ,[
                'status_detail.required'=>'กรุณากรอก หมายเหตุ',

            ]);
        }
        if($request->status =='รอสัมภาษณ์งาน')
        {
            $request->validate([
                'date' => 'required',
            ]
            ,[
                'date.required'=>'กรุณากำหนดวันนัดสัมภาษณ์งาน',

            ]);
        }




        # update : data
        if($request->status =='ไม่ผ่านการสมัครงาน')
        {
            if($registration->fill([
                'status' => $request->status,
                'status_detail' => $request->status_detail,
                ])->update())
            {

                // Sent Email

                Mail::to($registration->email)->send(new RefusedWorkMail($registration));
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('candidate');
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        else if($request->status =='รอสัมภาษณ์งาน')
        {
            $registration->fill([
                'status' => $request->status,
                'status_rols' =>$registration->status_rols+1
                ])->update();

            $interviewlist = new interviewlistModel();

            if( $interviewlist->fill([
                'registration_id' => $registration->id,
                'date' => $request->date,
                'status' => 'รอสัมภาษณ์งาน',
                ])->save())
                {  
                    Mail::to($registration->email)->send(new waitinginterview($registration));
                    Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                    return  redirect()->route('candidate');
                }
                else{

                    Alert::error('error', 'เกิดข้อผิดพลาด');
                    return back();
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
