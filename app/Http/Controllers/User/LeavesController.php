<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\models\leaves;
use App\models\leave_type;
use Alert;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $sth = leaves::where('user_id','=',Auth::user()->id);
      
        if($request->search ){
        $leaves = $sth->orderby('created_at', 'desc')->get();
        $leaves2 = leaves::findOrFail($request->search);

        return view('users.leaves.detail',compact('leaves','leaves2'));
        }
        else
        {
            $leaves = $sth->orderby('created_at', 'desc')->get();
            return view('users.leaves.detail',compact('leaves'));
        }
       
    }
    public function fulldetail(leaves $leave)
    {
        return view('users.leaves.fulldetail',compact('leave'));
    }
    function getFileleave(leaves $leave){


            return response()->download(storage_path("app/public/$leave->document"));
       
    }
    public function index()
    {
       
        return view('users.leaves.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leave_type = leave_type::get();
        return view('users.leaves.create',compact('leave_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
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
        $leaves = new leaves ;
        if( $leaves ->fill( $request->input())->save())
            {
            if($request->has('document')){
               $leaves->document = $request->file('document')->store('leave','public');
              }
            $leaves->user_id = Auth::user()->id;
            $leaves->status = 'รออนุมัติ' ;
            $leaves ->update();
            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return redirect()->route('leaves');
        }
        else{

            Alert::error('error', 'เกิดข้อผิดพลาด');
            return back();
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
