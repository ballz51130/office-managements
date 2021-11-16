@extends('layouts.admin')

@section('content')
<div class="container">

<form class="my-5" method="POST" action="{{ROUTE('jobs.save')}}" enctype="multipart/form-data">
        @csrf
            <div class="col-md-12">

                <div class="card card-body">

                    {{-- Logo BKK --}}

                    <center><img src="" class="img-fluid" alt="" width="300" height="300"></center>
                    <h2 class="text-center">ใบรับสมัครงาน</h2>
                    <br>

            {{-- รูปภาพ --}}

                    {{-- <div class="mb-3">
                        <div class="image-viewer-container pic-viewer">
                            <div class="image-viewer-empty">
                                <div class="btn-choose">
                                    <input type="file" name="avatar" accept="image/jpeg,image/png">

                                    <svg viewBox="0 0 31 31" fill="currentColor" width="31" height="31">
                                        <path d="M15 15H0v1h15v15h1V16h15v-1H16V0h-1z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="mt-1 d-flex text-black-50 fs-13">
                            <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                <path
                                    d="M18.016,11.9997 L18.016,10.9997 L20.016,10.9997 L20.016,11.9997 L18.016,11.9997 Z M10.985,4.9997 L10.985,2.9997 L11.985,2.9997 L11.985,4.9997 L10.985,4.9997 Z M4,12.001 L4,11 L6,11 L6,12.001 L4,12.001 Z M5,5.70781389 L5.70781389,5 L7.12202745,6.41421356 L6.41421356,7.12202745 L5,5.70781389 Z M17.6017864,7.12202745 L16.8939725,6.41421356 L18.3081861,5 L19.016,5.70781389 L17.6017864,7.12202745 Z M11.9842,6.9999 C14.1895333,6.9999 15.9842,8.79456667 15.9842,10.9999 C15.9842,12.3776778 15.0005493,13.9960327 13.9992676,14.5 L14.008842,17.0307987 C14.0109172,18.0280521 13.2214864,18.9786987 11.993042,18.9786987 C10.7645975,18.9786987 10.008842,18.0306767 10.008842,17.0307987 L10,14.5 C9.01538086,13.9793701 7.9842,12.3794556 7.9842,10.9999 C7.9842,8.79456667 9.77886667,6.9999 11.9842,6.9999 Z M13,17.1676025 L12.9842,14.9999 L10.9855324,14.9999 L11,17.1676025 C11,17.7192348 11.5174479,18.0044759 12.0158,18.0008138 C12.5141521,17.9971517 12.9986676,17.7192348 13,17.1676025 Z M11.9842,7.9999 C10.3299143,7.9999 8.9842,9.34561429 8.9842,10.9999 C8.9842,11.8390429 9.33305714,12.5941857 9.89105714,13.1367571 C10.1267714,13.3656143 10.4473429,13.4856143 10.6247714,13.7676143 C10.6573429,13.8190429 10.6770571,13.9039 10.7002,13.9999 L13.2802,13.9999 C13.2930571,13.8979 13.3136286,13.8070429 13.3470571,13.7539 C13.5193429,13.4804714 13.8270571,13.3750429 14.0584857,13.1547571 C14.6276286,12.6113286 14.9842,11.8484714 14.9842,10.9999 C14.9842,9.34561429 13.6384857,7.9999 11.9842,7.9999 Z">
                                </path>
                            </svg>

                            <div class="ml-2">ขนาดรูปแนะนำคือ 640 x 640 พิกเซล และขนาดไฟล์สูงสุด 10 MB</div>
                        </div>
                    </div> --}}


                    {{-- <label for="" class="font-weight-bold">รูปภาพ 1นิ้ว หรือ 2.50 x 3.25 cm <span class="text-danger">*</span></label> --}}
                    <input class="" type="file" name="image" id="image">
                    <div class="ml-2">รูปภาพ 1นิ้ว หรือ 2.50 x 3.25 cm</div>
                    <br>

                    <div class="form-row">

                        {{-- ชื่อภาษาไทย แถว 1--}}
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
                        <div class="form-group col-md-5 ">
                            <label for="" class="font-weight-bold">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ชื่อเล่น <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- ชื่อภาษาอังกฤษ แถว 2--}}
                        <div class="form-group col-md-3">
                            <label for="title_name" class="font-weight-bold">Name Title <span class="text-danger">*</span></label>
                            <select name="" id="" class="form-control @error('') is-invalid @enderror">
                            <option value="{{ old('') }}" class="form-control">{{ old('') ? :'Select Name Title' }}</option>
                            <option value="MR"> MR. </option>
                            <option value="MIS"> MS. </option>
                            </select>

                            @error('')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 ">
                            <label for="" class="font-weight-bold">Name in English <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="title_name" class="font-weight-bold">เพศ <span class="text-danger">*</span></label>
                            <select name="" id="" class="form-control @error('') is-invalid @enderror">
                            <option value="{{ old('') }}" class="form-control">{{ old('') ? :'กรุณาเลือกเพศ' }}</option>
                            <option value="ชาย">ชาย </option>
                            <option value="หญิง">หญิง </option>
                            <option value="อื่นๆ">อื่นๆ </option>
                            </select>
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- ตำแหน่งงาน แถว 3--}}
                        <div class="form-group col-md-4">
                            <label for="" class="font-weight-bold">สมัครงานตำแหน่ง <span class="text-danger">*</span></label>
                            <select name="" id="" class="form-control @error('') is-invalid @enderror">
                            <option value="{{ old('') }}" class="form-control">{{ old('') ? :'เลือกตำแหน่งงานที่ต้องการสมัคร' }}</option>
                            <option value="บัญชี">บัญชี </option>
                            <option value="IT">IT </option>
                            <option value="Software Dev">Software Dev </option>
                            </select>
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">เงินเดือนที่ต้องการ บาท/เดือน <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                        {{-- ประวัติส่วนตัว--}}
                    <br>
                    <h2 class="text-center">ประวัติส่วนตัว</h2>
                    <br>
                    <div class="form-row">

                        {{-- แถว 1 --}}
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ที่อยู่ตามทะเบียนบ้าน เลขที่ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">หมู่ที่ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ถนน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 2 --}}
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ตำบล/แขวง <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">อำเภอ/เขต <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">จังหวัด <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 3 --}}
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="" class="font-weight-bold">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        </div>

                        {{-- บ้านพักอาศัย --}}
                        <div class="form-row">
                            <div class="form-group col-md-5">
                            <label for="" class="font-weight-bold">บ้านพักอาศัยเป็น</label>
                            <div id="RadioGroup">
                             <input type="radio" name="#"  value="" /> อาศัยอยู่กับครอบครัว &nbsp;
                             <input type="radio" name="#"  value="" /> บ้านตัวเอง &nbsp;
                             <input type="radio" name="#" value="" />  บ้านเช่า &nbsp;
                             <input type="radio" name="#" value="" />  &nbsp; หอพัก
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="" class="font-weight-bold">อื่นๆระบุ </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    {{-- ข้อมูลส่วนตัว แถว 1 --}}
                    <div class="form-group col-md-3">
                        <label for="" class="font-weight-bold">วัน/เดือน/ปีเกิด <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="" class="font-weight-bold">อายุ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="" class="font-weight-bold">ส่วนสูง <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="" class="font-weight-bold">น้ำหนัก <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    {{-- แถว 2 --}}
                    <div class="form-group col-md-4">
                        <label for="" class="font-weight-bold">สัญชาติ </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="font-weight-bold">เชื้อชาติ </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="font-weight-bold">ศาสนา </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                     {{-- แถว 3 --}}
                     <div class="form-group col-md-4">
                        <label for="" class="font-weight-bold">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="font-weight-bold">สถานที่ออกบัตร <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="font-weight-bold">บัตรหมดอายุ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    {{-- แถวที่ 4 --}}
                    <div class="form-group col-md-5">
                        <label for="" class="font-weight-bold">บัตรผู้เสียภาษีเลขที่ </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="" class="font-weight-bold">บัตรประกันสังคมเลขที่ </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                {{-- ภาวะทางทหาร --}}
                <div class="form-row">
                    <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">ภาวะทางทหาร</label>
                    <div id="RadioGroup">
                     <input type="radio" name="##"  value="" /> ได้รับการยกเว้น &nbsp;
                     <input type="radio" name="##"  value="" /> ปลดเป็นทหารกองหนุน &nbsp;
                     <input type="radio" name="##" value="" />  &nbsp; ยังไม่ได้เกณฑ์
                </div>
            </div>
            <div class="form-group col-md-5">
                <label for="" class="font-weight-bold">จะเกณฑ์ในปี </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
                </div>

                <br>
                <h2 class="text-center">ประวัติครอบครัว</h2>
                <br>
                <div class="form-row">
            {{-- การแต่งงาน --}}
            <div class="form-group col-md-12">
                <label for="" class="font-weight-bold">สถานภาพ</label>
                <div id="RadioGroup">
                 <input type="radio" name="###"  value="" /> โสด &nbsp;
                 <input type="radio" name="###"  value="" /> แต่งาน &nbsp;
                 <input type="radio" name="###"  value="" /> หม้าย &nbsp;
                 <input type="radio" name="###"  value="" />  &nbsp; แยกทางกัน/หย่า
            </div>
        </div>
            <div class="form-group col-md-12">
                <label for="" class="font-weight-bold">กรณีแต่งงาน</label>
                <div id="RadioGroup">
                 <input type="radio" name="####"  value="" /> จดทะบียน &nbsp;
                 <input type="radio" name="####"  value="" />  &nbsp; ไม่ได้จดทะเบียน
            </div>
        </div>
            <div class="form-group col-md-4">
                <label for="" class="font-weight-bold">ชื่อภรรยาหรือสามี </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="" class="font-weight-bold">ชื่อสถานที่ทำงาน </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="" class="font-weight-bold">ตำแหน่ง </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            {{-- บุตร --}}
            <div class="form-group col-md-3">
                <label for="" class="font-weight-bold">มีบุตรกี่คน </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="" class="font-weight-bold">จำนวนบุตรที่กำลังศึกษา </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="" class="font-weight-bold">จำนวนบุตรที่ไม่ได้ศึกษา </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>
            <br>
                    <h2 class="text-center">รายละเอียดโดยสังเขป</h2>
                    <br>
                    <div class="form-row">

                        {{-- แถว 1 ข้อมูลบิดา --}}
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">ชื่อบิดา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">อายุ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">อาชีพ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">มีชีวิต </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ถึงแก่กรรม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 2 ข้อมูลมารดา --}}
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">ชื่อมารดา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">อายุ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">อาชีพ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">มีชีวิต </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ถึงแก่กรรม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 3 ข้อพี่/น้อง คนที่ 1 --}}
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">ชื่อพี่/น้องคนที่1 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">อายุ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">อาชีพ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">มีชีวิต </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ถึงแก่กรรม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 4 ข้อพี่/น้อง คนที่ 2 --}}
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">ชื่อพี่/น้องคนที่2 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">อายุ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">อาชีพ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">มีชีวิต </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ถึงแก่กรรม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    </div> {{-- End div Form-row รายละเอียดโดยสังเขป --}}
                    <br>

                    {{-- ประวัติการศึกษา --}}
                    <h2 class="text-center">ประวัติการศึกษา</h2>
                    <br>
                    <div class="form-row">

                        {{-- แถว 1 มัธยม --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">มัธยมศึกษาปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                         {{-- แถว 2 ปวช --}}
                         <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ปวช </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 3 ปวท/ปวส --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ปวท/ปวส </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 4 ปริญญาตรี --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ปริญญาตรี </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 5 สูงกว่าปริญญาตรี --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สูงกว่าปริญญาตรี </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div> {{-- End div Form-row ประวัติการศึกษา --}}

                    <br>
                    <h2 class="text-center">รายละเอียดของงานที่ผ่านมา</h2>
                    <br>
                    <div class="form-row">

                        {{-- แถว 1 สถานที่ 1 --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สถานที่ทำงาน 1 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึงปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ตำแหน่ง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ค่าจ้าง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                          {{-- แถว 2 สถานที่ 2 --}}
                          <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สถานที่ทำงาน 2 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึงปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ตำแหน่ง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ค่าจ้าง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                          {{-- แถว 3 สถานที่ 3 --}}
                          <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สถานที่ทำงาน 3 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึงปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ตำแหน่ง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ค่าจ้าง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div> {{-- End div Form-row รายละเอียดของงานที่ผ่านมา --}}
                    <br>

                    {{-- ภาษา --}}
                    <h2 class="text-center">ความถนัดทางภาษา</h2>
                    <br>
                    <div class="form-row">

                    {{-- ภาษาไทย --}}
                        <div class="form-group col-md-4 text-center">
                        <center><label for="" class="font-weight-bold">ภาษาไทย</label></center>
                                <div id="RadioGroup">
                                    <input  type="checkbox" name="###"  value="" /> พูด &nbsp;
                                    <input  type="checkbox" name="###"  value="" /> อ่าน &nbsp;
                                    <input  type="checkbox" name="###"  value="" />  &nbsp; เขียน
                                </div>
                        </div>

                    {{-- ภาษาอังกฤษ --}}
                        <div class="form-group col-md-4 text-center">
                        <center><label for="" class="font-weight-bold">ภาษาอังกฤษ</label></center>
                            <div id="RadioGroup">
                                <input  type="checkbox" name="###"  value="" /> พูด &nbsp;
                                <input  type="checkbox" name="###"  value="" /> อ่าน &nbsp;
                                <input  type="checkbox" name="###"  value="" />  &nbsp; เขียน
                            </div>
                        </div>

                    {{-- ภาษาจีน --}}
                        <div class="form-group col-md-4 text-center">
                        <center><label for="" class="font-weight-bold">ภาษาจีน</label></center>
                            <div id="RadioGroup">
                                <input  type="checkbox" name="###"  value="" /> พูด &nbsp;
                                <input  type="checkbox" name="###"  value="" /> อ่าน &nbsp;
                                <input  type="checkbox" name="###"  value="" />  &nbsp; เขียน
                            </div>
                        </div>
                    </div>{{-- End div Form-row ความถนัดทางภาษา --}}
                    <br><br>

                    {{-- ความสามารถพิเศษ --}}
                        <div class="form-row">

                        {{-- แถว 1 --}}
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">ความสามารถพิเศษ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">งานอดิเรก </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">กีฬาที่ชอบ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">ความรู้พิเศษ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="" class="font-weight-bold">ความสามารถพิเศษอื่นๆ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>{{-- End div Form-row ความสามารถพิเศษ --}}
                    <br>

                    {{-- ข้อมูลติดต่อเพิ่มเติม --}}
                    <h2 class="text-center">ข้อมูลติดต่อเพิ่มเติม</h2>
                    <br>
                    <div class="form-row">

                        {{-- แถว 1 --}}
                        <div class="form-group col-md-5 ">
                            <label for="" class="font-weight-bold">กรณีฉุกเฉินบุคคลที่ติดต่อได้ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">เบอร์ติดต่อ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ที่อยู่ตามทะเบียนบ้าน เลขที่ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">หมู่ที่ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ถนน </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">ตำบล/แขวง </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">อำเภอ/เขต </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">จังหวัด </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="" class="font-weight-bold">รหัสไปรษณีย์ </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 ">
                            <label for="" class="font-weight-bold">Email </label>
                                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>{{-- End div Form-row ข้อมูลติดต่อเพิ่มเติม --}}
                    <br>

                    {{-- ข้อมูลสำคัญเพิ่มเติม --}}
                    <h2 class="text-center">ข้อมูลสำคัญเพิ่มเติม</h2>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-4 text-center">
                            <label for="" class="font-weight-bold">ท่านเคยถูกดำเนินคดีหรือไม่</label>
                            <div id="RadioGroup">
                             <input type="radio" name="#1"  value="" /> เคย &nbsp;
                             <input type="radio" name="#1" value="" />  &nbsp; ไม่เคย
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                        @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4 text-center">
                        <label for="" class="font-weight-bold">ท่านเคยป่วยหนักหรือโรคร้ายแรงหรือไม่</label>
                        <div id="RadioGroup">
                         <input type="radio" name="#2"  value="" /> เคย &nbsp;
                         <input type="radio" name="#2" value="" />  &nbsp; ไม่เคย
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                    <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group col-md-4 text-center">
                    <label for="" class="font-weight-bold">ท่านมีโรคประจำตัวหรือไม่</label>
                    <div id="RadioGroup">
                     <input type="radio" name="#3"  value="" /> มี &nbsp;
                     <input type="radio" name="#3" value="" />  &nbsp; ไม่มี
                </div>
            </div>
            <div class="col-md-8">
                <label for="" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}">
                @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>{{-- End div Form-row ข้อมูลสำคัญเพิ่มเติม --}}
                    <br>
                    {{-- แนะนำตัว --}}
                    <h2 class="text-center">กรุณาแนะนำตัวท่านเพื่อให้บริษัทตัดสินใจคุณได้ง่านขึ้น</h2>
                    <br>
                    <div class="form-row">
                        <div class="col-md-12">
                            <textarea type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}" cols="160" rows="10"></textarea>
                            {{-- <textarea type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}"><textarea> --}}
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control" name="status">
                                <option selected>รอตรวจสอบ</option>
                                <option value="อนุมัติการลา">อนุมัติ</option>
                                <option value="ไม่อนุมัติ">ไม่อนุมัติ</option>
                              </select>
                        </div>
                        <div class="form-group col-md-3">
                         <button type="submit" class="btn btn-primary col-md-12" >ยืนยัน</button>

                        </div>
                        <div class="form-group col-md-3">
                            <a href="#" class="btn btn-primary col-md-12">ย้อนกลับ </a>
                        </div>
                      </div>
                </div>
                <!-- col-md-12 -->
            <!-- .row -->

        </form>
        </div>

 @include('sweetalert::alert')
 @endsection
