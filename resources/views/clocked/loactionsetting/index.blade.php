@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>เวลาการเข้า-ออกงาน</h1>
                </div>
            </div>
            <form id="sends" name="sends" action="{{ROUTE('clockedsetting.save')}}" method="post">
                @csrf
                <div class="card-container container mb-3 mt-2">
                    <div class=" d-flex justify-content-end">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fa fa-plus"></i>
                            <span class="ml-1">เพิ่มโซน</span></a>
                    </div>
            </div>
        </div>
<div class="card-container container mb-5 mt-4">
    <div class="card">
        <table class="table">
            <tbody>
                @for ($i = 1; $i <= 5 ; $i++) <div class="">
                    <div class="card m-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="avatar">
                                        <img src="{{asset('storage/photos/share.png')}}">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h5 class="card-title">BKK{{$i}}</h5>
                                    <p class="card-text">โซนรัหส QR</p>
                                    <p class="card-text">รหัส : 1231321-sdgsdf-asfeyer-1asfde</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ROUTE('location.print',$i)}}">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-printer"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 2H5a1 1 0 0 0-1 1v2H3V3a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h-1V3a1 1 0 0 0-1-1zm3 4H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1v1H2a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z" />
                                    <path fill-rule="evenodd"
                                        d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM5 8a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H5z" />
                                    <path d="M3 7.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                            <a href="{{ROUTE('location.edit',$i)}}">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil ml-2"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <a href="{{ROUTE('location.delete',$i)}}">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>
                        </div>
                    </div>
    </div>

</div>
    </div>
@endfor
</tbody>

@include('sweetalert::alert')
@endsection
