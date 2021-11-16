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

        <div class="card">
                <table class="table mt-1">
                    <thead class="badge-primary">
                        <tr>
                            <th></th>
                            <th>ประเภทการลา</th>
                            <th>วันที่ลา</th>
                            <th>วันที่ทำรายการ</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                       
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1"></label>
                                </div>
                            </td>
                           <td>{{$leave->leaves_type->topic}}</td>
                           <td>{{ date('d M ', strtotime($leave->start_date)) }} - {{ date('d M Y', strtotime($leave->end_date)) }}</td>
                           <td>{{$leave->date}}</td>
                           <td>
                            <a href="{{ROUTE('user.leavedetail', $leave, $user )}}" class="btn btn-warning">
                                <i class="fa fa-exclamation fa-lg" aria-hidden="true"></i>
                                รายละเอียด
                            </a>
                            @if($leave->document == '')
                            <span class="btn btn-light"> ไม่มีเอกสารประกาอบการลา</span>
                            @else
                            <a href="{{asset('storage/'.$leave->document)}}" class="btn btn-primary"
                                target="_blank" rel="noopener noreferrer">  <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                                เอกสารประกาอบการลา</a>
                            </a>
                            @endif
                        </td>

                        </tr>  
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

</div>
@include('sweetalert::alert')
@endsection
