@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>แจ้งข้อมูลการลางาน</h1>
                </div>
                {{-- <div class="page-header-subtitle"></div>
                    --}}
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <form method="GET" action="{{ Route('search') }}" class="form-inline">
                        <input type="text" class="form-control mr-1" placeholder="ค้นหา..." id="search" name="search"
                            value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

    <div class="card-container container mb-5 mt-3">
        <div class="card p-3">
            <div class="d-flex  justify-content-end  text-right">
                <div class="form-group ">
                        <a href="{{ROUTE('leave.user',Auth::User()->id)}}"  class="btn btn-outline-primary">ยกเลิกการขอลางาน</a>
                </div>
                <div class="form-group ml-2">
                    <button onclick="submit()" class="btn btn-primary">
                        <span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg>
                        บันทึกการลางาน </span></button>
                   </div>
              </div>
              <form id="Form" action="{{ route('leave.user.save')}}"  method="post" enctype="multipart/form-data">
                @csrf
             
        <div class="page-header-title " data-hook="page-header-title">
            <h3>รายระเอียดการลา</h3>
        </div>
        <div class="form-row mt-2">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group col-md-8">
                <label for="write_at">เขียนที่</label>
                <input type="text" class="form-control @error('write_at') is-invalid @enderror" id="write_at" name="write_at" value="{{ old('write_at') }}">
                    @error('write_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                    @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="date">วันที่เขียน</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="leave_title">เรื่องขอลา</label>
            <input type="text" class="form-control @error('leave_title') is-invalid @enderror" id="leave_title" name="leave_title" value="{{ old('leave_title') }}">
                @error('leave_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="dear">เรียน</label>
                <input type="text" class="form-control @error('dear') is-invalid @enderror" id="dear" name="dear" value="{{ old('dear') }}">
                @error('dear')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-7">
                <label for="username">คำนำหน้า ชื่อ-สกุล</label>
                <input type="text" class="form-control " value="{{$user->name}}" readonly>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="position">ตำแหน่งงาน</label>
            <input type="text" class="form-control" id="position" name="position" value="{{$user->position_name}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="departments">แผนกงาน</label>
            <input type="hidden" name="department" value="{{Auth::user()->department}}">
                <input type="text" class="form-control" id="departments" name="departments" value="{{$user->department_name}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="leave_id">ประเภทการลา</label>
                            <select class="form-control {{ !empty( $errors->first('leave_id')) ? 'is-invalid' : '' }}"
                                name="leave_id" id="leave_id">
                                <option value="" class="form-control">เลือกประเภทการลา</option>

                                @foreach($leave_type AS $key => $leave_type )

                                @php
                                    $sel1 = ''; // ตั้งค่าตัวแปล
                                @endphp

                                @if( !empty($users->leave_id) )

                                    @if($leave_type->id == $users->leave_id )
                                        @php
                                            $sel1='selected="1"';
                                        @endphp
                                    @endif

                                @endif

                                @if($leave_type->id == old('leave_id'))
                                    @php
                                        $sel1 = 'selected="1"';
                                    @endphp
                                @endif
                                <option class="form-control" {{ $sel1 }} value="{{$leave_type->id }}">
                                    <label for="role-1" class="custom-control-label">
                                        <div> <b>{{ $leave_type->id }} : </b></div>
                                        <div class="fs-13 text-muted">{{$leave_type->topic}}</div>
                                    </label>
                                @endforeach

                            </select>
                    @error('leave_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="detail">เนื่องจาก</label>
            <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" value="{{ old('detail') }}">
                @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="start_date">ตั้งแต่วันที่</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="end_date">ถึงวันที่</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="days">จำนวนวัน</label>
                <input type="text" class="form-control @error('days') is-invalid @enderror" id="days" name="days" value="{{ old('days') }}">
                @error('days')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="communication">เบอร์ติดต่อ</label>
                <input type="text" class="form-control @error('communication') is-invalid @enderror" id="communication" name="communication" value="{{ old('communication') }}">
                @error('communication')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="document">ใบลาไฟล์แนบ</label>
             <input type="file" name="document" id="document" value="">
            </div>
        </div>
      
    </form>
</div>
</div>
<script>
    function submit() {
      document.getElementById("Form").submit();
    }
    </script>
@include('sweetalert::alert')
@endsection
