<?php

namespace App\Http\Controllers;
use App\Models\DepartmentModel;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Pagination\Paginator;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $departments = DepartmentModel::select('*')->paginate( 4 );
        return view('department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $department = new DepartmentModel();
            if( $department->fill( $request->input() )->save() ){

                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return redirect()->route('department');
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
    public function show(departmentModel $department)
    {
        //
       
       return view('department.edit', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request, departmentModel $department)
    {
        //
    $request->validate([
        'name'=> 'required|min:2',
        ]
        ,[
            'name.required' => 'กรุณากรอกชื่อแผนกงาน',
            'name.required' => 'ชื่อแผนกงานต้องมีอย่างน้อย 2 ตัวอักษรขึ้นไป'
        ]);

        if( $department->fill( $request->input() )->update() ){

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return redirect()->route('department');
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
    public function destroy(departmentModel $department)
    {
        //
        if( $department->delete() ){

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
