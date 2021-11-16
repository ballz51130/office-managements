@extends('layouts.app')

@section('content')
<center>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12 ">
                <div class="col-sm-7">
                    <br>
                    <center><img src="{{ asset('images/header.png') }}" style="height: 60px;width:auto"></center>
                    <br><br>
                    <div class="menu text-left">

                        <a href="/job" class="btn btn-light"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i></a>
                        <span> Home > {{$job->position}} </span>
                    </div>
                    <div class="card mt-2">
                        <div class="image text-center">
                            @if($job->image)
                            <img src="{{asset('storage/'.$job->image)}}" style="max-width : 250px; width : 300px; height:250px; "  >
                            @else
                            <div class="d-flex justify-content-center">
                                <div class="avatar2 mt-3" ></div>
                            </div>
                            
                            @endif
                        </div>

                        <div>
                            {{-- นับเวลถอยหลัง --}}
                            @php
                            $str = date('M d Y', strtotime($job->end));
                            $str = (strtotime($str)) - strtotime(date("M d Y ")) ;
                            $date =$str/3600/24;
                            $hour = date('H', strtotime($job->end_time)) - date('H', strtotime($mytime)) ;
                            @endphp
                            <p class="card-title float-right mr-4 text-danger ">
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
                        </div>
                        <div class="card-body text-center ml-4">
                            <h3 class="card-title text-center">{{$job->position}}</h3>
                            <h6 class="card-title text-center">{{$job->salary}} /เดือน</h6>
                        </div>  
                        <div class="container">
                            <div class="col-4 float-left">
                                <p class="float-left ml-5"><i class="fa fa-briefcase" style="font-size: 3em;"></i></p>
                                <span class="card-title float-left ml-5">{{$job->position}}</span>
                            </div>
                            <div class="col-4 float-right ml-4">
                                <p class="float-right mr-5"><i class="fa fa-user" style="font-size: 3em;"></i></p>
                                <p class="card-title float-right mr-5">{{$job->quantity}} อัตรา</p>
                            </div>
                            <div class="col-4 text-center">
                                <p class="text-center ml-4"><i class="fa fa-clock-o" style="font-size: 3em;"></i></p>
                                <p class="card-title text-center ml-4">{{$job->type}}</p>
                            </div>

                            <div class="text-center ml-4">
                                @if ($job->status == 'เปิดรับสมัคร')
                                @if  ($job->start == '')
                                <a href="{{ROUTE('job.create',$job)}}" class="btn btn-primary btn-sm col-md-4">สมัครงาน</a>
                                @elseif($date > 0)
                                <a href="{{ROUTE('job.create',$job)}}" class="btn btn-primary btn-sm col-md-4">สมัครงาน
                                </a>
                                @else
                                <button class="btn btn-danger btn-sm col-md-4">หมดเขตการสมัคร </button>
                                @endif
                                @else
                                <span class="btn btn-danger btn-sm col-md-4">ปิดการรับสมัคร </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <ul class="list-group list-group-flush text-left">
                            <li class="list-group-item ">
                                <h3 class="card-title text-center">สวัสดิการของบริษัท</h3><br>
                                @foreach ($job->jobs_welfare as $value)
                                <p class="ml-5"> <i class="fa fa-star mr-2"
                                        style="font-size: 1.2em;"></i>{{$value->detail}}</p>
                                @endforeach
                            </li>
                            <li class="list-group-item">
                                <h3 class="card-title text-center">คุณสมบัตรของผู้สมัคร</h3><br>
                                @foreach ($job->jobs_property as $value)
                                <p class="ml-5"> <i class="fa fa-star mr-2"
                                        style="font-size: 1.2em;"></i>{{$value->detail}}</p>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
@endsection
