@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>สรุปรายงานการลา</h1>
                </div>
                {{-- <div class="page-header-subtitle"></div>
                    --}}
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                
            </div>
        </div>

    </div>
</div>


<div class="card-container container mb-5 mt-3">

    <div class="card p-3">
        <div class="row">

            <div class="col-md-3">
                <div class="card mb-3" style="background-color:#F8FD7F;">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="background-color: #E9E4A4">
                            <h1 class=""><i class="fa fa-user mr-2 ml-4 mt-5" style="color: white "
                                    aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title ml-4">Number</h5>
                                <h1>
                                    <p class="card-text ml-5"><a href="/leaves/waitcheck" class="text-dark">{{$data1}}</a></p>
                                </h1>
                                <h6>
                                    <p class="card-text ">Pending&nbsp;approval</p>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card mb-3 " style="background-color: #AFF1BD">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="background-color:#6EFC8C">
                            <h1><i class="fa fa-check mr-2 ml-4 mt-5" style="color: white " aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title ml-4">Number</h5>
                                <h1>
                                    <p class="card-text ml-5"><a href="/leaves/active" class="text-dark">{{$data2}}</a></p>
                                </h1>
                                <h6>
                                    <p class="card-text text-center">approve</p>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" style="background-color: #EAA4A4">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="background-color:#E8755F">
                            <h1><i class="fa fa-times-circle-o  mr-2 ml-4 mt-5" style="color: white "
                                    aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title ml-4">Number</h5>
                                <h1>
                                    <p class="card-text ml-5"><a href="/leaves/notactive" class="text-dark">{{$data3}}</a></p>
                                </h1>
                                <h6>
                                    <p class="card-text text-center">Not Approve</p>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3" style=" background-color:#7FC4FD">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="background-color: #9CEBF1">
                            <h1><i class="fa fa-users mr-2 ml-4 mt-5" style="color: white " aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title ml-4">Number</h5>
                                <h1>
                                    <p class="card-text ml-5"><a href="/leaves" class="text-dark">{{$count}}</a></p>
                                </h1>
                                <h6>
                                    <p class="card-text text-center">Member List</p>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-countdown="2016/01/01"></div>
            <div data-countdown="2017/01/01"></div>
            <div data-countdown="2018/01/01"></div>
            <div data-countdown="2019/01/01"></div>
        </div>
    </div>
</div>


@include('sweetalert::alert')
@endsection
