@extends('layouts.leave')

@section('content')

<center>
    <div class="container pt-5">
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-sm-7">
                <div class="card mb-3" >

                    <center><a href="/leaves" class="btn btn-light float-left ml-2 mt-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <img class="mt-4" src="{{ asset('images/header.png') }}" style="height: 40px;width:auto"></center>

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <h2>ประวัติการลางาน</h2>
                            </div>

                            <div class="col-md-12 mt-3">
                                <form action="{{route('leaves.details')}}" method="POST">
                                    @csrf
                            <div class="d-flex bd-highlight">
                                <div class="flex-grow-1 bd-highlight">
                                    <label for="date" class="font-weight-bold float-left ml-2"> วันที่ทำรายการ</label>
                                            <select class="form-control " name="search" id="search">
                                                  <option value="{{ request()->search ?: '' }}">วันที่ทำรายการ</option>
                                                  @foreach( $leaves AS $i => $value )
                                                  @php
                                                  $sel = '';
                                                  @endphp
                                                  @if( !empty( request()->search ) )
                                                  @if(  request()->search  == $value->id)
                                                  @php
                                                  $sel = 'selected="1"';
                                                  @endphp
                                                  @endif
                                                  @endif
                                                  <option {{ $sel }} value="{{ $value->id ?: '' }}"> {{ date('j M Y', strtotime($value->date))   }}</option>
                                                  @endforeach
                                          </select>
                                </div>

                                <div class="flex-shrink-1 bd-highlight ml-1 ">
                                    <label for="date">&nbsp;</label>
                                    <button class="form-control btn btn-outline-primary text-nowrap" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                              </div>
                            </form>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="leave_id" class="font-weight-bold float-left ml-2"> ประเภทการลา</label>

                                @if(!empty($leaves2->leave_id))
                                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ $leaves2->leaves_type->topic  }}" readonly>
                                @else
                                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ '' }}" readonly>
                                @endif


                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="start_date" class="font-weight-bold float-left ml-2"> ตั้งแต่วันที่</label>
                                @if(!empty($leaves2->start_date))
                                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ date('j M Y', strtotime($leaves2->start_date))   }}" readonly>
                                @else
                                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ '' }}" readonly>
                                @endif

                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="end_date" class="font-weight-bold float-left ml-2"> ถึงวันที่</label>
                                @if(!empty($leaves2->end_date))
                                <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ date('j M Y', strtotime($leaves2->end_date))   }}" readonly>
                                @else
                                <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ '' }}" readonly>
                                @endif

                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="days" class="font-weight-bold float-left ml-2"> จำนวนวันที่ลา</label>
                                @if(!empty($leaves2->days))
                                <input type="text" class="form-control @error('days') is-invalid @enderror" id="days" name="days" value="{{ $leaves2->days }}" readonly>
                                @else
                                <input type="text" class="form-control @error('days') is-invalid @enderror" id="days" name="days" value="{{ '' }}" readonly>
                                @endif

                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="document" class="font-weight-bold float-left ml-2"> เอกสารการลา</label>
                                @if(!empty($leaves2->document))
                                    <form action="{{route('getfileleave', $leaves2)}}" method="post">
                                        @csrf
                                            <button type="submit" class="btn btn-outline-primary col-md-12"><i class="fa fa-download  text-dark mr-1"aria-hidden="true"></i>Download</button>
                                    </form>

                                @else
                                <a  class="btn btn-outline-primary col-md-12" style="padding: 8px 30px;"> ไม่พบเอกสารการลา</a>
                                @endif
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="#" class="font-weight-bold float-left ml-2"> รายละเอียด</label>
                                @if(!empty($leaves2))
                                <a href="{{route('leaves.fulldetail',$leaves2)}}" class="btn btn-outline-primary col-md-12" style="padding: 8px 30px;"> รายละเอียด </a>
                                @else
                                <a href="" class="btn btn-outline-primary col-md-12" style="padding: 8px 30px;"> รายละเอียด </a>
                                @endif


                            </div>

                            <div class="col-md-12 mt-3 text-left ">
                                <label for="#" class="font-weight-bold float-left ml-2"> สถานะ</label>
                                @if(!empty($leaves2->status))
                                @switch($leaves2->status)
                                    @case('รออนุมัติ')
                                    <span  class="badge badge-warning col-md-12 " style="padding: 8px 30px; font-size:17px;"> {{$leaves2->status}}</span>
                                        @break
                                    @case('ผ่านการอนุมัติ')
                                         <span  class="badge badge-success col-md-12 " style="padding: 8px 30px; font-size:17px;"> {{$leaves2->status}}</span>
                                    @break
                                    @case('ไม่ผ่านการอนุมัติ')
                                         <span  class="badge badge-danger col-md-12 " style="padding: 8px 30px; font-size:17px;"> {{$leaves2->status}}</span>
                                    @break
                                @endswitch
                                @if($leaves2->status == 'ไม่ผ่านการอนุมัติ') 
                                <label for="status" class="font-weight-bold float-left ml-2 mt-3"> หมายเหตุ</label>
                                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" value="{{ $leaves2->reason }}" readonly>
                                @endif
                                @else
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ '' }}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/leaves" class="btn btn-lg btn-outline-primary mr-2">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</center>
@endsection
