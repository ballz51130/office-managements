@extends('layouts.app')

@section('content')

<center>
    <div class="container pt-5">
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-sm-7">
                <div class="card mb-5" >
                    <center><a href="/leaves" class="btn btn-light float-left ml-2 mt-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <img class="mt-4" src="{{ asset('images/header.png') }}" style="height: 40px;width:auto"></center>

                    <form class="my-5" method="POST" action="{{route('leaves.save')}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <h2>แจ้งข้อมูลการขอลางาน</h2>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="write_at" class="font-weight-bold float-left ml-2"> เขียนที่</label>
                                <input type="text" class="form-control @error('write_at') is-invalid @enderror" id="write_at" name="write_at" value="{{ old('write_at') }}">
                                @error('write_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="date" class="font-weight-bold float-left ml-2"> วัน/เดือน/ปี</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="leave_title" class="font-weight-bold float-left ml-2"> เรื่องที่ขอลา</label>
                                <input type="text" class="form-control @error('leave_title') is-invalid @enderror" id="leave_title" name="leave_title" value="{{ old('leave_title') }}">
                                @error('leave_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="dear" class="font-weight-bold float-left ml-2"> เรียน</label>
                                <input type="text" class="form-control @error('dear') is-invalid @enderror" id="dear" name="dear" value="{{ old('dear') }}">
                                @error('dear')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="username" class="font-weight-bold float-left ml-2"> คำนำหน้า ชื่อ-สกุล</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ Auth::user()->title_name .' '. Auth::user()->name  }}" readonly>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="position" class="font-weight-bold float-left ml-2"> ตำแหน่งงาน</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ Auth::user()->position->name}}" readonly>
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="departments" class="font-weight-bold float-left ml-2"> แผนกงาน</label>
                                <input type="text" class="form-control @error('departments') is-invalid @enderror" id="departments" name="departments" value="{{  Auth::user()->department->name }}" readonly>
                                @error('departments')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="leave_id" class="font-weight-bold float-left ml-2"> ประเภทการลา</label>
                                <select class="form-control {{ !empty( $errors->first('leave_id')) ? 'is-invalid' : '' }}"
                                    name="leave_id" id="leave_id">
                                    <option value="" class="form-control"> เลือกประเภทการลา </option>
        
                                    @foreach($leave_type AS $key => $leave )
        
                                    @php
                                    $sel1 = ''; // ตั้งค่าตัวแปล
                                    @endphp
        
                                    @if($leave->id == old('leave_id'))
                                    @php
                                    $sel1 = 'selected="1"';
                                    @endphp
                                    @endif
                                    <option class="form-control" {{ $sel1 }} value="{{$leave->id }}">
                                        <label for="role-1" class="custom-control-label">
                                            <div> <b>{{ $leave->topic }} </b></div>
                                         
                                        </label>
                                        @endforeach
        
                                </select>
                                @error('leave_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="detail" class="font-weight-bold float-left ml-2"> เนื่องจาก</label>
                                <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" value="{{ old('detail') }}">
                                @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="start_date" class="font-weight-bold float-left ml-2"> ตั้งแต่วันที่</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="end_date" class="font-weight-bold float-left ml-2"> ถึงวันที่</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="days" class="font-weight-bold float-left ml-2"> จำนวนวัน</label>
                                <input type="number" class="form-control @error('days') is-invalid @enderror" id="days" name="days" value="{{ old('days') }}">
                                @error('days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="communication" class="font-weight-bold float-left ml-2"> เบอร์ติดต่อ</label>
                                <input type="text" class="form-control @error('communication') is-invalid @enderror" id="communication" name="communication" value="{{ old('communication') }}">
                                @error('communication')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="document" class="font-weight-bold float-left ml-2">ใบลาไฟล์แนบ</label>
                                <input class="form-control" type="file" id="document" name="document">
                                @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                                <a href="/leaves" class="btn btn-sm btn-outline-primary mr-2" style="font-size: 12px">ยกเลิกการขอลางาน</a>
                                <button class="btn btn-sm btn-primary text-white" type="submit" style="font-size: 12px"><i class="fa fa-plus"></i> บันทึกการลางาน</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
</center>
@include('sweetalert::alert')

@endsection
