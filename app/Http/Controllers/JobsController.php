<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\jobsModel;
use App\Models\registrations;
use App\Models\registrtations_aptitude;
use App\Models\registrtations_study;
use App\Models\registrtations_work;
class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jobslist()
    {
        $mytime = Carbon::now();
        $sth = jobsModel::select('*');

        $jobs = $sth->orderby('created_at', 'desc')->paginate( 12 );
        return view('jobregister.jobs_list',compact('jobs','mytime'));
    }
    public function jobsdetail(jobsModel $job)
    {
        $mytime = Carbon::now();
        return view('jobregister.jobs_detail',compact('job','mytime'));
    }
    public function jobscreate(jobsModel $job){
        return view('jobregister.create',compact('job'));
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(jobsModel $job, RegisterRequest $request )
    {
        //
        if($request->marriage_status =='แต่งงาน'){
            $request->validate([ 
                'marriage_registration'=> 'required',
                'marriage_name'=> 'required',
                'position'=> 'required',
                'marriage_name'=> 'required',
                'work'=> 'required',
             ]
             ,[
                'marriage_registration.required' => 'กรุณากรอก',
                'marriage_name.required' => 'กรุณากรอก',
                'position.required' => 'กรุณากรอก',
                'marriage_name.required' => 'กรุณากรอก',
                'work.required' => 'กรุณากรอก',
             ]);
           
        }

       if($request->marriage_registration =='จดทะบียน'){
            $request->validate([ 
                'marriage_name' => 'required',
             ]
             ,[
                'marriage_name.required' => 'กรุณากรอก',
             ]);
            }

        if($request->military =='ยังไม่ได้เกณฑ์'){
            $request->validate([ 
                'military_year' => 'required',
             ]
             ,[
                'military_year.required' => 'กรุณากรอก',
             ]);
          
        }
         if($request->prosecuted == 1 ){
            $request->validate([ 
                'prosecuted_detail' => 'required',
             ]
             ,[
                'prosecuted_detail.required' => 'กรุณากรอก',
             ]);
        }

         if($request->contagion == 1){
            $request->validate([ 
                'contagion_detail' => 'required',
             ]
             ,[
                 'contagion_detail.required'=>'กรุณาเลือก',
             ]);
        }
        if($request->congenital_disease == 1){

            $request->validate([ 
                'congenital_disease_detail' => 'required',
             ]
             ,[
                 'congenital_disease_detail.required'=>'กรุณาเลือก',
             ]);
        } 
        
        $data = new registrations ;
        $data2 = new registrtations_aptitude ;
        $data4 = new registrtations_work ;
        if( $data->fill( $request->input() )->save() ){
            $data->position = $request->positions;
            $data->status = 'รอตรวจสอบ';
            if($request->has('image') ){
                $data->image = $request->file('image')->store('register','public');
            }
            $data->update();
            $registrtations_id = $data->id;
       if( $data2->fill([
                'registrtations_id'=> $registrtations_id,
                'th_speak' => $request->th_speak,
                'th_read' => $request->th_read,
                'th_write' => $request->th_write,
                'en_speak' => $request->en_speak,
                'en_read' => $request->en_read,
                'en_write' => $request->en_write,
                'ch_speak' => $request->ch_speak,
                'ch_read' => $request->ch_read,
                'ch_write' => $request->ch_write,
                ])->save() )
            
            {
                foreach ($request->study as $key => $value) {
                    registrtations_study::create([
                        'registrtations_id' => $registrtations_id,
                        'educational'=>$value['educational'],
                        'educational_detail' => $value['educational_detail'],
                        'institution' => $value['institution'],
                        'field_of_study' => $value['field'],
                        'start' => $value['start'],
                        'end' => $value['end'],
                        'gpa' => $value['gpa'],
                    ]);
                    }
            foreach ($request->works as $key => $value) {
                registrtations_work::create([
                    'registrtations_id' => $registrtations_id,
                            'workplace' => $value['workplace'],
                            'start' => $value['start'],
                            'end' => $value['end'],
                            'position' => $value['position'],
                            'job_description' => $value['job_description'],
                            'salary' => $value['salary'],
                            'reason_for_issue' => $value['reason_for_issue'],
                        ]);
            }
            Alert::success('success', 'สมัครงานสำเร็จ กรุณารอติดต่อกลับทาง Email ของท่าน');
            return  redirect()->route('job.index');      
        }
        else{

            Alert::error('error', 'ข้อมูลส่วนตัวเกิดข้อผิดพลาด');
            return back();
        }

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
