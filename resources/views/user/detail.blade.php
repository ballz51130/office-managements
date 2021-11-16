@extends('layouts.admin')

@section('content')

    <div class="container">

        {{-- header --}}
        <div class="mt-5 mb-4">
            <div class="media">
                <div class="avatar mr-4">
                    @if(!empty($user->image))
                    <img src="{{asset('storage/'.$user->image)}}">
                    @else
                    @endif
                </div>
                <div class="media-body ml-2">
                    <h1>{{ $user->name }}</h1>
                    <div><h4 class="ml-2">{{ $user->department->name ?? '-' }}</h4></div>
                    
                        <div class="col-9 mt-3">
                            <div class="row">
                            <div class="col-6"><h5>วัน/เดือน/ปีเกิด</h5></div>
                            <div class="col-6"><h5>{{ date('j/M/Y', strtotime($user->brithday)) }}</h5></div>
                            <div class="col-6 mt-3"><h5>หมายเลขติดต่อ</h5></div>
                            <div class="col-6 mt-3"><h5>{{ $user->phone ?? '-' }}</h5></div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- end: heaer --}}


        <ul class="nav nav-tabs nav-profile mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="/users/{{ $user->id }}">ข้อมูลพื้นฐาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/account">ตั้งค่าบัญชีผู้ใช้</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/password">ตั้งค่ารหัสผ่าน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/jobs">ข้อมูลการจ้างงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/docs">ไฟล์เอกสาร</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{ $user->id }}/leave">การลา</a>
            </li>
        </ul>


        <form action="/users/{{$user->id}}/profile" method="post" enctype="multipart/form-data">
            @csrf

            {{ method_field('PUT') }}

            <div class="card">

                <div class="card card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-start">
                            <div class="d-flex ">
                                <label for="image">

                                    <i class="fa fa-user fa-4x text-primary" aria-hidden="true"></i>

                                </label>
                            </div>
                            <div class="d-flex ml-1 mt-4">
                                <input type="file" accept="image/*" name="image" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="title_name" class="font-weight-bold">คำนำหน้าชื่อ <span
                                    class="text-danger">*</span></label>
                            <select name="title_name" id="title_name"
                                class="form-control @error('title_name') is-invalid @enderror">
                                <option value="{{ $user->title_name ? : old('title_name') }}" class="form-control">
                                    {{ $user->title_name ?: old('title_name') ? :'เลือกคำนำหน้า' }}</option>
                                <option value="นาย"> นาย </option>
                                <option value="นาง"> นาง </option>
                                <option value="นางสาว"> นางสาว </option>
                            </select>

                            @error('title_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 offset-md-2">
                            <label for="id_card" class="font-weight-bold">เลขบัตรประจำตัวประชาชน <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('id_card') is-invalid @enderror"
                                maxlength="13" id="id_card" name="id_card" value="{{ $user->id_card ?: old('id_card') }}">
                            @error('id_card')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name" class="font-weight-bold">ชื่อ - สกุล <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $user->name ?: old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="brithday" class="font-weight-bold">วัน/เดือน/ปี <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('brithday') is-invalid @enderror"
                                id="brithday" name="brithday" value="{{ date('Y-m-d', strtotime($user->brithday))  ?: old('brithday', date('Y-m-d')) }}">
                            @error('brithday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="phone" class="font-weight-bold">หมายเลขโทรศัพท์ <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" maxlength="10" value="{{ $user->phone ?: old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3>ข้อมูลที่อยู่อาศัย</h3><br>
                        <div class="form-row">
                            <div class="form-group col-md-11">
                                <label for="house_number" class="font-weight-bold">ที่อยู่ - เส้นทาง <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('house_number') is-invalid @enderror"
                                    id="house_number" name="house_number" value="{{ $user->house_number ?: old('house_number') }}">
                                @error('house_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="province" class="font-weight-bold">จังหวัด <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                                id="province" name="province" value="{{ $user->province ?: old('province') }}">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 offset-md-2">
                            <label for="zipcode" class="font-weight-bold">รหัสไปรษณีย์ <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('zipcode') is-invalid @enderror"
                                id="zipcode" name="zipcode" value="{{ $user->zipcode ?: old('zipcode') }}">
                            @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="amphures" class="font-weight-bold">อำเภอ <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('amphures') is-invalid @enderror"
                                name="amphures" id="amphures" value="{{ $user->amphures ?: old('amphures') }}">
                            @error('amphures')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 offset-md-2">
                            <label for="district" class="font-weight-bold">ตำบล <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('district') is-invalid @enderror"
                                id="district" name="district" value="{{ $user->district ?: old('district') }}">
                            @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- card body --}}

                <div class="card-footer">

                    <div class="d-flex justify-content-center mt-2">

                        <button type="submit" class="btn btn-primary mr-5">บันทึก</button>
                        <a href="/users" class="btn btn-light">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </form>

    </div>

    @include('sweetalert::alert')
@endsection

@section('scripts')


@section('scripts')
