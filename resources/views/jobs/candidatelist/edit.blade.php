@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="col-md-12">

        <div class="card card-body mt-5 mb-5 m-1">

            {{-- Logo BKK --}}

            <h2 class="text-center">ใบรับสมัครงาน</h2>
            <br>
            <div class="d-flex justify-content-center">
                <label for="file" style="cursor: pointer;"><img id="output" src="{{asset('storage/'.$registration->image)}}" width="200" height="200"
                        class="rounded-circle" /> </label>

            </div>
            <div class="d-flex justify-content-center">
                <div class="ml-2">รูปภาพ 1นิ้ว หรือ 2.50 x 3.25 cm</div>
            </div>


            <div class="form-row mt-5">

                {{-- ชื่อภาษาไทย แถว 1--}}
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">คำนำหน้า <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{ $registration->title_name }}">

                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->name}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ชื่อเล่น <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->nickname}}">
                </div>

                {{-- ชื่อภาษาอังกฤษ แถว 2--}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">Name Title * <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->title_name_eng}}">
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">Name in English <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->name_eng}}">
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">เพศ<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->sex}}">
                </div>

                {{-- ตำแหน่งงาน แถว 3--}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">สมัครงานตำแหน่ง<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->position}}">
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">เงินเดือนที่ต้องการ บาท/เดือน <span
                            class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->salary}}">
                </div>
            </div>

            {{-- ประวัติส่วนตัว--}}
            <br>
            <h2 class="text-center">ประวัติส่วนตัว</h2>
            <br>
            <div class="form-row">

                {{-- แถว 1 --}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ที่อยู่ตามทะเบียนบ้าน เลขที่ <span
                            class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->house_number}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">หมู่ที่ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->moo}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ถนน </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->road}}">
                </div>

                {{-- แถว 2 --}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ตำบล/แขวง <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->district}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">อำเภอ/เขต <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->amphur}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">จังหวัด <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->province}}">
                </div>

                {{-- แถว 3 --}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->zipcode}}">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">Email <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->email}}">
                </div>
            </div>

            {{-- บ้านพักอาศัย --}}
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">พักอาศัยเป็น </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->live_as}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">อื่นๆระบุ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->others}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ข้อมูลส่วนตัว แถว 1 --}}
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">วัน/เดือน/ปีเกิด <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="" name="" value="{{$registration->brithday}}" readonly>
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">อายุ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->old}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">ส่วนสูง <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->height}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">น้ำหนัก <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->weight}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- แถว 2 --}}
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">สัญชาติ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->nationality}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">เชื้อชาติ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->race}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ศาสนา </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->religion}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- แถว 3 --}}
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->id_card}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">สถานที่ออกบัตร <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->place_of_issue}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">บัตรหมดอายุ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->card_expired}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- แถวที่ 4 --}}
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">บัตรผู้เสียภาษีเลขที่ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->taxpayer}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">บัตรประกันสังคมเลขที่ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->social_security_card}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->military}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">จะเกณฑ์ในปี </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->military_year}}">
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
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->marriage_status}}">

                </div>
                <div class="form-group col-md-12">
                    <label for="" class="font-weight-bold">กรณีแต่งงาน</label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->marriage_registration}}">

                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ชื่อภรรยาหรือสามี </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->marriage_name}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ชื่อสถานที่ทำงาน </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->work}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ตำแหน่ง </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->position}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- บุตร --}}
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">มีบุตรกี่คน </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->child}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">จำนวนบุตรที่กำลังศึกษา </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->child_study}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">จำนวนบุตรที่ไม่ได้ศึกษา </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->chid_nonstudy}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{-- ประวัติการศึกษา --}}
            <h2 class="text-center">ประวัติการศึกษา</h2>
            <br>
            <div class="form-row">
                <table class="table table">
                    @foreach ($registration->registrtations_study as $data)
                    {{-- แถว 1 มัธยม --}}
                    <div class=" d-flex">
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">{{$data->educational}} </label>
                            <input type="text" readonly class="form-control" id="" name=""
                                value="{{$data->educational_detail}}">
                        </div>
                        <div class="form-group mr-1 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" readonly class="form-control" id="" name=""
                                value="{{$data->institution}}">
                        </div>
                        <div class="form-group mr-1 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" readonly class="form-control" id="" name=""
                                value="{{$data->field_of_study}}">
                        </div>
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">เริ่ม </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->start}}">
                        </div>
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">ถึง </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->end}}">
                        </div>
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">เกรดเฉลี่ย </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->gpa}}">
                        </div>
                    </div>
                    @endforeach
                </table>
            </div> {{-- End div Form-row ประวัติการศึกษา --}}

            <br>
            <h2 class="text-center">รายละเอียดของงานที่ผ่านมา</h2>

            <div class="form-row mt-3">
                @foreach ($registration->registrtations_work as $data)
                <div class=" d-flex">
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">สถานที่ทำงาน </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->workplace}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">เริ่มปีที่ </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->start}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">ถึงปีที่ </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->end}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">ตำแหน่ง </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->position}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">ลักษณะของงาน </label>
                        <input type="text" readonly class="form-control" id="" name=""
                            value="{{$data->job_description}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">ค่าจ้าง </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->salary}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                        <input type="text" readonly class="form-control" id="" name=""
                            value="{{$data->reason_for_issue}}">
                    </div>
                </div>
                {{-- แถว 2 สถานที่ 2 --}}
                @endforeach
            </div> {{-- End div Form-row รายละเอียดของงานที่ผ่านมา --}}
            <br>

            <h2 class="text-center mt-5">ความถนัดทางภาษา</h2>

            <div class="form-row mt-4">

            {{-- ภาษาไทย --}}
                <div class="form-group col-md-4 text-center">
                <center><label for="" class="font-weight-bold">ภาษาไทย</label></center>
                        <div id="RadioGroup">
                            <input  type="checkbox" name="th_speak"  @if($registration->registrtations_aptitude->th_speak == 1) checked @endif  disabled   /> พูด &nbsp;
                            <input  type="checkbox" name="th_read"   @if($registration->registrtations_aptitude->th_read == 1)  checked @endif   disabled   /> อ่าน &nbsp;
                            <input  type="checkbox" name="th_write"  @if($registration->registrtations_aptitude->th_write == 1) checked @endif   disabled   />  &nbsp; เขียน
                        </div>
                </div>

            {{-- ภาษาอังกฤษ --}}
                <div class="form-group col-md-4 text-center">
                <center><label for="" class="font-weight-bold">ภาษาอังกฤษ</label></center>
                    <div id="RadioGroup">
                        <input  type="checkbox" name="en_speak"  @if($registration->registrtations_aptitude->en_speak == 1)  checked @endif    disabled   /> พูด &nbsp;
                        <input  type="checkbox" name="en_read" @if($registration->registrtations_aptitude->en_read == 1)  checked @endif   disabled   /> อ่าน &nbsp;
                        <input  type="checkbox" name="en_write"  @if($registration->registrtations_aptitude->en_write == 1)  checked @endif   disabled  />  &nbsp; เขียน
                    </div>
                </div>

            {{-- ภาษาจีน --}}
                <div class="form-group col-md-4 text-center">
                <center><label for="" class="font-weight-bold">ภาษาจีน</label></center>
                    <div id="RadioGroup">
                        <input  type="checkbox" name="ch_speak"   @if($registration->registrtations_aptitude->ch_speak == 1) checked @endif  disabled  /> พูด &nbsp;
                        <input  type="checkbox" name="ch_read"   @if($registration->registrtations_aptitude->ch_read == 1) checked @endif   disabled /> อ่าน &nbsp;
                        <input  type="checkbox" name="ch_write"  @if($registration->registrtations_aptitude->ch_write == 1) checked @endif  disabled  />  &nbsp; เขียน
                    </div>
                </div>
            </div>{{-- End div Form-row ความถนัดทางภาษา --}}

            <br><br>

            {{-- ความสามารถพิเศษ --}}
            <div class="form-row">

                {{-- แถว 1 --}}
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">ความสามารถพิเศษ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->talent}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">งานอดิเรก </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->hobby}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">กีฬาที่ชอบ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->sport}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">ความรู้พิเศษ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->knowledge}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">ความสามารถพิเศษอื่นๆ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->other_talent}}">
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
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contactrelated_as}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">เบอร์ติดต่อ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_phone}}">
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
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_house_number}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">หมู่ที่ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_moo}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ถนน </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_road}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ตำบล/แขวง </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_district}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">อำเภอ/เขต </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_amphur}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">จังหวัด </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_province}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">รหัสไปรษณีย์ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_zipcode}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">Email </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contact_email}}">
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
                <div class="form-group col-md-4 text-left mt-1 ">
                    <label for="" class="font-weight-bold">ท่านเคยถูกดำเนินคดีหรือไม่</label>
                    <div id="RadioGroup">
                        @switch($registration->prosecuted)
                        @case(1)
                        <input type="radio" name="" value="" checked /> เคย &nbsp;

                        @break
                        @default

                        <input type="radio" name="" value="" checked /> &nbsp; ไม่เคย
                        @endswitch

                    </div>
                </div>
                <div class="col-md-8">
                    <label for="" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->prosecuted_detail}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 text-left mt-1">
                    <label for="" class="font-weight-bold">ท่านเคยป่วยหนักหรือโรคร้ายแรงหรือไม่</label>
                    <div id="RadioGroup">
                        @switch($registration->contagion)
                        @case(1)
                        <input type="radio" name="" value="" checked /> เคย &nbsp;

                        @break
                        @default

                        <input type="radio" name="" value="" checked /> &nbsp; ไม่เคย
                        @endswitch
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->contagion_detail}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 text-left mt-1 ">
                    <label for="" class="font-weight-bold">ท่านมีโรคประจำตัวหรือไม่</label>
                    <div id="RadioGroup" class="mt-2">
                        @switch($registration->congenital_disease)
                        @case(1)
                        <input type="radio" name="" value="" checked /> เคย &nbsp;
                        @break
                        @default
                        <input type="radio" name="" value="" checked /> &nbsp; ไม่เคย
                        @endswitch
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="" class="font-weight-bold">คำอธิบายเพิ่มเติม </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->congenital_disease_detail}}">
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
                    <textarea type="text" class="form-control" id="" name="" value="{{$registration->about_yourself}} "
                        readonly cols="160" rows="10">{{$registration->about_yourself}}
                            </textarea>

                </div>
            </div>
            @if ($registration->status == 'รอตรวจสอบ')
            <h2 class="text-center mt-5">สถานนะผู้สมัครงาน</h2>
            <form action="{{ Route('candidate.update',$registration)}}" method="POST">
                @csrf
                <div class=" d-flex justify-content-center mt-5">
                    <div class="row col-6">
                        <div class="col-12 my-1">
                            <label class="mr-sm-2" for="status">สถานนะผู้สมัครงาน</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="{{ old('status') }}" class="form-control">
                                    {{ old('status') ? :'เลือกสถานะ' }}</option>
                                <option value="ไม่ผ่านการสมัครงาน">ไม่ผ่านการสมัครงาน</option>
                                <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งาน</option>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="status_detail"> หมายเหตุ</label>
                            <textarea type="text" class="form-control @error('status_detail') is-invalid @enderror" id="status_detail" name="status_detail" cols="30" rows="5">{{ old('status_detail') ? : '' }}</textarea>
                            @error('status_detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label for="status_detail"> วันนัดสัมภาษณ์งาน </label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>
                </div>
                <div class=" d-flex justify-content-center mt-5 mb-5">
                    <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
                    <a href="/jobs/candidates/" class="btn btn-outline-primary">ย้อนกลับ</a>
                </div>
            </form>
            @else   
            <div class="d-flex justify-content-center mt-5">
            <span>สถานะ : {{$registration->status }}</span>
            </div>
            <div class="d-flex justify-content-center mt-2">
                @if($registration->status == 'ไม่ผ่านการสมัครงาน' || $registration->status == 'ไม่ผ่านการสัมภาษณ์งาน' )
                <div class="row col-6">
                <div class="col-12">
                    <label for="status_detail"> หมายเหตุ  {{$registration->status }}</label>
                    <textarea type="text" class="form-control"  cols="30" rows="5" readonly >{{$registration->status_detail}}</textarea>
                
                </div>
                </div>
                @endif
            </div>
            <div class=" d-flex justify-content-center mt-5">
                <a href="/jobs/candidates/" class="btn btn-outline-primary">ย้อนกลับ</a>
            </div>
            @endif
            
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
