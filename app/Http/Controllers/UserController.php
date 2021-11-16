<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\departmentModel;
use App\Models\positionModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\leave;
use App\User;
use Alert;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashborad()
    {
        return view('user.dashborad');
    }

    public function index( Request $request )
    {

        // dd( 'this users' );

        ## get users form model
        $sth = User::select('*');
    
        if( !empty($request->search) ){
            $keyword = $request->search;

            $sth->where(function ($query) use ($keyword)
            {
                $query
                    ->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                ;
            });
        }

        $users = $sth->orderby('created_at', 'desc')->paginate( 15 );
        return view('user.index', compact('users'));
    }

    public function active()
    {
      
    }
    public function notactive()
    {
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name','like','%'.$search.'%')->paginate(15);
        return view('user.index')->with(["users"=>$users]);
    }

    public function create()
    {
        $position = positionModel::get();
        $department = departmentModel::get();
        return view('user.create', compact('position', 'department')); //->with(['position'=>$position,'department'=>$department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();

       // dd($request->input());
        if( $user->fill( $request->input() )->save() ){

            $user->status = 1;
            $user->password = Hash::make( $request->password );

            // $user->type = 1;

            if($request->has('image') ){
                $user->image = $request->file('image')->store('image','public');
            }

            if($request->has('identification_card') ){
                $user->identification_card = $request->file('identification_card')->store('identification_card','public');
            }

            if($request->has('house_registration') ){
                $user->house_registration = $request->file('house_registration')->store('house_registration','public');
            }

            if($request->has('etc') ){
                $user->etc = $request->file('etc')->store('etc','public');
            }

            $user->update();
            return redirect()->route('user')->with('success', 'บันทึกข้อมูลสำเร็จ', 5);
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
    public function show(User $user)
    {
            
        return view('user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->type == 1){
            $view = 'user.edit';
          }
          else{
              $view = 'user.user.edit';
          }

        $request->session()->forget('password'); // ล้าง session
        $request->session()->forget('profile');
        $request->session()->forget('imformation');
        $position = PM::get();
        $department = DM::get() ;
        $user = User::findOrFail($id);
        $v = Validator::make($request->all(), [


        ],[
            'old_password.required'=>'กรุณากรอก Password',
            'password.required'=>'กรุณากรอก New Password',
            'password.confirmed'=>'รหัสผ่านไม่ตรงกัน ',


        ]);
        if ($v->fails())
        {
            $request->session()->flash('imformation');

            return view($view, ['id' => $id,'users'=>$user,'position'=>$position,'department'=>$department])->withErrors($v->errors());
        }
        else{

            $users = User::findOrFail($id);
            if( $request->has('image') ){
                if( !empty($users->image) ){
                  storage::disk('public')->delete( $users->image );

                }
                $user->fill([
                    'title_name' => $request->title_name,
                    'email'=> $request->email,
                    'name' => $request->name,
                    'phone'=> $request->phone,
                    'house_number'  => $request->house_number,
                    'brithday' => $request->brithday,
                    'district'=> $request->district,
                    'amphures'=> $request->amphures,
                    'province'=> $request->province,
                    'zipcode'=> $request->zipcode,
                    'image' => $request->file('image')->store('image','public'),
                    ])->update();
            }
                else{
                    $user->fill([
                      'title_name' => $request->title_name,
                      'email'=> $request->email,
                      'name' => $request->name,
                      'phone'=> $request->phone,
                      'brithday' => $request->brithday,
                      'house_number'  => $request->house_number,
                      'district'=> $request->district,
                      'amphures'=> $request->amphures,
                      'province'=> $request->province,
                      'zipcode'=> $request->zipcode,
                      ])->update();
                }

             alert()->success('SuccessAlerts','บันทึกข้อมูลสำเร็จ',5);
              $request->session()->flash('imformation');
           return view($view, ['id' => $id,'users'=>$user,'position'=>$position,'department'=>$department]);

            }
    }
    public function profile(User $user, Request $request)
    {
       // dd($request->input());
        $request->validate([
            'name' => 'required',
            //'email' => 'required|email|unique:users,email,'.$user->id, //
            'house_number' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
        ]
        ,[
            'name.required'=>'กรุณากรอก ชื่อ-สกุล',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'อีเมลไม่ถูกต้อง',
            'email.unique' => 'อีเมลถูกใช้ไปแล้ว',
            'house_number.required'=>'กรุณากรอก ที่อยู่',
            'province.required'=>'กรุณากรอก จังหวัด',
            'zipcode.required'=>'กรุณากรอก รหัสไปรษณีย์',
        ]);

        if( $request->has('image') ){
            if( !empty($users->image) ){
              storage::disk('public')->delete( $users->image );
            }
           
                 $user->image = $request->file('image')->store('image','public');
        }
        if( $user->fill( $request->input() )->update() ){

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return back();
        }
        else{

            Alert::error('error', 'เกิดข้อผิดพลาด');
            return back();
        }


    }

    public function account(User $user)
    {
        return view('user.account', compact('user'));
    }

    public function saveaccount(User $user, Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]
        ,[
            'username.required'=>'กรุณากรอก ชื่อ-สกุล',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'อีเมลไม่ถูกต้อง',
            'email.unique' => 'อีเมลถูกใช้ไปแล้ว',
        ]);


        if( $user->fill( $request->input() )->update() ){

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return back();
        }
        else{

            Alert::error('error', 'เกิดข้อผิดพลาด');
            return back();
        }
    }

    public function password(User $user)
    {
        return view('user.password', compact('user'));
    }

    public function savepassword(User $user, Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]
        ,[
            'old_password.required'=>'กรุณากรอก รหัสผ่านเดิม',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร',
            'password.required'=>'กรุณากรอก รหัสผ่านที่ต้องการ',
            'password.confirmed'=>'รหัสผ่านไม่ตรงกัน ',
            'password_confirmation.required'=>'กรุณายืนยัน รหัสผ่าน ',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
           $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return back();

        } else {

            Alert::warning('warning', 'รหัสผ่านเดิมไม่ถูกต้อง');
            return back();
            }


    }
    public function jobs(User $user)
    {
        $position = positionModel::get();
        $department = departmentModel::get() ;
        return view('user.jobs', compact('user','position','department'));
    }
    public function savejobs(User $user, Request $request)
    {
        $request->validate([
           //'department' => 'required',
           //'position' => 'required',
           'name_bank' => 'required',
           'number_bank' => 'required',
        ]
        ,[
            'department.required'=>'กรุณาเลือก',
            'position.required'=>'กรุณาเลือก',
            'name_bank.required'=>'กรุณากรอก',
            'number_bank.required'=>'กรุณากรอก',
        ]);


        if( $user->fill( $request->input() )->update() ){
  
            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return back();
        }
        else{

            Alert::error('error', 'เกิดข้อผิดพลาด');
            return route('jobs');
        }
    }

    public function docs(User $user)
    {

        return view('user.docs', compact('user'));
    }
    public function savedocs(User $user, Request $request)
    {
        // request identification_card
      
        if($request->has('identification_card')){
            if( $user->identification_card ){
                Storage::disk('public')->delete( $user->identification_card );
            }
            $user->identification_card = $request->file('identification_card')->store('identification_card','public');
            if( $user->update() ){

                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return back();
            }
            else{
    
                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        // end request identification_card

        // request house_registration
        if($request->house_registration){
            if( $user->house_registration ){
                Storage::disk('public')->delete( $user->house_registration );
            }
            $user->house_registration = $request->file('house_registration')->store('house_registration','public');
            if( $user->update() ){

                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return back();
            }
            else{
    
                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        // end request house_registration

        // request etc
        if($request->etc){
            if( $user->etc ){
                Storage::disk('public')->delete( $user->etc );
            }
            $user->etc = $request->file('etc')->store('etc','public');
            if( $user->update() ){

                Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
                return back();
            }
            else{
    
                Alert::error('error', 'เกิดข้อผิดพลาด');
                return back();
            }
        }
        // end request etc

        
    }
    function getFile(User $user,Request $request){

        if($request->download == 'identification_card')
        {
            return response()->download(storage_path("app/public/$user->identification_card"));
        }
        if($request->download == 'house_registration')
        {
            return response()->download(storage_path("app/public/$user->house_registration"));
        }
        if($request->download == 'etc')
        {
            return response()->download(storage_path("app/public/$user->etc"));
        }
      
    }
    function admingetfileleave(leave $leave){

        return response()->download(storage_path("app/public/$leave->document"));
   
    }
    public function leave(User $user)
    {
        $leaves = leave::where('user_id','=',$user->id)->get();
        return view('user.leave', compact('user','leaves'));
    }
    public function leavedetail(leave $leave)
    {
    
        return view('user.leavedetail', compact('leave'));
    }
    public function saveleave(User $user, Request $request)
    {

        $request->validate([

        ]
        ,[

        ]);


        if( $user->fill( $request->input() )->update() ){

            Alert::success('success', 'บันทึกข้อมูลสำเร็จ');
            return back();
        }
        else{

            Alert::error('error', 'เกิดข้อผิดพลาด');
            return back();
        }
    }


    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        if( $user->save()){

            return response()->json([
                'message' => 'เปลียนสถานะ',
                'title' => 'chamge',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function identification_card(User $user)
    {
        if( Storage::disk('public')->delete( $user->identification_card ))
        {
            $user->fill([
                'identification_card'=>'',
               ])->update();
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
    public function house_registration(User $user)
    {
        if( Storage::disk('public')->delete( $user->house_registration ))
        {
            $user->fill([
                'house_registration'=>'',
               ])->update();
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
    public function etc(User $user)
    {
        if( Storage::disk('public')->delete( $user->etc ))
        {
            $user->fill([
                'etc'=>'',
               ])->update();
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
 
    public function destroy( User $user)
    {
        foreach (['image', 'identification_card', 'house_registration', 'etc'] as $key) {
            if( $user->{$key} ){
                Storage::disk('public')->delete( $user->{$key} );
            }
        }


        if( $user->delete() ){

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
