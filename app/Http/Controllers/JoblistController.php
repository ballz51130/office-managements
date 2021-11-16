<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\positionModel;
use App\Models\registrations;
use Alert;
class JoblistController extends Controller
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
 
         return view('jobs.member.index',compact('position','registrations'));
       
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

        return view('jobs.member.edit', compact('registration'));
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
        //
        if($request->status == 'ไม่ผ่านการตรวจเอกสาร')
        {
            if($registration->status != 'ไม่ผ่านการตรวจเอกสาร')
            {
             $rols = 1;
            }
            else
            {
             $rols = $registration->status_rols+1;
            }
            if($registration->fill([
                'status' => $request->status,
                'status_rols' => $rols,
                'status_detail' => $request->status_detail,
                ])->update())
            {
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('jobslist');      
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        if($request->status == 'รอสัมภาษณ์งาน')
        {
        //    if($registration->status == 'รอสัมภาษณ์งาน' && $registration->status_rols >=3 )
        //    {
        //     if($registration->fill([
        //             'status' => 'ไม่ผ่านสัมภาษณ์งาน',
        //             'status_detail' => $request->status_detail,
        //             ])->update())
        //         {
        //             Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
        //             return  redirect()->route('jobslist');      
        //         }
        //         else{

        //             Alert::error('error', 'เกิดข้อผิดพลาด');
        //             return back();
        //         }
        //    }
        //    else
        //    {
               if($registration->status != 'รอสัมภาษณ์งาน')
               {
                $rols = 1;
               }
               else
               {
                $rols = $registration->status_rols+1;
               }
                if($registration->fill([
                    'status' => $request->status,
                    'status_rols' =>$rols,
                    'status_detail' => $request->status_detail,
                    ])->update())
                {
                    Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                    return  redirect()->route('jobslist');      
                }
                else{

                    Alert::error('error', 'เกิดข้อผิดพลาด');
                    return back();
                }
          // } //end $registration->status == 'รอสัมภาษณ์งาน' && $registration->status_rols >=3 
        } // end if  $request->status == 'รอสัมภาษณ์งาน'

        if($request->status == 'ผ่านสัมภาษณ์งาน')
        {
       
            if($registration->fill([
                'status' => $request->status,
                'status_detail' => $request->status_detail,
                ])->update())
            {
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('jobslist');      
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        
        if($request->status == 'ไม่ผ่านสัมภาษณ์งาน')
        {
            if($registration->fill([
                'status' => $request->status,
                'status_detail' => $request->status_detail,
                ])->update())
            {
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('jobslist');      
            }
            else{

                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        if($request->status == 'ไม่ผ่านสมัครงาน')
        {
            if($registration->fill([
                'status' => $request->status,
                'status_detail' => $request->status_detail,
                ])->update())
            {
                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return  redirect()->route('jobslist');      
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
