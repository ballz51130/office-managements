@extends('layouts.admin')

@section('content')

    <div class="container">

        <form class="my-5" method="POST" action="{{ url('/users/store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-2 pt-5 px-4">
                    <h3>ส่วนที่1</h3>
                    <p style="color:blue;">สร้างบัญชีผู้ใช้</p>
                </div>

                <div class="col-md-9">

                    <div class="card card-body">
                        <div class="form-group">
                            <label for="username" class="font-weight-bold">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="username" id="username">
                            <div class="invalid-feedback"> กรุณากำหนด Username สำหรับเข้าใช้งาน </div>
                        </div>
                        <div class="form-group">
                            <label for="Email1">
                                <h3>Email address:</h3>
                            </label>
                            <input type="email" class="form-control" name="email" placeholder="username@email.com">
                            <small class="form-text text-muted">กรุณากรอกE-mail,G-mail ที่สามารถใช้งานได้จริง</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">
                                <h3>Password</h3>
                            </label>
                            <input type="password" class="form-control" name="password" placeholder="******">
                            <small class="form-text text-muted">กรุณากำหนดPasswordสำหรับใช้งาน
                                ข้อมูลที่กรอกไม่ต่ำกว่า6ตัวอักษร</small>
                        </div>
                    </div>
                    <!-- col-md-9 -->
                </div>
                <!-- .row -->
            </div>
            {{-- ท้ายส่วนที่ 1 --}}


            {{-- ส่วนที่ 2 --}}
            <div class="row">
                <div class="col-md-2 pt-5 px-4">
                    <h3>ส่วนที่2</h3>
                    <p style="color:blue;">ตั้งค่าข้อมูลพนักงาน </p>
                </div>
                <div class="col-md-9" style="background-color: #FFFF;margin-top:50px; padding:50px;">
                    <div class="photo">
                        <img src="" alt="" sizes="" srcset=""> <input type="file" name="image" id="">
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">
                                <h3>คำนำหน้าชื่อ</h3>
                            </label>
                            <select name="title_name" class="form-control">
                                <option selected>นาย,นาง,นางสาว</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                            <small class="form-text text-muted">กรุณากรอกคำนำหน้าชื่อ </small>

                        </div>
                        <div class="form-group col-md-7 offset-md-2">
                            <label for="id_card">
                                <h3>เลขบัตรประจำตัวประชาชน:</h3>
                            </label>
                            <input type="number" class="form-control" name="id_card" placeholder="1-520x-xxxxx-xx-x">
                            <small class="form-text text-muted">กรุณากรอกเลขบัตรประจำตัวประชาชน 13 หลัก. </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">
                                <h3>ชื่อ-นามสกุล:</h3>
                            </label>
                            <input type="text" class="form-control" name="name" placeholder="Email">
                            <small class="form-text text-muted">กรุณากรอกชื่อ-นามสกุล </small>

                        </div>
                        <div class="form-group col-md-6 offset-md-1">
                            <label for="id_card">
                                <h3>วัน/เดือน/ปีเกิด:</h3>
                            </label>
                            <input type="date" class="form-control" name="brithday">
                            <small class="form-text text-muted"> </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">
                                <h3>หมายเลขโทรศัพท์:</h3>
                            </label>
                            <input type="tel" id="phone" name="phone" placeholder="098-8020-592"
                                pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" required>
                            <small class="form-text text-muted">กรุณากรอกชื่อ-นามสกุล </small>

                        </div>
                        <div class="form-group col-md-7 offset-md-2">
                            <label for="id_card">
                                <h3>E-mail:</h3>
                            </label>
                            <input type="email" class="form-control" name="" placeholder="username@email.com">
                            <small class="form-text text-muted">กรุณากรอกE-mailที่ใช้ได้จริง </small>
                        </div>
                    </div>
                    <div class="">
                        <h1>ข้อมูลที่อยู่อาศัย</h1><br>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="name">
                                    <h3>ที่อยู่ - เส้นทาง:</h3>
                                </label>
                                <input type="text" class="form-control" name="home_number" placeholder="ที่อยู่">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">
                                <h3>จังหวัด:</h3>
                            </label>
                            <input type="text" class="form-control" name="province" placeholder="Email">
                            <small class="form-text text-muted"></small>

                        </div>
                        <div class="form-group col-md-5 offset-md-2">
                            <label for="id_card">
                                <h3>รหัสไปรษณีย์:</h3>
                            </label>
                            <input type="number" class="form-control" id="zip" placeholder="รหัสไปรษณีย์">
                            <small class="form-text text-muted"> </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">
                                <h3>อำเภอ:</h3>
                            </label>
                            <input type="text" class="form-control" name="amphures" placeholder="Email">
                            <small class="form-text text-muted"></small>

                        </div>
                        <div class="form-group col-md-5 offset-md-2">
                            <label for="id_card">
                                <h3>ตำบล:</h3>
                            </label>
                            <input type="number" class="form-control" id="district" placeholder="รหัสไปรษณีย์">
                            <small class="form-text text-muted"> </small>
                        </div>
                    </div>
                    {{-- .div col-md-9 --}}
                </div>
                {{-- .row --}}
            </div>
            {{-- ท้ายส่วนที่ 2 --}}

            {{-- ส่วนที่ 3 --}}
            <div class="row">
                <div class="col-md-2 pt-5 px-4">
                    <h3>ส่วนที่3</h3>
                    <p style="color:blue;">ข้อมูลการจ้างงาน</p>
                </div>

                <div class="col-md-9" style="background-color: #FFFF;margin-top:50px;padding:50px;">
                    <div class="form-group">
                        <label for="name">
                            <h3>ตำแหน่งพนักงาน:</h3>
                        </label>
                        <select name="position" class="form-control">
                            <option selected>ตำแหน่งพนักงาน</option>
                            <option value="1">พนักงาน</option>
                            <option value="2">หัวหน้างาน</option>
                            <option value="3">ลูกจ้าง</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <h3>แผนกงานของพนักงาน:</h3>
                        </label>
                        <select name="position" class="form-control">
                            <option selected>ผนกงานของพนักงาน</option>
                            <option value="1">test1</option>
                            <option value="2">test2</option>
                            <option value="3">test3</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">
                                <h3>ค่าตอบแทน</h3>
                            </label>
                            <input type="float" class="form-control" name="salary" placeholder="30,000">
                            <small class="form-text text-muted"></small>

                        </div>
                        <div class="form-group col-md-3 offset-md-1">
                            <label for="id_card">
                                <h3>ประเภท:</h3>
                            </label>
                            <select name="position" class="form-control">
                                <option selected>รายเดือน/วัน</option>
                                <option value="1">รายเดือน</option>
                                <option value="2">รายวัน</option>

                            </select>
                            <small class="form-text text-muted"> </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">
                                <h3>ธนคาร</h3>
                            </label>
                            <select name="position" class="form-control">
                                <option selected>ธนคาร</option>
                                <option value="1">กรุงไทย</option>
                                <option value="2">กษิกรไทย</option>

                            </select>
                            <small class="form-text text-muted"></small>

                        </div>
                        <div class="form-group col-md-3 offset-md-1">
                            <label for="id_card">
                                <h3>บัญชีการชำระเงิน:</h3>
                            </label>
                            <input type="float" class="form-control" name="salary" placeholder="xxx-x-xxxxx-x">

                            <small class="form-text text-muted"> </small>
                        </div>
                    </div>
                    <!-- col-md-9 -->
                </div>
                <!-- .row -->
            </div>
            {{-- ท้ายส่วนที่ 3 --}}

            {{-- ส่วนนที่ 4 --}}
            <div class="row">
                <div class="col-md-2 pt-5 px-4">
                    <h3>ส่วนที่4</h3>
                    <p style="color:blue;">เอกสารพนักงาน</p>
                </div>

                <div class="col-md-9" style="background-color: #FFFF;margin-top:50px;padding:50px;">

                    <div class="form-group">
                        <label for="name">
                            <h3>สำเนาบัตรประจำตัวประชาชน:</h3>
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="Email1">
                            <h3>สำเนาทะเบียนบ้าน:</h3>
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                            <h3>เอกสารอื่นๆ:</h3>
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <small class="form-text text-muted"></small>
                    </div>
                    <!-- col-md-9 -->
                    <div class="button" style="margin-left:400px;">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="reset" class="btn btn-warning">ล้างค่า</button>
                        <a href="{{ url('user') }}" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                </div>
                <!-- .row -->
            </div>
            {{-- ท้ายส่วนที่ 4 --}}



        </form>

        <!-- div content -->
    </div>


    <div class="mb-3 col-md-3">
                            <label for="title_name" class="font-weight-bold">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                            <select name="title_name" class="form-control">
                            <option selected>นาย,นาง,นางสาว</option>
                                 <option value="นาย"  {{ old('title_name') == 'นาย' ? 'selected' : '' }}>
                                        นาย
                                </option>
                                <option value="นาง" {{ old('title_name') == 'นาง' ? 'selected' : '' }}>
                                        นาง
                                </option>
                                <option value="นางสาว" {{ old('title_name') == 'นางสาว' ? 'selected' : '' }}>
                                        นางสาว
                                </option>
                            </select>

                            @error('title_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
@endsection
