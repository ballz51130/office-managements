@extends('layouts.app')

@section('content')

<div class="container">

<form class="my-5" method="POST" action="{{ROUTE('job.update',$job)}}" enctype="multipart/form-data">
        @csrf
    {{ method_field('PUT') }}

            <div class="col-md-12">
                <div class="card card-body">

                    {{-- Logo BKK --}}
                    <br>
                    <center><a href="{{ROUTE('job.jobsdetail',$job)}}" class="btn btn-light float-left ml-2 mt-1"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <img src="{{ asset('images/header.png') }}" style="height: 50px;width:auto"></center>

                    <h3 class="text-center mt-4">ใบรับสมัครงาน</h3>

                    <div class="mb-3 mt-5 text-center">

                        <label for="file" style="cursor: pointer;"><img id="output"
                            style="width: 150px; height:170px;"/>

                        <input type="file" class="form-control @error('image') is-invalid @enderror"  accept="image/*" name="image" id="file" value="{{old('image')}}" onchange="loadFile(event)"
                           class="rounded-circle" alt="Cinque Terre" style="display: none;">
                           @error('image')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                           <div class="lable-photo d-flex justify-content-center mt-2">
                           <span> อัพโหลดรูปภาพ</span>
                        </div>
                        <span> 1นิ้ว หรือ 2.50 x 3.25 cm</span>
                    </div>

                    <div class="form-row mt-5">

                        {{-- ชื่อภาษาไทย แถว 1--}}
                        <div class="form-group col-md-3">
                            <label for="title_name" class="font-weight-bold">คำนำหน้าชื่อ </label>
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
                            <label for="name" class="font-weight-bold">ชื่อ-นามสกุล </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="nickname" class="font-weight-bold">ชื่อเล่น </label>
                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname') }}">
                            @error('nickname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- ชื่อภาษาอังกฤษ แถว 2--}}
                        <div class="form-group col-md-3">
                            <label for="title_name" class="font-weight-bold">Name Title </label>
                            <select name="title_name_eng" id="title_name_eng" class="form-control @error('title_name_eng') is-invalid @enderror">
                            <option value="{{ old('title_name_eng') }}" class="form-control">{{ old('title_name_eng') ? :'Select Name Title' }}</option>
                            <option value="MR"> MR. </option>
                            <option value="MIS"> MS. </option>
                            </select>

                            @error('title_name_eng')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 ">
                            <label for="name_eng" class="font-weight-bold">Name in English </label>
                            <input type="text" class="form-control @error('name_eng') is-invalid @enderror" id="name_eng" name="name_eng" value="{{ old('name_eng') }}">
                            @error('name_eng')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="sex" class="font-weight-bold">เพศ </label>
                            <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror">
                            <option value="{{ old('sex') }}" class="form-control">{{ old('sex') ? :'กรุณาเลือกเพศ' }}</option>
                            <option value="ชาย">ชาย </option>
                            <option value="หญิง">หญิง </option>
                            <option value="อื่นๆ">อื่นๆ </option>
                            </select>
                            @error('sex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        {{-- ตำแหน่งงาน แถว 3--}}
                        <div class="form-group col-md-4">
                            <label for="positions" class="font-weight-bold">สมัครงานตำแหน่ง </label>
                            <input type="hidden" name="job_id" value="{{$job->id}}">
                            <input type="text" class="form-control @error('positions') is-invalid @enderror" id="positions" name="positions" value="{{$job->position}}" readonly>
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="salary" class="font-weight-bold">เงินเดือนที่ต้องการ บาท/เดือน </label>
                            <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary') }}">
                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                        {{-- ประวัติส่วนตัว--}}

                    <h2 class="text-center mt-5">ประวัติส่วนตัว</h2>

                    <div class="form-row mt-4">

                        {{-- แถว 1 --}}
                        <div class="form-group col-md-4 ">
                            <label for="house_number" class="font-weight-bold">ที่อยู่ตามทะเบียนบ้าน เลขที่ </label>
                            <input type="text" class="form-control @error('house_number') is-invalid @enderror" id="house_number" name="house_number" value="{{ old('house_number') }}">
                            @error('house_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="moo" class="font-weight-bold">หมู่ที่ </label>
                            <input type="text" class="form-control @error('moo') is-invalid @enderror" id="moo" name="moo" value="{{ old('moo') }}">
                            @error('moo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="road" class="font-weight-bold">ถนน </label>
                            <input type="text" class="form-control @error('road') is-invalid @enderror" id="road" name="road" value="{{ old('road') }}">
                            @error('road')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 2 --}}
                        <div class="form-group col-md-4 ">
                            <label for="district" class="font-weight-bold">ตำบล/แขวง </label>
                            <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" value="{{ old('district') }}">
                            @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="amphur" class="font-weight-bold">อำเภอ/เขต </label>
                            <input type="text" class="form-control @error('amphur') is-invalid @enderror" id="amphur" name="amphur" value="{{ old('amphur') }}">
                            @error('amphur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="province" class="font-weight-bold">จังหวัด </label>
                            <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        {{-- แถว 3 --}}
                        <div class="form-group col-md-4 ">
                            <label for="zipcode" class="font-weight-bold">รหัสไปรษณีย์ </label>
                            <input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ old('zipcode') }}">
                            @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="email" class="font-weight-bold">Email </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
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
                            <div id="RadioGroup" class=" @error('live_as') form-control is-invalid @enderror ">
                             <input type="radio" name="live_as"  value="อาศัยอยู่กับครอบครัว" @if(old('live_as') == 'อาศัยอยู่กับครอบครัว') checked @endif   /> อาศัยอยู่กับครอบครัว &nbsp;
                             <input type="radio" name="live_as"  value="บ้านตัวเอง" @if(old('live_as') == 'บ้านตัวเอง') checked @endif   /> บ้านตัวเอง &nbsp;
                             <input type="radio" name="live_as" value="บ้านเช่า" @if(old('live_as') == 'บ้านเช่า') checked @endif   />  บ้านเช่า &nbsp;
                             <input type="radio" name="live_as" value="หอพัก" @if(old('live_as') == 'หอพัก') checked @endif   />  &nbsp; หอพัก

                        </div>
                        @error('live_as')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="others" class="font-weight-bold">อื่นๆระบุ </label>
                        <input type="text" class="form-control @error('others') is-invalid @enderror" id="others" name="others" value="{{ old('others') }}">
                        @error('others')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    {{-- ข้อมูลส่วนตัว แถว 1 --}}
                    <div class="form-group col-md-3">
                        <label for="brithday" class="font-weight-bold">วัน/เดือน/ปีเกิด </label>
                        <input type="date" class="form-control @error('brithday') is-invalid @enderror" id="brithday" name="brithday" value="{{ old('brithday') }}">
                        @error('brithday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="" class="font-weight-bold">อายุ </label>
                        <input type="number" class="form-control @error('old') is-invalid @enderror" id="old" name="old" value="{{ old('old') }}">
                        @error('old')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="height" class="font-weight-bold">ส่วนสูง </label>
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height') }}">
                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="weight" class="font-weight-bold">น้ำหนัก </label>
                        <input type="Number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    {{-- แถว 2 --}}
                    <div class="form-group col-md-4">
                        <label for="nationality" class="font-weight-bold">สัญชาติ </label>
                        <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality') }}">
                        @error('nationality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="race" class="font-weight-bold">เชื้อชาติ </label>
                        <input type="text" class="form-control @error('race') is-invalid @enderror" id="race" name="race" value="{{ old('race') }}">
                        @error('race')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="religion" class="font-weight-bold">ศาสนา </label>
                        <input type="text" class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion" value="{{ old('religion') }}">
                        @error('religion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                     {{-- แถว 3 --}}
                     <div class="form-group col-md-4">
                        <label for="id_cardg" class="font-weight-bold">เลขบัตรประชาชน </label>
                        <input type="text" class="form-control @error('id_card') is-invalid @enderror" id="id_card" name="id_card" value="{{ old('id_card') }}">
                        @error('id_card')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="place_of_issue" class="font-weight-bold">สถานที่ออกบัตร </label>
                        <input type="text" class="form-control @error('place_of_issue') is-invalid @enderror" id="place_of_issue" name="place_of_issue" value="{{ old('place_of_issue') }}">
                        @error('place_of_issue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="card_expired" class="font-weight-bold">บัตรหมดอายุ </label>
                        <input type="date" class="form-control @error('card_expired') is-invalid @enderror" id="card_expired" name="card_expired" value="{{ old('card_expired') }}">
                        @error('card_expired')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    {{-- แถวที่ 4 --}}
                    <div class="form-group col-md-5">
                        <label for="taxpayer" class="font-weight-bold">บัตรผู้เสียภาษีเลขที่ </label>
                        <input type="text" class="form-control @error('taxpayer') is-invalid @enderror" id="taxpayer" name="taxpayer" value="{{ old('taxpayer') }}">
                        @error('taxpayer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="social_security_card" class="font-weight-bold">บัตรประกันสังคมเลขที่ </label>
                        <input type="text" class="form-control @error('social_security_card') is-invalid @enderror" id="social_security_card" name="social_security_card" value="{{ old('social_security_card') }}">
                        @error('social_security_card')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                {{-- ภาวะทางทหาร --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="" class="font-weight-bold">ภาวะทางทหาร</label>
                    <div id="RadioGroup" class=" @error('military') form-control is-invalid @enderror">
                     <input type="radio" name="military"  value="ได้รับการยกเว้น" @if(old('military') == 'ได้รับการยกเว้น') checked @endif > ได้รับการยกเว้น &nbsp;
                     <input type="radio" name="military"  value="ปลดเป็นทหารกองหนุน" @if(old('military') == 'ปลดเป็นทหารกองหนุน') checked @endif  /> ปลดเป็นทหารกองหนุน &nbsp;
                     <input type="radio" name="military" value="ยังไม่ได้เกณฑ์"  @if(old('military') == 'ยังไม่ได้เกณฑ์') checked @endif  />  &nbsp; ยังไม่ได้เกณฑ์
                </div>
                @error('military')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="military_year" class="font-weight-bold">จะเกณฑ์ในปี </label>
                <input type="text" class="form-control @error('military_year') is-invalid @enderror" id="military_year" name="military_year" value="{{ old('military_year') }}">
                @error('military_year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
                </div>

                <h2 class="text-center mt-5">ประวัติครอบครัว</h2>

                <div class="form-row mt-4">
            {{-- การแต่งงาน --}}
            <div class="form-group col-md-12">
                <label for="" class="font-weight-bold">สถานภาพ</label>
                <div id="RadioGroup" class=" @error('marriage_status') form-control  is-invalid @enderror" >
                 <input type="radio" name="marriage_status"  value="โสด" @if(old('marriage_status') == 'โสด') checked @endif /> โสด &nbsp;
                 <input type="radio" name="marriage_status"  value="แต่งงาน" @if(old('marriage_status') == 'แต่งงาน') checked @endif /> แต่งงาน &nbsp;
                 <input type="radio" name="marriage_status"  value="หม้าย" @if(old('marriage_status') == 'หม้าย') checked @endif /> หม้าย &nbsp;
                 <input type="radio" name="marriage_status"  value="แยกทางกัน/หย่า" @if(old('marriage_status') == 'แยกทางกัน/หย่า') checked @endif />  &nbsp; แยกทางกัน/หย่า
            </div>
            @error('marriage_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
            <div class="form-group col-md-12">
                <label for="" class="font-weight-bold">กรณีแต่งงาน</label>
                <div id="RadioGroup" class=" @error ('marriage_registration') form-control is-invalid @enderror" >
                 <input type="radio" name="marriage_registration"  value="จดทะบียน" @if(old('marriage_registration') == 'จดทะบียน') checked @endif /> จดทะบียน &nbsp;
                 <input type="radio" name="marriage_registration"  value="ไม่ได้จดทะเบียน" @if(old('marriage_registration') == 'ไม่ได้จดทะเบียน') checked @endif  />  &nbsp; ไม่ได้จดทะเบียน
            </div>
            @error('marriage_registration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
            <div class="form-group col-md-4">
                <label for="marriage_name" class="font-weight-bold">ชื่อภรรยาหรือสามี </label>
                <input type="text" class="form-control @error('marriage_name') is-invalid @enderror" id="marriage_name" name="marriage_name" value="{{ old('marriage_name') }}">
                @error('marriage_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="work" class="font-weight-bold">ชื่อสถานที่ทำงาน </label>
                <input type="text" class="form-control @error('work') is-invalid @enderror" id="work" name="work" value="{{ old('work') }}">
                @error('work')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="position" class="font-weight-bold">ตำแหน่ง </label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}">
                @error('position')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            {{-- บุตร --}}
            <div class="form-group col-md-3">
                <label for="child" class="font-weight-bold">มีบุตรกี่คน </label>
                <input type="text" class="form-control @error('child') is-invalid @enderror" id="child" name="child" value="{{ old('child') }}">
                @error('child')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="child_study" class="font-weight-bold">จำนวนบุตรที่กำลังศึกษา </label>
                <input type="text" class="form-control @error('child_study') is-invalid @enderror" id="child_study" name="child_study" value="{{ old('child_study') }}">
                @error('child_study')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="chid_nonstudy" class="font-weight-bold">จำนวนบุตรที่ไม่ได้ศึกษา </label>
                <input type="text" class="form-control @error('chid_nonstudy') is-invalid @enderror" id="chid_nonstudy" name="chid_nonstudy" value="{{ old('chid_nonstudy') }}">
                @error('chid_nonstudy')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>

                    {{-- ประวัติการศึกษา --}}
                    <h2 class="text-center mt-5">ประวัติการศึกษา</h2>

                    <div class="form-row mt-4">

                        {{-- แถว 1 มัธยม --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">มัธยมศึกษาปีที่ </label>
                            <input type="hidden" class="form-control"  name="study[1][educational]" value="มัธยมศึกษา">
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[1][educational_detail]"  value="{{ old('study.1.educational_detail')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="study[1][institution]"  value="{{ old('study.1.institution')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[1][field]"  value="{{ old('study.1.field')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[1][start]"  value="{{ old('study.1.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[1][end]" value="{{ old('study.1.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[1][gpa]" value="{{ old('study.1.gpa')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                         {{-- แถว 2 ปวช --}}
                         <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ปวช </label>
                            <input type="hidden" class="form-control"  name="study[2][educational]" value="ปวช">
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[2][educational_detail]"  value="{{ old('study.2.educational_detail')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="study[2][institution]"  value="{{ old('study.2.institution')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[2][field]"  value="{{ old('study.2.field')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[2][start]"  value="{{ old('study.2.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[2][end]" value="{{ old('study.2.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[2][gpa]" value="{{ old('study.2.gpa')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>


                        {{-- แถว 3 ปวท/ปวส --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ปวท/ปวส </label>
                            <input type="hidden" class="form-control"  name="study[3][educational]" value="ปวท/ปวส">
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[3][educational_detail]"  value="{{ old('study.3.educational_detail')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="study[3][institution]"  value="{{ old('study.3.institution')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[3][field]"  value="{{ old('study.3.field')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[3][start]"  value="{{ old('study.3.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[3][end]" value="{{ old('study.3.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[3][gpa]" value="{{ old('study.3.gpa')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>


                        {{-- แถว 4 ปริญญาตรี --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ปริญญาตรี </label>
                            <input type="hidden" class="form-control"  name="study[4][educational]" value="ปริญญาตรี">
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[4][educational_detail]"  value="{{ old('study.4.educational_detail')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="study[4][institution]"  value="{{ old('study.4.institution')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[4][field]"  value="{{ old('study.4.field')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[4][start]"  value="{{ old('study.4.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[4][end]" value="{{ old('study.4.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[4][gpa]" value="{{ old('study.4.gpa')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>


                        {{-- แถว 5 สูงกว่าปริญญาตรี --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สูงกว่าปริญญาตรี </label>
                            <input type="hidden" class="form-control"  name="study[5][educational]" value="สูงกว่าปริญญาตรี">
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[5][educational_detail]"  value="{{ old('study.5.educational_detail')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="study[5][institution]"  value="{{ old('study.5.institution')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[5][field]"  value="{{ old('study.5.field')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[5][start]"  value="{{ old('study.5.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[5][end]" value="{{ old('study.5.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="study[5][gpa]" value="{{ old('study.5.gpa')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    </div> {{-- End div Form-row ประวัติการศึกษา --}}


                    <h2 class="text-center mt-5">รายละเอียดของงานที่ผ่านมา</h2>

                    <div class="form-row mt-4">

                        {{-- แถว 1 สถานที่ 1 --}}
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สถานที่ทำงาน 1 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[1][workplace]"  value="{{ old('works.1.workplace')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[1][start]"  value="{{ old('works.1.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึงปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[1][end]"  value="{{ old('works.1.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ตำแหน่ง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[1][position]" value="{{ old('works.1.position')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[1][job_description]"  value="{{ old('works.1.job_description')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ค่าจ้าง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[1][salary]" value="{{ old('works.1.salary')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[1][reason_for_issue]" value="{{ old('works.1.reason_for_issue')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                          {{-- แถว 2 สถานที่ 2 --}}
                          <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สถานที่ทำงาน 2 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[2][workplace]" value="{{ old('works.2.workplace')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[2][start]"  value="{{ old('works.2.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึงปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[2][end]"  value="{{ old('works.2.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ตำแหน่ง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[2][position]" value="{{ old('works.2.position')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[2][job_description]"  value="{{ old('works.2.job_description')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ค่าจ้าง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[2][salary]" value="{{ old('works.2.salary')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[2][reason_for_issue]" value="{{ old('works.2.reason_for_issue')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                          {{-- แถว 3 สถานที่ 3 --}}
                          <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">สถานที่ทำงาน 3 </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[3][workplace]" value="{{ old('works.3.workplace')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[3][start]"  value="{{ old('works.3.start')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-1 ">
                            <label for="" class="font-weight-bold">ถึงปีที่ </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[3][end]"  value="{{ old('works.3.end')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ตำแหน่ง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[3][position]" value="{{ old('works.3.position')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id="" name="works[3][job_description]"  value="{{ old('works.3.job_description')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">ค่าจ้าง </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[3][salary]" value="{{ old('works.3.salary')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                            <input type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[3][reason_for_issue]" value="{{ old('works.3.reason_for_issue')}}">
                            @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div> {{-- End div Form-row รายละเอียดของงานที่ผ่านมา --}}

                    {{-- ภาษา --}}
                    <h2 class="text-center mt-5">ความถนัดทางภาษา</h2>

                    <div class="form-row mt-4">

                    {{-- ภาษาไทย --}}
                        <div class="form-group col-md-4 text-center">
                        <center><label for="" class="font-weight-bold">ภาษาไทย</label></center>
                                <div id="RadioGroup">
                                    <input  type="checkbox" name="th_speak"  value="1" @if(old('th_speak')) checked @endif  /> พูด &nbsp;
                                    <input  type="checkbox" name="th_read"  value="1" @if(old('th_read')) checked @endif  /> อ่าน &nbsp;
                                    <input  type="checkbox" name="th_write"  value="1" @if(old('th_write')) checked @endif  />  &nbsp; เขียน
                                </div>
                        </div>

                    {{-- ภาษาอังกฤษ --}}
                        <div class="form-group col-md-4 text-center">
                        <center><label for="" class="font-weight-bold">ภาษาอังกฤษ</label></center>
                            <div id="RadioGroup">
                                <input  type="checkbox" name="en_speak"  value="1" @if(old('en_speak')) checked @endif  /> พูด &nbsp;
                                <input  type="checkbox" name="en_read"  value="1" @if(old('en_read')) checked @endif  /> อ่าน &nbsp;
                                <input  type="checkbox" name="en_write"  value="1" @if(old('en_write')) checked @endif  />  &nbsp; เขียน
                            </div>
                        </div>

                    {{-- ภาษาจีน --}}
                        <div class="form-group col-md-4 text-center">
                        <center><label for="" class="font-weight-bold">ภาษาจีน</label></center>
                            <div id="RadioGroup">
                                <input  type="checkbox" name="ch_speak"  value="1" @if(old('ch_speak')) checked @endif /> พูด &nbsp;
                                <input  type="checkbox" name="ch_read"  value="1" @if(old('ch_read')) checked @endif /> อ่าน &nbsp;
                                <input  type="checkbox" name="ch_write"  value="1" @if(old('ch_write')) checked @endif />  &nbsp; เขียน
                            </div>
                        </div>
                    </div>{{-- End div Form-row ความถนัดทางภาษา --}}

                    {{-- ความสามารถพิเศษ --}}
                        <div class="form-row mt-5">
                        {{-- แถว 1 --}}
                        <div class="form-group col-md-3 ">
                            <label for="talent" class="font-weight-bold">ความสามารถพิเศษ </label>
                                <input type="text" class="form-control @error('talent') is-invalid @enderror" id="talent" name="talent" value="{{ old('talent') }}">
                            @error('talent')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="hobby" class="font-weight-bold">งานอดิเรก </label>
                                <input type="text" class="form-control @error('hobby') is-invalid @enderror" id="hobby" name="hobby" value="{{ old('hobby') }}">
                            @error('hobby')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="sport" class="font-weight-bold">กีฬาที่ชอบ </label>
                                <input type="text" class="form-control @error('sport') is-invalid @enderror" id="sport" name="sport" value="{{ old('sport') }}">
                            @error('sport')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="knowledge" class="font-weight-bold">ความรู้พิเศษ </label>
                                <input type="text" class="form-control @error('knowledge') is-invalid @enderror" id="knowledge" name="knowledge" value="{{ old('knowledge') }}">
                            @error('knowledge')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="other_talent" class="font-weight-bold">ความสามารถพิเศษอื่นๆ </label>
                                <input type="text" class="form-control @error('other_talent') is-invalid @enderror" id="other_talent" name="other_talent" value="{{ old('other_talent') }}">
                            @error('other_talent')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>{{-- End div Form-row ความสามารถพิเศษ --}}

                    {{-- ข้อมูลติดต่อเพิ่มเติม --}}
                    <h2 class="text-center mt-5">ข้อมูลติดต่อเพิ่มเติม</h2>
                    <div class="form-row mt-4">

                        {{-- แถว 1 --}}
                        <div class="form-group col-md-4 ">
                            <label for="contactrelated_as" class="font-weight-bold">กรณีฉุกเฉินบุคคลที่ติดต่อได้ </label>
                                <input type="text" class="form-control @error('contactrelated_as') is-invalid @enderror" id="contactrelated_as" name="contactrelated_as" value="{{ old('contactrelated_as') }}">
                            @error('contactrelated_as')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <div class="form-group col-md-4 ">
                            <label for="contact_phone" class="font-weight-bold">เกี่ยวข้องกับผู้สมัคร </label>
                                <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id=""  name="works[3][workplace]" value="{{ old('works.1.workplace')}}">
                            @error('contact_phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_phone" class="font-weight-bold">เบอร์ติดต่อ </label>
                                <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}">
                            @error('contact_phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 ">
                            <label for="contact_house_number" class="font-weight-bold">ที่อยู่ตามทะเบียนบ้าน เลขที่ </label>
                                <input type="text" class="form-control @error('contact_house_number') is-invalid @enderror" id="contact_house_number" name="contact_house_number" value="{{ old('contact_house_number') }}">
                            @error('contact_house_number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_moo" class="font-weight-bold">หมู่ที่ </label>
                            <input type="text" class="form-control @error('contact_moo') is-invalid @enderror" id="contact_moo" name="contact_moo" value="{{ old('contact_moo') }}">
                            @error('contact_moo')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_road" class="font-weight-bold">ถนน </label>
                            <input type="text" class="form-control @error('contact_road') is-invalid @enderror" id="contact_road" name="contact_road" value="{{ old('contact_road') }}">
                            @error('contact_road')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_district" class="font-weight-bold">ตำบล/แขวง </label>
                            <input type="text" class="form-control @error('contact_district') is-invalid @enderror" id="contact_district" name="contact_district" value="{{ old('contact_district') }}">
                            @error('contact_district')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_amphur" class="font-weight-bold">อำเภอ/เขต </label>
                            <input type="text" class="form-control @error('contact_amphur') is-invalid @enderror" id="contact_amphur" name="contact_amphur" value="{{ old('contact_amphur') }}">
                            @error('contact_amphur')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_province" class="font-weight-bold">จังหวัด </label>
                            <input type="text" class="form-control @error('contact_province') is-invalid @enderror" id="contact_province" name="contact_province" value="{{ old('contact_province') }}">
                            @error('contact_province')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 ">
                            <label for="contact_zipcode" class="font-weight-bold">รหัสไปรษณีย์ </label>
                            <input type="text" class="form-control @error('contact_zipcode') is-invalid @enderror" id="contact_zipcode" name="contact_zipcode" value="{{ old('contact_zipcode') }}">
                            @error('contact_zipcode')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 ">
                            <label for="contact_email" class="font-weight-bold">Email </label>
                            <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email') }}">
                            @error('contact_email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>{{-- End div Form-row ข้อมูลติดต่อเพิ่มเติม --}}

                    {{-- ข้อมูลสำคัญเพิ่มเติม --}}
                    <h2 class="text-center mt-5">ข้อมูลสำคัญเพิ่มเติม</h2>
                    <br>
                    <div class="form-row mt-4">
                        <div class="form-group col-md-4">
                            <label for="" class="font-weight-bold ml-4">ท่านเคยถูกดำเนินคดีหรือไม่</label>
                            <div class="ml-4  @error('prosecuted') form-control col-6 is-invalid @enderror" id="RadioGroup">
                             <input type="radio" name="prosecuted"  value="1" @if(old('prosecuted') == '1') checked @endif /> เคย &nbsp;
                             <input type="radio" name="prosecuted" value="0" @if(old('prosecuted') == '0') checked @endif />  &nbsp; ไม่เคย
                        </div>
                        @error('prosecuted')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="prosecuted_detail" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                        <input type="text" class="form-control @error('prosecuted_detail') is-invalid @enderror" id="prosecuted_detail" name="prosecuted_detail" value="{{ old('prosecuted_detail') ?: '' }}">
                        @error('prosecuted_detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="contagion" class="font-weight-bold ml-4">ท่านเคยป่วยหนักหรือโรคร้ายแรงหรือไม่</label>
                        <div class="ml-4  @error('contagion') form-control col-6 is-invalid @enderror" id="RadioGroup">
                         <input type="radio" name="contagion"  value="1"  @if(old('contagion') == '1') checked @endif /> เคย &nbsp;
                         <input type="radio" name="contagion" value="0"  @if(old('contagion') == '0') checked @endif />  &nbsp; ไม่เคย
                    </div>
                    @error('contagion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col-md-8">
                    <label for="contagion_detail" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                    <input type="text" class="form-control @error('contagion_detail') is-invalid @enderror" id="contagion_detail" name="contagion_detail" value="{{ old('contagion_detail')  ?: '' }}">
                    @error('contagion_detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="congenital_disease" class="font-weight-bold ml-4">ท่านมีโรคประจำตัวหรือไม่</label>
                    <div class="ml-4  @error('congenital_disease') form-control col-6  is-invalid @enderror" id="RadioGroup">
                     <input type="radio" name="congenital_disease"  value="1" @if(old('congenital_disease') == '1') checked @endif /> มี &nbsp;
                     <input type="radio" name="congenital_disease" value="0" @if(old('congenital_disease') == '0') checked @endif />  &nbsp; ไม่มี
                </div>
                @error('congenital_disease')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-8">
                <label for="congenital_disease_detail" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                <input type="text" class="form-control @error('congenital_disease_detail') is-invalid @enderror" id="congenital_disease_detail" name="congenital_disease_detail" value="{{ old('congenital_disease_detail')  ?: '' }}">
              
                @error('congenital_disease_detail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>{{-- End div Form-row ข้อมูลสำคัญเพิ่มเติม --}}

                    {{-- แนะนำตัว --}}
                    <h2 class="text-center mt-5">กรุณาแนะนำตัวท่านเพื่อให้บริษัทตัดสินใจคุณได้ง่ายขึ้น</h2>

                    <div class="form-row mt-4">
                        <div class="col-md-12">
                            <textarea type="text" class="form-control @error('about_yourself') is-invalid @enderror" id="about_yourself" name="about_yourself" value="" cols="160" rows="10">{{ old('about_yourself') }}</textarea>
                            {{-- <textarea type="text" class="form-control @error('') is-invalid @enderror" id=""  name="works[3][workplace]" value="{{ old('works.1.workplace')}}"><textarea> --}}
                            @error('about_yourself')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <div class="form-group col-md-3">
                         <button type="submit" class="btn btn-primary col-md-10" >ส่งเอกสารสมัคร</button>

                        </div>
                        {{-- <div class="form-group col-md-3">
                            <a href="#" class="btn btn-primary col-md-10">ดาวน์โหลด / พิมพ์ </a>
                        </div> --}}
                      </div>
                </div>
        </form>
        </div>

        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        @endsection
