@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="col-md-12">

        <div class="card card-body mt-5 mb-5 m-1">

            {{-- Logo BKK --}}

            <h2 class="text-center">ใบรับสมัครงาน</h2>
            <br>
            <div class="d-flex justify-content-center">
                <label for="file" style="cursor: pointer;"><img id="output" src="{{asset('storage/'.$interviewhistory->registrations->image)}}" width="200" height="200"
                        class="rounded-circle" /> </label>

            </div>
            <div class="d-flex justify-content-center">
                <div class="ml-2">รูปภาพ 1นิ้ว หรือ 2.50 x 3.25 cm</div>
            </div>


            <div class="form-row mt-5 m-5">

                {{-- ชื่อภาษาไทย แถว 1--}}
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">คำนำหน้า <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->name }}">

                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->name}}">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">ชื่อเล่น <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->nickname}}">
                </div>

                {{-- ชื่อภาษาอังกฤษ แถว 2--}}
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">Name Title * <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->title_name_eng}}">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">Name in English <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->name_eng}}">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">เพศ<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->nickname_eng}}">
                </div>

                {{-- ตำแหน่งงาน แถว 3--}}
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">สมัครงานตำแหน่ง<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->position}}">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">เงินเดือนที่ต้องการ บาท/เดือน <span
                            class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewhistory->registrations->salary}}">
                </div>
            </div>
            <h2 class="text-center ">ประวัติการสัมภาษณ์งาน</h2>
            <div class="history mt-3">
            <form action="" method="POST">
                @csrf
                @foreach ($interviewhistory->history as $item =>$data)
                <div class=" d-flex justify-content-center">
                    <div class="row col-6">
                        <div class="col-12 mt-2">
                            <label for="detail"> สัมภาษณ์งานครั้งที่ {{$item+1}} </label>
                            <input type="text" name="date" class="form-control"
                                value="{{ date('j / M / Y', strtotime($data->date)) }}" readonly>

                        </div>
                        <div class="col-12 mt-2">
                            <label for="detail"> รายระเอียดการสัมภาษณ์</label>
                            <textarea type="text" class="form-control"
                                id="detail" name="detail" cols="30" rows="5"
                                readonly>{{$data->detail}}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center mt-3">
                    <span>สถานะ : {{$interviewhistory->status}}</span>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/jobs/interviewhistory/" class="btn btn-outline-primary">ย้อนกลับ</a>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
