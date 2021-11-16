@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>ข้อมูลการลางาน</h1>
                </div>
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

<div class="card-container container mb-5 mt-3">
    <div class="card p-3">
        <div class="page-header-title" data-hook="page-header-title">
            <h3>ข้อมูลการลางาน</h3>
        </div>
         
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="write_at">เขียนที่</label>
                    <input type="text" class="form-control" id="write_at" name="write_at" value="{{$leave->write_at}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="date">วันที่เขียน</label>
                    <input type="text" class="form-control" id="date" name="date"
                        value="{{ date('d/m/Y', strtotime($leave->date)) }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="leave_title">เรื่องขอลา</label>
                <input type="text" class="form-control" id="leave_title" name="leave_title"
                    value="{{$leave->leave_title}}" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="dear">เรียน</label>
                    <input type="text" class="form-control" id="dear" name="dear" value="{{$leave->dear}}" readonly>
                </div>
                <div class="form-group col-md-7">
                    <label for="username">คำนำหน้า ชื่อ-สกุล</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{$leave->user->name}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="position">ตำแหน่ง</label>
                    <input type="text" class="form-control" id="position" name="position"
                        value="{{$leave->user->position->name}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="department">แผนก</label>
                    <input type="text" class="form-control" id="department" name="department"
                        value="{{$leave->user->department->name}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="topic">ประเภท</label>
                    <input type="text" class="form-control" id="topic" name="topic" value="{{$leave->leaves_type->topic}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="detail">เนื่องจาก</label>
                <input type="text" class="form-control" id="detail" name="detail" value="{{$leave->detail}}" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start_date">ตั้งแต่วันที่</label>
                    <input type="text" class="form-control" id="start_date" name="start_date"
                        value="{{ date('d/m/Y', strtotime($leave->start_date)) }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="end_date">ถึงวันที่</label>
                    <input type="text" class="form-control" id="end_date" name="end_date"
                        value="{{ date('d/m/Y', strtotime($leave->end_date)) }}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="days">จำนวนวัน</label>
                    <input type="text" class="form-control" id="days" name="days" value="{{$leave->days}}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="communication">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" id="communication" name="communication"
                        value="{{$leave->communication}}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="communication">ใบลาไฟล์แนบ</label>
                    @if($leave->document == '')
                            <span class="btn btn-light"> ไม่มีเอกสารประกาอบการลา</span>
                            @else
                            <form action="{{route('admingetfileleave', $leave)}}" method="post">
                                @csrf
                                    <button type="submit" class="btn btn-outline-primary col-md-12"><i class="fa fa-download  text-dark mr-1"aria-hidden="true"></i>Download</button>
                            </form>
                            @endif
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <h3>สถานะการลางาน</h3>
              
            </div>
            @if ($leave->status == 'รออนุมัติ')
            <div class="d-flex justify-content-center mt-3">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle col-md-12" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     จัดการคำขอ
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button" data-toggle="modal" data-target="#approve">อนุมัติคำขอ</button>
                      <button class="dropdown-item" type="button" data-toggle="modal" data-target="#notapprove">ไม่อนุมัติคำขอ</button>
                    </div>
                  </div>
                @include('leave.model.approve')
                @include('leave.model.notapprove')
               
            </div>
            <div class="d-flex justify-content-center ml-2">
               
               
                <div class="d-flex">
                    <a href="{{ROUTE('leave')}}" class="btn btn-primary ">ย้อนกลับ </a>
                </div>
            </div>
            @else
            <div class="d-flex justify-content-center">
            @switch($leave->status)

            @case('ผ่านการอนุมัติ')
            
            <h5>    <span class="badge badge-success   text-white">{{$leave->status}}</span></h5> 

           
            @break

            @case('ไม่ผ่านการอนุมัติ')
           
               
           
                <div class="row col-6">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <h5 class=" text-center">    <span class="badge badge-danger text-white text-center">{{$leave->status}}</span> </h3> 
                        </div>
                        <label for="status_detail"> หมายเหตุ </label>
                        <textarea type="text" class="form-control"  cols="30" rows="5" readonly >{{$leave->reason}}</textarea>
                    
                    </div>
                    </div>
            
            @break
            @endswitch
        </div>
            <div class="d-flex justify-content-center mt-3">
               
               
                <div class="d-flex">
                    <a href="{{ROUTE('leave')}}" class="btn btn-primary ">ย้อนกลับ </a>
                </div>
            </div>
            @endif
           
           
    </div>
</div>
@include('sweetalert::alert')
@endsection
