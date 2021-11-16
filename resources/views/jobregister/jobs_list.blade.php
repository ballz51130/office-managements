@extends('layouts.app')

@section('content')
<div class="container p-5">
    <br>
    <center><img src="{{ asset('images/header.png') }}" style="height: 70px;width:auto"></center>
    <br><br>
    <center>
        <h3>รับสมัครพนักงาน</h3>
    </center>
</div>
<div class="container">
    <div class="row">
        <div class="card">
          <div class="card-body">
            <div class="row ">
              @foreach ($jobs as $i => $job)
              <div class="col-md-4 p-2">
                  <div class="card" style="max-width: 24rem;">
                    <div class="image text-center">
                        @if($job->image)
                        <img src="{{asset('storage/'.$job->image)}}" style="max-width : 250px; width : 300px; height:250px; " >
                        @else
                        <div class="d-flex justify-content-center">
                            <div class="avatar2 mt-3" ></div>
                        </div>
                        
                        @endif
                    </div>
                      
                      <div class="card-body">
                          {{-- นับเวลถอยหลัง --}}
                          @php
                          $str = date('M d Y', strtotime($job->end));
                          $str = (strtotime($str)) - strtotime(date("M d Y ")) ;
                          $date =$str/3600/24;
                          $hour = date('H', strtotime($job->end_time)) - date('H', strtotime($mytime)) ;
                          @endphp
                          <p class="card-title float-right text-danger">

                              @php
                                if($job->status == 'เปิดรับสมัคร')
                                {
                                if($job->start == '' )
                                   {
                                    echo('ไม่กำหนดเวลาการรับสมัคร');
                                   }
                               else if($date > 0)
                                {
                                echo( 'เหลืออีก' .'&nbsp'. $date .'&nbsp'. 'วัน');
                                }
                                else if($date == 0) {
                                if($hour>0)
                                {
                                echo( 'เหลืออีก' .'&nbsp'. $hour .'&nbsp'. 'ชั่วโมง');
                                }
                                else {
                                echo('หมดเขตการสมัคร');
                                }
                                }
                                else {
                                echo('หมดเขตการสมัคร');
                                }
                            }
                            else {
                                echo('ปิดรับสมัคร');
                            }
                                @endphp
                          </p>
                          <h5 class="card-title">{{$job->position}}</h5>
                          <p class="card-text">{{$job->subtitle}}</p>
                      </div>
                      <div class="card-body">
                          <p class="card-title float-left"><i class="fas fa-briefcase"></i> {{$job->salary}}/เดือน</p>
                          <a href="{{ROUTE('job.jobsdetail',$job)}}"
                              class="card-link float-right text-dark">ดูรายละเอียด</a>
                      </div>
                  </div>
              </div>

              @endforeach
            </div>
          </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>ผลลัพท์ทั้งหมด {{ number_format($jobs->total()) }} รายการ</div>
                <div>{{ $jobs->links() }}</div>
            </div>
        </div>
      </div>
    </div>

</div>

@include('sweetalert::alert')
@endsection
