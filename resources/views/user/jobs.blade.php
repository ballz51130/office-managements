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
                <a class="nav-link" href="/users/{{ $user->id }}/account">ตั้งค่าบัญชีผู้ใช้</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/password">ตั้งค่ารหัสผ่าน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/users/{{ $user->id }}/jobs">ข้อมูลการจ้างงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/docs">ไฟล์เอกสาร</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/leave">การลา</a>
            </li>
        </ul>


        <form action="/users/{{$user->id}}/jobs" method="post">
            @csrf
          
            {{ method_field('PUT') }}

            <div class="card">

                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="pos_id" class="font-weight-bold">ตำแหน่งงาน</label>
                            <select class="form-control {{ !empty( $errors->first('pos_id')) ? 'is-invalid' : '' }}"
                                name="pos_id" id="pos_id">
                                <option value="" class="form-control">-เลือกตำแหน่งงาน-</option>

                                @foreach($position AS $key => $position )

                                @php
                                    $sel1 = ''; // ตั้งค่าตัวแปล
                                @endphp

                                @if( !empty($user->pos_id) )

                                    @if($position->id == $user->pos_id )
                                        @php
                                            $sel1='selected="1"';
                                        @endphp
                                    @endif

                                @endif

                                @if($position->id == old('position'))
                                    @php
                                        $sel1 = 'selected="1"';
                                    @endphp
                                @endif
                                <option class="form-control" {{ $sel1 }} value="{{$position->id }}">
                                    {{ $position->name }}</option>
                                @endforeach

                            </select>
                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="dep_id" class="font-weight-bold">แผนกงาน </label>
                            <select class="form-control {{ !empty( $errors->first('dep_id')) ? 'is-invalid' : '' }}"
                                name="dep_id" id="dep_id">
                                <option value="" class="form-control">-เลือกแผนกงาน-</option>
                                    
                                @foreach($department AS $key => $department )
                                @php
                                    $sel2 = ''; // ตั้งค่าตัวแปล
                                @endphp

                                @if( !empty($user->dep_id) )

                                    @if($department->id == $user->dep_id )
                                        @php
                                            $sel2='selected="1"';
                                        @endphp
                                    @endif

                                @endif

                                @if($department->id == old('department'))
                                    @php
                                        $sel2 = 'selected="1"';
                                    @endphp
                                @endif
                                <option class="form-control" {{ $sel2 }} value="{{$department->id }}">
                                    {{ $department->name }}</option>
                                @endforeach

                            </select>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="number_bank" class="font-weight-bold">บัญชีการชำระเงิน</label>
                            <input type="text"
                                class="form-control @error('number_bank') is-invalid @enderror"
                                id="number_bank" name="number_bank"
                                value="{{$user->number_bank ? : old('number_bank') }}">
                            @error('number_bank')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="name_bank" class="font-weight-bold">ธนาคาร</label>
                            <select name="name_bank" id="name_bank"
                                class="form-control @error('name_bank') is-invalid @enderror">
                                <option value="{{ $user->name_bank ? :  old('name_bank') }}"
                                    class="form-control">
                                    {{ $user->name_bank ?: old('name_bank') ? :'เลือกธนาคาร' }}</option>
                                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                            </select>
                            @error('name_bank')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
