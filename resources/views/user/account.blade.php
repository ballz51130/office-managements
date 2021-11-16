@extends('layouts.admin')

@section('content')

    <div class="container">

        {{-- header --}}
        <div class="mt-5 mb-4">
            <div class="media">
                <div class="avatar mr-4">
                    @if(!empty($user->image))
                    <img src="{{asset('storage/'.$user->image)}}">
                    @else
                    @endif
                </div>
                <div class="media-body ml-2">
                    <h1>{{ $user->name }}</h1>
                    <div><h4 class="ml-2">{{ $user->department->name ?? '-' }}</h4></div>
                    
                        <div class="col-9 mt-3">
                            <div class="row">
                            <div class="col-6"><h5>วัน/เดือน/ปีเกิด</h5></div>
                            <div class="col-6"><h5>{{ date('j/M/Y', strtotime($user->brithday)) }}</h5></div>
                            <div class="col-6 mt-3"><h5>หมายเลขติดต่อ</h5></div>
                            <div class="col-6 mt-3"><h5>{{ $user->phone ?? '-' }}</h5></div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- end: heaer --}}


        <ul class="nav nav-tabs nav-profile mb-4">
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}">ข้อมูลพื้นฐาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  active" href="/users/{{ $user->id }}/account">ตั้งค่าบัญชีผู้ใช้</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/password">ตั้งค่ารหัสผ่าน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/jobs">ข้อมูลการจ้างงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/docs">ไฟล์เอกสาร</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/leave">การลา</a>
            </li>
        </ul>


        <form action="/users/{{$user->id}}/account" method="post">
            @csrf

            {{ method_field('PUT') }}

            <div class="card">

                <div class="card-body">

                <div class="row">

                    <div class="col-6">
                        <div class="mb-3 row">
                            <label class="col-3" for="username">UserName</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}">
                                @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label class="col-3" for="email">Email</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                                @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                        </div>
                    </div>
                </div>

            </div>

                <div class="card-footer">

                    <div class="d-flex justify-content-center mt-2">

                        <button type="submit" class="btn btn-primary mr-5">บันทึก</button>
                        <a href="/users" class="btn btn-light">ย้อนกลับ</a>
                    </div>
                </div>


            </div>
        </form>

    </div>
@include('sweetalert::alert')
@endsection
