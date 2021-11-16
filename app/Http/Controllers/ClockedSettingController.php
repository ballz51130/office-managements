<?php

namespace App\Http\Controllers;
use App\Models\clockmodel;
use Illuminate\Http\Request;
use DB;
class ClockedSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clock = clockmodel::get();
        return view('clocked.clockedsetting.index',compact('clock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('clocked.clockedsetting.create');
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
    public function edit(Request $request)
    {
        //
        
       
        $request->validate([
            'time_checkin.*' => 'required',
            'time_checkout.*' => 'required',
            //'freetime.*' => 'required',

        ],[
            'time_checkin.*.required'=>'กรุณาเลือกเวลาเข้างาน',
            'time_checkout.*.required'=>'กรุณาเลือกเวลาออกงาน',
            'freetime.*.required'=>'กรุณากรอกเวลาพักงาน',

        ]);
        foreach ($request->id as $key => $value) {
            if( !empty( $request->type[$key]) )
            {
               $clk = 1 ;
                
            }
            else
            {
                $clk = 0 ;
            }
            clockmodel::findOrFail($request->id[$key])
             ->update([
                 'time_checkin' =>$request->time_checkin[$key],
                 'time_checkout' =>$request->time_checkout[$key],
                 'freetime' =>$request->freetime[$key],
                 'time_checkout' =>$request->time_checkout[$key],
                 'type' => $clk, 
             ]);

        }
        return redirect()->route('clockedsetting')->with('success', 'อัพข้อมูลสำเร็จ',5);
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
