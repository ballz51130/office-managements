@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>ข้อมูลการลางาน</h1>
                </div>
                {{-- <div class="page-header-subtitle"></div>
                    --}}
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <form method="GET" action="{{ Route('search') }}" class="form-inline">
                        <input type="text" class="form-control" placeholder="ค้นหา..." id="search" name="search"
                            value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<form action="{{ROUTE('leave.update',$data->id)}}" method="post">
    @csrf
    <div class="card-container container mb-5 mt-3">
        <div class="card p-3">
            <div class="d-flex  justify-content-end  text-right">
                <div class="form-group ">
                    <a href="{{ROUTE('leave.user',Auth::user()->id)}}" class="btn btn-outline-primary"> <span> ย้อนกลับ
                        </span> </a>
                </div>
                <div class="form-group ml-2">
                    <button type="submit" class="btn btn-primary">
                        <span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            บันทึกการแก้ไข </span></button>
                </div>
            </div>
            <div class="page-header-title " data-hook="page-header-title">
                <h3>รายระเอียดการลา</h3>
            <input type="hidden" name="status" value="{{$data->status}}">
            </div>
            
            <div class="form-row mt-2">
                <div class="form-group col-md-8">
                    <label for="write_at">เขียนที่</label>
                <input type="text" class="form-control" id="write_at" name="write_at" value="{{$data->write_at}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="date">วันที่เขียน</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$data->date}}">
                </div>
            </div>
            <div class="form-group">
                <label for="leave_title">เรื่องขอลา</label>
                <input type="text" class="form-control" id="leave_title" name="leave_title" value="{{$data->leave_title}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="dear">เรียน</label>
                    <input type="text" class="form-control" id="dear" name="dear" value="{{$data->dear}}">
                </div>
                <div class="form-group col-md-7">
                    <label for="username">คำนำหน้า ชื่อ-สกุล</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{$data->write_at}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="position">ตำแหน่ง</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{$data->position}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="department">แผนก</label>
                    <input type="text" class="form-control" id="department" name="department" value="{{$data->department}}"  readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="topic">ประเภท</label>
                    <input type="text" class="form-control" id="topic" name="topic" value="{{$data->topic}}">
                </div>
            </div>
            <div class="form-group">
                <label for="detail">เนื่องจาก</label>
                <input type="text" class="form-control" id="detail" name="detail" value="{{$data->detail}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="start_date">ตั้งแต่วันที่</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$data->start_date}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="end_date">ถึงวันที่</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{$data->end_date}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="days">จำนวนวัน</label>
                    <input type="number" class="form-control" id="days" name="days" value="{{$data->days}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="communication">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" id="communication" name="days" value="{{$data->days}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="communication">ใบลาไฟล์แนบ</label>
                    <input type="file" name="" id="" class="form-control">
                </div>
            </div>
        </div>
    </div>
</form>

@include('sweetalert::alert')
@endsection
