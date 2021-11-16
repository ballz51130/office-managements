@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>เพิ่มใบลางาน</h1>
                </div>
                {{-- <div class="page-header-subtitle"></div>
                    --}}
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <form method="GET" action="{{ Route('search') }}" class="form-inline">
                        <input type="text" class="form-control" placeholder="ค้นหา..." id="search" name="search"
                            value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
                        <button type="submit" class="btn btn-primary ml-1"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="card-container container mb-5 mt-3">
    <div class="card p-3">
    <div class="page-header-title" data-hook="page-header-title">
        <h3>ข้อมูลการลางาน</h3>
    </div>
<form action="{{ route('leave.save') }}" method="post">
    @csrf
        <input type="hidden" name="user_id" value="1">
        <div class="form-row">
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
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="position">ตำแหน่งงาน</label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}">
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="department">แผนกงาน</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}">
                @error('department')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="topic">ประเภท</label>
                <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}">
                @error('topic')
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
            <div class="form-group col-md-3">
                <label for="start_date">ตั้งแต่วันที่</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="end_date">ถึงวันที่</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-1">
                <label for="days">จำนวนวัน</label>
                <input type="number" class="form-control @error('days') is-invalid @enderror" id="days" name="days" value="{{ old('days') }}">
                @error('days')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
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
                <input type="file" name="document" id="document" class="form-control @error('document') is-invalid @enderror">
                @error('document')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="form-group col-md-3">
             <button type="submit" class="btn btn-primary col-md-12" >ยืนยัน</button>

            </div>
            <div class="form-group col-md-3">
            <a href="{{ROUTE('leave')}}" class="btn btn-primary col-md-12">ย้อนกลับ </a>
            </div>
          </div>
    </form>
</div>
</div>
@include('sweetalert::alert')
@endsection
