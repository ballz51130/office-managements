<?php

namespace App\Http\Controllers;
use App\Models\positionModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Alert;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positions = positionModel::select('*')->paginate( 4 );
        return view('position.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $position = new positionModel();
        if( $position->fill( $request->input() )->save() ){

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return redirect()->route('position');
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
    public function show(positionModel $position)
    {
        //
        return view('position.edit', compact('position'));
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
    public function update(Request $request, positionModel $position)
    {
        //
    $request->validate([
        'name'=> 'required|min:2',
        ]
        ,[
            'name.required' => 'กรุณากรอกชื่อตำแหน่งงาน',
            'name.required' => 'ชื่อตำแหน่งงานต้องมีอย่างน้อย 2 ตัวอักษรขึ้นไป'
        ]);

        if( $position->fill( $request->input() )->update() ){

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return redirect()->route('position');
        }
        else{

            Alert::error('error', 'เกิดข้อผิดพลาด');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(positionModel $position)
    {
        //
        if( $position->delete() ){

            return response()->json([
                'message' => 'Deleted!!',
                'title' => 'deleted.',
                'type' => 'success',
            ]);
            // return redirect()->route('user')->with('error', 'ทำการลบเรียบร้อย');
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
