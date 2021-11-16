@extends('layouts.leave')

@section('content')

<center>
    <div class="container pt-5">
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-sm-7">
                <div class="card mb-5" >

                    <center><a href="{{ROUTE('leaves.detail')}}" class="btn btn-light float-left ml-2 mt-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <img class="mt-4" src="{{ asset('images/header.png') }}" style="height: 40px;width:auto"></center>

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <h2>แจ้งข้อมูลการขอลางาน</h2>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="write_at" class="font-weight-bold float-left ml-2"> เขียนที่</label>
                                <input type="text" class="form-control @error('write_at') is-invalid @enderror" id="write_at" name="write_at" value="{{ $leave->write_at }}" readonly>
                                @error('write_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="date" class="font-weight-bold float-left ml-2"> วัน/เดือน/ปี</label>
                                <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ date('j M Y', strtotime($leave->date))   }}" readonly>
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="leave_title" class="font-weight-bold float-left ml-2"> เรื่องที่ขอลา</label>
                                <input type="text" class="form-control @error('leave_title') is-invalid @enderror" id="leave_title" name="leave_title" value="{{$leave->leave_title }}" readonly>
                                @error('leave_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="dear" class="font-weight-bold float-left ml-2"> เรียน</label>
                                <input type="text" class="form-control @error('dear') is-invalid @enderror" id="dear" name="dear" value="{{ $leave->dear }}" readonly>
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
                                <input type="text" class="form-control @error('detail') is-invalid @enderror" id="leave_id" name="leave_id" value="{{ $leave->leaves_type->topic }}" readonly>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="detail" class="font-weight-bold float-left ml-2"> เนื่องจาก</label>
                                <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" value="{{ $leave->detail  }}" readonly>
                                @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="start_date" class="font-weight-bold float-left ml-2"> ตั้งแต่วันที่</label>
                                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ date('j M Y', strtotime($leave->start_date))   }}" readonly>
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="end_date" class="font-weight-bold float-left ml-2"> ถึงวันที่</label>
                                <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ date('j M Y', strtotime($leave->end_date))   }}" readonly>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="days" class="font-weight-bold float-left ml-2"> จำนวนวัน</label>
                                <input type="text" class="form-control @error('days') is-invalid @enderror" id="days" name="days" value="{{$leave->days }}" readonly>
                                @error('days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="communication" class="font-weight-bold float-left ml-2"> เบอร์ติดต่อ</label>
                                <input type="text" class="form-control @error('communication') is-invalid @enderror" id="communication" name="communication" value="{{$leave->communication}}" readonly>
                                @error('communication')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="document" class="font-weight-bold text-center ">ใบลาไฟล์แนบ</label>
                                @if($leave->document == '')
                                <div class="d-flex justify-content-center">
                                    <span class="">ไมมีไฟล์เอกสารแนบ</span>
                                </div>


                                @else
                                <form action="{{route('getfileleave', $leave)}}" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-light "><i class="fa fa-download  text-dark mr-1"aria-hidden="true"></i>Download</button>
                                    </div>

                                </form>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3 text-left ">
                                <label for="#" class="font-weight-bold float-left ml-2"> สถานะ</label>
                                @if(!empty($leave->status))
                                @switch($leave->status)
                                    @case('รออนุมัติ')
                                    <span  class="badge badge-warning col-md-12 " style="padding: 8px 30px; font-size:17px;"> {{$leave->status}}</span>
                                        @break
                                    @case('ผ่านการอนุมัติ')
                                         <span  class="badge badge-success col-md-12 " style="padding: 8px 30px; font-size:17px;"> {{$leave->status}}</span>
                                    @break
                                    @case('ไม่ผ่านการอนุมัติ')
                                         <span  class="badge badge-danger col-md-12 " style="padding: 8px 30px; font-size:17px;"> {{$leave->status}}</span>
                                    @break
                                @endswitch
                                @if($leave->status == 'ไม่ผ่านการอนุมัติ') 
                                <label for="status" class="font-weight-bold float-left ml-2 mt-3"> หมายเหตุ</label>
                                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" value="{{ $leave->reason }}" readonly>
                                @endif
                                @else
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ '' }}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-3">
                        <a href="{{ROUTE('leaves.detail')}}" class="btn btn-lg btn-outline-primary mr-2">ย้อนกลับ</a>

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
