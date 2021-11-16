@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between">

            <div>
                <div class="page-header-title mt-5" data-hook="page-header-title">
                    <h1>รายการรับสมัครงาน</h1>
                </div>
            </div>



            <div class="page-header-actionbar d-flex align-items-center mt-5">
                <form action="{{ Route('jobs') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" value="{{ request()->search ?? '' }}">

                    <div class="ml-1">
                        <button class="btn btn-outline-primary text-nowrap">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <span class="ml-1">ค้นหา</span>
                        </button>
                    </div>
                </form>
                <a href="{{ Route('jobs.create') }}" class="btn btn-primary ml-2"><i class="fa fa-plus"></i>
                    เพิ่มใบสมัคร</a>
            </div>
        </div>


<div class="card-container container mb-5 mt-3 p-2">

    @foreach ($jobs as $job)
    <div item-id="{{ $job->id }}">
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        @if($job->image)
                        <img src="{{asset('storage/'.$job->image)}}" class="card-img" style="width: 200px; height:150px; overflow: hidden;">
                        @else
                        <img src="{{ asset('image/unnamed.png') }}"
                            style="width: 200px; height:150px; overflow: hidden;">
                        @endif
                    </div>
                    <div class="col-9">
                        <h5 class="card-title">{{$job->position}}.</h5>
                        <p class="card-text">Title : {{$job->subtitle}}</p>
                        <p class="card-text"><i class="fa fa-briefcase"></i> เงินเดือน : {{$job->salary}}
                        </p>
                        <p class="card-text"><i class="fa fa-clock"></i>
                            @if($job->start == '')
                                <span>ไม่กำหนดเวลา </span>
                                @else
                            {{ date('j M Y', strtotime($job->start))}}</p>
                            @endif
                        <p class="card-text"><i class="fa fa-briefcase"></i> สถานะ
                            @switch($job->status)
                            @case('เปิดรับสมัคร')
                            <span class="badge badge-success ">เปิดรับสมัคร</span>
                                @break
                            @default
                            <span class="badge badge-danger">ปิดรับสมัคร</span>
                        @endswitch
                        <div class=" d-flex justify-content-end">

                            <div class="d-flex">
                                @switch($job->status)
                                @case('เปิดรับสมัคร')
                                <button type="button" class="btn btn-danger mr-2"
                                    onclick="offstatus({{$job->id}}, '/jobs/{{$job->id}}')"><span
                                        class="ml-1">ปิดรับสมัคร</span></button>
                                @break
                                @default
                                <button type="button" class="btn btn-success mr-2"
                                    onclick="onstatus({{$job->id}}, '/jobs/{{$job->id}}')"><span
                                        class="ml-1">เปิดรับสมัคร</span></button>
                                @endswitch
                            </div>
                            <div class="d-flex ">
                                <button type="button" class="btn btn-outline-primary mr-2"
                                    onclick="del({{$job->id}}, '/jobs/{{$job->id}}')"><span
                                        class="ml-1">ลบ</span></button>
                            </div>
                            <div class="d-flex ">
                                <a href="{{route('jobs.edit', $job->id)}}" class="btn btn-outline-primary"
                                    style="width: 100px">แก้ไข</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endforeach

    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>ผลลัพท์ทั้งหมด {{ number_format($jobs->total()) }} รายการ</div>
            <div>{{ $jobs->links() }}</div>
        </div>
    </div>


</div>

</div>
</div>




@endsection


@section('scripts')
@include('sweetalert::alert')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.css">
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.js'></script>
<script>
    function del(id, url) {
        const $item = $('[item-id=' + id + ']');

        Swal.fire({
                title: 'ต้องการลบรายการสมัครนี้ ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ยืนยันการลบ'
            })
            .then((result) => {
                if (result.value) {

                    $.ajax({
                            method: "POST",
                            url: url,
                            dataType: "json",
                            data: {
                                '_method': 'DELETE',
                                '_token': $('meta[name=csrf-token]').attr('content'),
                            }
                        })
                        .done(res => {

                            if (res.type == 'success') {
                                $item.remove();

                                Swal.fire('ทำการลบเรียบร้อย!', res, 'success');
                            } else {
                                Swal.fire('Error!', res.message, 'error');
                            }
                        })
                        .fail(msg => {
                            Swal.fire('Error!', 'ไม่สามารถทำการลบได้!!!', 'error');
                        });
                }
            });
    }

    function offstatus(id, url) {
        const $item = $('[item-id=' + id + ']');
        var dataID = $('myDivID').data('data-id');
        Swal.fire({
                title: 'ต้องการปิดรายการสมัครนี้ ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ยืนยัน'
            })
            .then((result) => {
                if (result.value) {

                    $.ajax({
                            method: "POST",
                            url: url,
                            dataType: "json",
                            data: {
                                '_method': 'PUT',
                                '_token': $('meta[name=csrf-token]').attr('content'),
                            }
                        })
                        .done(res => {

                            if (res.type == 'success') {

                                Swal.fire('ทำการปิดการรับสมัคร!', res, 'success');
                                setTimeout(function () { // wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 2500);

                            } else {
                                Swal.fire('Error!', res.message, 'error');
                            }
                        })
                        .fail(msg => {
                            Swal.fire('Error!', 'คุณไม่สามารถทำการปิดการรับสมัครได้', 'error');
                        });
                }
            });
    }

    function onstatus(id, url) {
        const $item = $('[item-id=' + id + ']');

        Swal.fire({
                title: 'ต้องการเปิดรายการสมัครนี้ ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ยืนยัน'
            })
            .then((result) => {
                if (result.value) {

                    $.ajax({
                            method: "POST",
                            url: url,
                            dataType: "json",
                            data: {
                                '_method': 'PUT',
                                '_token': $('meta[name=csrf-token]').attr('content'),
                            }
                        })
                        .done(res => {
                            if (res.type == 'success') {

                                Swal.fire('ทำการเปิดการสมัครเรียบร้อย!', res, 'success');
                                setTimeout(function () { // wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 2500);

                            } else {
                                Swal.fire('Error!', res.message, 'error');
                            }
                        })
                        .fail(msg => {
                            Swal.fire('Error!', 'คุณไม่สามารถทำการเปิดการสมัครได้', 'error');
                        });
                }
            });
    }

</script>
@endsection
