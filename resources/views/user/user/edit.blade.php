@php
    if(auth()->user()->type == 1){
        $layout = 'layouts.admin' ;
    }
    if(auth()->user()->type == 2){
        $layout = 'layouts.HR' ;
    }
    if(auth()->user()->type == 3){
        $layout = 'layouts.MD' ;
    }
    if(auth()->user()->type == 4){
        $layout = 'layouts.user' ;
    }

@endphp
@extends($layout)

@section('content')
@include('sweetalert::alert')
@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="my-3 px-4 ">
    <div class="card card-body sm-3">
        <div class="row my-3  px-4">
            <div class="col-md-3">
                <label for="file" style="cursor: pointer;"><img id="output" src="{{asset('storage/'.$users->image)}}"
                        width="200" height="200" class="rounded-circle" />

            </div>
            <div class="col-md-9">
                <h2><label for="name" class="font-weight-bold">{{$users->name}}</label></h2>
                <h3><label for="name" class="font-weight-bold">
                @foreach ($position as $ps)
                @if($users->position == $ps->id)
               {{$ps->position_name}}
               @else
               @endif
                @endforeach
                </label></h3>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">วัน/เดือน/ปีเกิด</label>
                    <div class="col-sm-10">
                        <label type="text" readonly class="form-control-plaintext"> {{date('d/m/Y',strtotime($users->brithday))}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
                    <div class="col-sm-10">
                        <label type="text" readonly class="form-control-plaintext">{{$users->phone}} </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- จัดการข้อมูล TAB -->
<ul class="nav nav-pills pt-5 pb-3 px-4" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link " id="information-tab" data-toggle="pill" href="#pills-information" role="tab"
            aria-controls="pills-information" aria-selected="false">ข้อมูลพื้นฐาน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
            aria-controls="pills-profile" aria-selected="false">ตั้งค่าบัญชีผู้ใช้</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-password -tab" data-toggle="pill" href="#pills-password " role="tab"
            aria-controls="pills-password" aria-selected="false">รหัสผ่าน</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="pills-doucument-tab" data-toggle="pill" href="#pills-doucument" role="tab"
            aria-controls="pills-doucument" aria-selected="false">ไฟล์เอกสาร</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-leave-tab" data-toggle="pill" href="#pills-leave" role="tab"
            aria-controls="pills-leave" aria-selected="false">การลา</a>
    </li>
</ul>
<!-- ส่วนท้าย จัดการข้อมูล TAB -->



{{-- การจัดการข้อมูล --}}
<div class="tab-content" id="pills-tabContent">


    {{-- ข้อมูลพื้นฐาน --}}
    @if (session('imformation'))
    <div class="tab-pane fade show active" id="pills-information" role="tabpanel" aria-labelledby="information-tab">
        @else
        <div class="tab-pane fade" id="pills-information" role="tabpanel" aria-labelledby="information-tab">
            @endif
            <form class="my-3 px-4" method="POST" action="{{ROUTE('user.update',$users->id)}}"
                enctype="multipart/form-data">
                @csrf
                <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                    class="rounded-circle" alt="Cinque Terre" style="display: none;"></p>
                <div class="card card-body sm-3">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title_name" class="font-weight-bold">คำนำหน้าชื่อ </label>
                            <select name="title_name" id="title_name"
                                class="form-control @error('title_name') is-invalid @enderror">
                                <option value="{{ $users->title_name ? :  old('title_name') }}" class="form-control">
                                    {{ $users->title_name ?: old('title_name') ? :'เลือกคำนำหน้า' }}</option>
                                <option value="นาย"> นาย </option>
                                <option value="นาง"> นาง </option>
                                <option value="นางสาว"> นางสาว </option>
                            </select>

                            @error('title_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-5 offset-md-1">
                            <label for="email" class="font-weight-bold">Email Address </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror " id="email"
                                name="email" value="{{ $users->email ? :  old('email') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name" class="font-weight-bold">ชื่อ - สกุล </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{$users->name ? : old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="brithday" class="font-weight-bold">วัน/เดือน/ปีเกิด </label>
                            <input type="date" class="form-control @error('brithday') is-invalid @enderror" id="brithday"
                                name="brithday" value="{{ date('m/d/Y',strtotime($users->brithday)) ?: old('brithday', date('Y-m-d'))  }}">
                             
                            @error('brithday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="phone" class="font-weight-bold">เบอร์โทรศัพท์ </label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{$users->phone ? : old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="house_number" class="font-weight-bold">ที่อยู่ - เส้นทาง </label>
                            <input type="text" class="form-control @error('house_number') is-invalid @enderror"
                                id="house_number" name="house_number"
                                value="{{ $users->house_number ? :  old('house_number') }}">
                            @error('house_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="province" class="font-weight-bold">จังหวัด </label>
                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                                id="province" name="province" value="{{ $users->province ? : old('name') }}">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="zipcode" class="font-weight-bold">รหัสไปรษณีย์ </label>
                            <input type="number" class="form-control @error('zipcode') is-invalid @enderror"
                                id="zipcode" name="zipcode" value="{{$users->zipcode ? : old('zipcode') }}">
                            @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="amphures" class="font-weight-bold">อำเภอ </label>
                            <input type="text" class="form-control @error('amphures') is-invalid @enderror"
                                name="amphures" id="amphures" value="{{ $users->amphures ? : old('amphures') }}">
                            @error('amphures')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="district" class="font-weight-bold">ตำบล </label>
                            <input type="text" class="form-control @error('district') is-invalid @enderror"
                                id="district" name="district" value="{{$users->district ? : old('district') }}">
                            @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">บันทึก</button>

                </div>
                <!-- div card -->
            </form>

        </div>
        {{-- ส่วนท้ายข้อมูลพื้นฐาน --}}

        {{-- บัญชีผู้ใช้ --}}
        @if (session('profile'))
        <div class="tab-pane show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @else
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @endif


                <form class="my-3 px-4" action="{{ Route('user.profile',$users->id) }}" method="post">
                    @csrf
                    <div class="card card-body sm-3">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="username" class="font-weight-bold">Username </label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ $users->username ? : old('username') }}">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5 offset-md-2">
                                <label for="email" class="font-weight-bold">Email </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{  $users->email ? : old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">บันทึก</button>

                    </div>
                    <!-- div card -->

                </form>

            </div>
            {{-- ส่วนท้ายบัญชีผู้ใช้ --}}

            {{-- รหัสผ่าน --}}
            @if (session('password'))
            <div class="tab-pane fade show active" id="pills-password" role="tabpanel"
                aria-labelledby="pills-password-tab">
                @else
                <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                    @endif

                    <form class="my-3 px-4" method="POST" action="{{ROUTE('user.resetpassword',$users->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card card-body sm-3">

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror"
                                        name="old_password" autocomplete="new-old_password">

                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                        <!-- div card -->
                    </form>

                </div>
                {{-- ส่วนท้าย --}}

                    <div class="tab-pane fade" id="pills-doucument" role="tabpanel"
                        aria-labelledby="pills-doucument-tab">

                        <div class="card-container container mb-5 mt-3">
                            <div class="card">
                                <table class="m-3" style="width: 500px;">
                                    <thead>
                                        <tr>
                                            <th ></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td> 
                                                <div class="media media-user">
                                                    
                                                    <div class="avatar">
                                                    <img src="{{asset('storage/photos/no-photo.png')}}">
                                                </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs-16">รายชื่อเอกสาร.pdf</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="http://"  class="btn btn-light"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                              </svg>  </a> </td> 
                    
                                        </tr>
                                    @endfor
                                    </tbody>
                    
                                </table>
                    
                                <div class="card-footer d-flex  justify-content-center" style="height: 200px;">
                                   <h5 class="mt-5"> Darg and Drop File To upload </h5>
                                </div>
                            </div>
                        </div>
                            <!-- div card -->
                        

                    </div>
                    {{-- ส่วนท้ายบัญชีผู้ใช้ --}}

                    <div class="tab-pane fade" id="pills-leave" role="tabpanel" aria-labelledby="pills-leave-tab">

                        <form class="my-3 px-4" action="" method="post">
                            @csrf
                            <div class="card">
                                <div class="row mt-2">
                                    <div class="col-sm-2">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">แสดง</label>
                                            <div class="col-sm-9">
                                              <select name="" id="" class="form-control text-center">
                                                  <option value="5">5</option>
                                                  <option value="10">10</option>
                                                  <option value="15">15</option>
                                                  <option value="20">20</option>
                                              </select>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">จาก</label>
                                            <div class="col-sm-9">
                                             <input type="date" name="" id="" class="form-control">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">ถึง</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="" id="" class="form-control">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">ประเภทการลา</label>
                                            <div class="col-sm-9">
                                              <select name="" id="" class="form-control">
                                                  <option value="ลาป่วย">ลาป่วย</option>
                                                  <option value="ลากิจ">ลากิจ</option>
                                                  <option value="ลาพักร้อน">ลาพักร้อน</option>
                                              </select>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-secondary mt-1 ">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                            </svg>
                                        </button>         
                                    </div>
                                </form>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ประเภทการลา</th>
                                            <th>วันที่ลา</th>
                                            <th>วันที่ทำรายการ</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"></label>
                                                </div>
                                            </th>
                                            <td>ลาป่วย</td>
                                            <td>10 ม.ค - 12 ม.ค 63</td>
                                            <td>10 ม.ค.63</td>
                                            <td>
                                            <td>
                                               <a href="" class="btn btn-warning">
                                                   <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                                    </svg>
                                                    รายละเอียด
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                    </div>
                    <!-- div card -->
                  

                </div>
                {{-- ส่วนท้ายบัญชีผู้ใช้ --}}

                @endsection
                <script>
                    var loadFile = function (event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };

                </script>
