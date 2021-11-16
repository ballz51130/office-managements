@extends('layouts.admin')

@section('content')
@if (session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

    <div class="container">

        {{-- header --}}
        <div class="d-flex justify-content-between mt-5">
            <div class="d-flex align-items-center">
                <div class="mr-2">
                    <a href="/users" class="btn btn-light"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </div>
                <h1>เพิ่มพนักงาน</h1>
            </div>

        </div>
        {{-- end: header --}}


        <form class="my-5" method="POST" action="{{ Route('user.save') }}" enctype="multipart/form-data">
            @csrf
            {{-- ส่วนที่ 1 --}}
            <div class="row">
                <div class="col-md-3">
                    <h3>ส่วนที่ 1</h3>
                    <p class="text-primary">สร้างบัญชีผู้ใช้</p>
                </div>

                <div class="col-md-9">

                    <div class="card card-body">
                        <div class="mb-3">
                            <label for="username" class="font-weight-bold">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="font-weight-bold">Email Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="font-weight-bold">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <!-- col-md-9 -->
                </div>
                <!-- .row -->
            </div>
            {{-- ท้ายส่วนที่ 1 --}}
            <br>

        {{-- ส่วนที่ 2 --}}

            <div class="row">
                <div class="col-md-3">
                    <h3>ส่วนที่ 2</h3>
                    <p class="text-primary">ตั้งค่าข้อมูลพนักงาน</p>
                </div>

                <div class="col-md-9">

                    <div class="card card-body">
                        <div class="mb-3">
                            <label for="emails" class="font-weight-bold"></label>
                     <input type="file" name="image" id="image">
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="title_name" class="font-weight-bold">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                <select name="title_name" id="title_name" class="form-control @error('title_name') is-invalid @enderror">
                                <option value="{{ old('title_name') }}" class="form-control">{{ old('title_name') ? :'เลือกคำนำหน้า' }}</option>
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
                                <label for="id_card" class="font-weight-bold">เลขบัตรประจำตัวประชาชน <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('id_card') is-invalid @enderror" maxlength="13"  id="id_card" name="id_card" value="{{ old('id_card') }}">
                                @error('id_card')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name" class="font-weight-bold">ชื่อ - สกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="form-group col-md-5 offset-md-1">
                                <label for="brithday" class="font-weight-bold">วัน/เดือน/ปี <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('brithday') is-invalid @enderror" id="brithday" name="brithday" value="{{ old('brithday') }}">
                                @error('brithday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="phone" class="font-weight-bold">หมายเลขโทรศัพท์ <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" maxlength="10" value="{{ old('phone') }}" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group col-md-6 offset-md-2">
                                <label for="emails" class="font-weight-bold">E-mail <span class="text-danger">*</span></label>
                                <input type="emails" class="form-control @error('emails') is-invalid @enderror" id="emails" name="emails" value="{{ old('emails') }}">
                                @error('emails')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <br>
                        <div class="">
                            <h3>ข้อมูลที่อยู่อาศัย</h3><br>
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label for="house_number" class="font-weight-bold">ที่อยู่ - เส้นทาง <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('house_number') is-invalid @enderror" id="house_number" name="house_number" value="{{ old('house_number') }}">
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
                                <label for="province" class="font-weight-bold">จังหวัด <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}" >
                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5 offset-md-2">
                                <label for="zipcode" class="font-weight-bold">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" >
                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="amphures" class="font-weight-bold">อำเภอ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('amphures') is-invalid @enderror" name="amphures" id="amphures" value="{{ old('amphures') }}"  >
                                @error('amphures')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group col-md-5 offset-md-2">
                                <label for="district" class="font-weight-bold">ตำบล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" value="{{ old('district') }}">
                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        {{-- .div col-md-9 --}}
                    </div>
                    {{-- .row --}}

                </div>
                {{-- ท้ายส่วนที่ 2 --}}
            </div>

            <br>

            {{-- ส่วนที่ 3 --}}
            <div class="row">
                <div class="col-md-3">
                    <h3>ส่วนที่ 3</h3>
                    <p class="text-primary">ข้อมูลการจ้างงาน</p>
                </div>

                <div class="col-md-9">

                    <div class="card card-body">
                        <div class="form-group">
                            <label for="position" class="font-weight-bold">ตำแหน่งพนักงาน <span class="text-danger">*</span></label>
                            <select class="form-control {{ !empty( $errors->first('position')) ? 'is-invalid' : '' }}"
                                name="position" id="position">
                                <option value="" class="form-control">-เลือกตำแหน่งงาน-</option>

                                @foreach($position AS $key => $position )

                                @php
                                    $sel1 = ''; // ตั้งค่าตัวแปล
                                @endphp

                                @if( !empty($users->position) )

                                    @if($position->id == $users->position )
                                        @php
                                            $sel1='selected="1"';
                                        @endphp
                                    @endif

                                @endif

                                @if($position->id == old('position'))
                                    @php
                                        $sel1 = 'selected="1"';
                                    @endphp
                                @endif
                                <option class="form-control" {{ $sel1 }} value="{{$position->id }}">
                                    <label for="role-1" class="custom-control-label">
                                        <div> <b>{{ $position->position_name }} : </b></div>
                                        <div class="fs-13 text-muted">{{$position->position_detail}}</div>
                                    </label>
                                @endforeach

                            </select>
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department" class="font-weight-bold">แผนกงานของพนักงาน <span class="text-danger">*</span></label>
                            <select class="form-control {{ !empty( $errors->first('department')) ? 'is-invalid' : '' }}"
                                name="department" id="department">
                                <option value="" class="form-control">-เลือกแผนกงาน-</option>

                                @foreach($department AS $key => $department )
                                @php
                                    $sel2 = ''; // ตั้งค่าตัวแปล
                                @endphp

                                @if( !empty($users->department) )

                                    @if($department->id == $users->department )
                                        @php
                                            $sel2='selected="1"';
                                        @endphp
                                    @endif

                                @endif

                                @if($department->id == old('department'))
                                    @php
                                        $sel2 = 'selected="1"';
                                    @endphp
                                @endif
                                <option class="form-control" {{ $sel2 }} value="{{$department->id }}">
                                    <label for="role-1" class="custom-control-label">
                                        <div> <b>{{ $department->department_name }} : </b></div>
                                        <div class="fs-13 text-muted">{{$department->department_detail}}</div>
                                    </label>


                                </option>
                                @endforeach

                            </select>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="salary" class="font-weight-bold">ค่าตอบแทน <span class="text-danger">*</span></label>
                                <input type="float" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary') }}">
                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="form-group col-md-4 offset-md-1">
                                <label for="salary_type" class="font-weight-bold">ประเภท <span class="text-danger">*</span></label>
                                <select name="salary_type" id="salary_type" class="form-control @error('salary_type') is-invalid @enderror">
                                    <option value="{{ old('salary_type') }}" class="form-control">{{ old('salary_type') ? :'เลือกประเภท' }}</option>
                                    <option value="1">รายเดือน</option>
                                    <option value="2">รายวัน</option>
                                </select>
                                @error('salary_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name_bank" class="font-weight-bold">ธนาคาร <span class="text-danger">*</span></label>
                                <select name="name_bank" id="name_bank" class="form-control @error('name_bank') is-invalid @enderror">
                                    <option value="{{ old('name_bank') }}" class="form-control">{{ old('name_bank') ? :'เลือกธนาคาร' }}</option>
                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                    <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                    <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                                </select>
                                @error('name_bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group col-md-4 offset-md-1">
                                <label for="number_bank" class="font-weight-bold">บัญชีการชำระเงิน <span class="text-danger">*</span></label>
                                <input type="float" class="form-control @error('number_bank') is-invalid @enderror" name="number_bank" id="number_bank" value="{{ old('number_bank') }}">

                                @error('number_bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        {{-- .div col-md-9 --}}
                    </div>
                    {{-- .row --}}

                </div>
                {{-- ท้ายส่วนที่ 3 --}}
            </div>

            <br>

            {{-- ส่วนที่ 4 --}}
            <div class="row">
                <div class="col-md-3">
                    <h3>ส่วนที่ 4</h3>
                    <p class="text-primary">เอกสารพนักงาน</p>
                </div>

                <div class="col-md-9">

                    <div class="card card-body">
                        <div class="form-group">
                            <label for="identification_card" class="font-weight-bold">สำเนาบัตรประจำตัวประชาชน <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('identification_card') is-invalid @enderror" name="identification_card" id="identification_card" accept="image/*">
                                    <label class="custom-file-label" for="identification_card">Choose file</label>
                                </div>
                            </div>
                            @error('identification_card')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="house_registration" class="font-weight-bold">สำเนาทะเบียนบ้าน <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('house_registration') is-invalid @enderror" name="house_registration" id="house_registration" accept="image/*">
                                    <label class="custom-file-label" for="house_registration">Choose file</label>
                                </div>
                            </div>
                            @error('house_registration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="house_registration" class="font-weight-bold">เอกสารอื่นๆ <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('etc') is-invalid @enderror" name="etc" id="etc" accept="image/*">
                                    <label class="custom-file-label" for="etc">Choose file</label>
                                </div>
                            </div>
                            @error('etc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                {{-- .div col-md-9 --}}
            </div>
            {{-- .row --}}
            </div>
        </div>

        {{-- ท้ายส่วนที่ 4 --}}
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <hr class="mb-4">
            <button class="btn btn-primary float-right" type="submit">บันทึก</button>
            <a href="#" class="btn btn-danger float-right mr-2" >ยกเลิก</a>
        </div>
    </div>

    <br>

</form>

</div>

@endsection
