@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="col-md-12">

        <div class="card card-body mt-5 mb-5 m-1">

            {{-- Logo BKK --}}

            <h2 class="text-center">ใบรับสมัครงาน</h2>
            <br>
            <div class="d-flex justify-content-center">
                <label for="file" style="cursor: pointer;"><img id="output" src="{{asset('storage/'.$interviewlist->registrations->image)}}" width="200" height="200"
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
                        value="{{$interviewlist->registrations->name }}">

                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->name}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ชื่อเล่น <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->nickname}}">
                </div>

                {{-- ชื่อภาษาอังกฤษ แถว 2--}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">Name Title * <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->title_name_eng}}">
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">Name in English <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->name_eng}}">
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">เพศ<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->nickname_eng}}">
                </div>

                {{-- ตำแหน่งงาน แถว 3--}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">สมัครงานตำแหน่ง<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->position}}">
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">เงินเดือนที่ต้องการ บาท/เดือน <span
                            class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->salary}}">
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
                        value="{{$interviewlist->registrations->house_number}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">หมู่ที่ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->moo}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ถนน </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->road}}">
                </div>

                {{-- แถว 2 --}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ตำบล/แขวง <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->district}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">อำเภอ/เขต <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->amphur}}">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">จังหวัด <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->province}}">
                </div>

                {{-- แถว 3 --}}
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->zipcode}}">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">Email <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->email}}">
                </div>
            </div>

            {{-- บ้านพักอาศัย --}}
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">พักอาศัยเป็น </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->live_as}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">อื่นๆระบุ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->others}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ข้อมูลส่วนตัว แถว 1 --}}
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">วัน/เดือน/ปีเกิด <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->brithday}}" readonly>
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">อายุ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->old}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">ส่วนสูง <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->height}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">น้ำหนัก <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->weight}}">
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
                        value="{{$interviewlist->registrations->nationality}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">เชื้อชาติ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->race}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ศาสนา </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->religion}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- แถว 3 --}}
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->id_card}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">สถานที่ออกบัตร <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->place_of_issue}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">บัตรหมดอายุ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->card_expired}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- แถวที่ 4 --}}
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">บัตรผู้เสียภาษีเลขที่ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->taxpayer}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">บัตรประกันสังคมเลขที่ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->social_security_card}}">
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
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->military}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="" class="font-weight-bold">จะเกณฑ์ในปี </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->military_year}}">
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
                        value="{{$interviewlist->registrations->marriage_status}}">

                </div>
                <div class="form-group col-md-12">
                    <label for="" class="font-weight-bold">กรณีแต่งงาน</label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->marriage_registration}}">

                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ชื่อภรรยาหรือสามี </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->marriage_name}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ชื่อสถานที่ทำงาน </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->work}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ตำแหน่ง </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->position}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- บุตร --}}
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">มีบุตรกี่คน </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->child}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">จำนวนบุตรที่กำลังศึกษา </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->child_study}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">จำนวนบุตรที่ไม่ได้ศึกษา </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->chid_nonstudy}}">
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
                    @foreach ($interviewlist->registrations->registrtations_study as $data)
                    {{-- แถว 1 มัธยม --}}
                    <div class=" d-flex">
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">วุฒิการศึกษา </label>
                            <input type="text" readonly class="form-control" id="" name=""
                                value="{{$data->educational}}">
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
                @foreach ($interviewlist->registrations->registrtations_work as $data)
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

            {{-- ภาษา --}}
            <h2 class="text-center mt-5">ความถนัดทางภาษา</h2>

            <div class="form-row mt-4">

            {{-- ภาษาไทย --}}
                <div class="form-group col-md-4 text-center">
                <center><label for="" class="font-weight-bold">ภาษาไทย</label></center>
                        <div id="RadioGroup">
                            <input  type="checkbox" name="th_speak"  @if($interviewlist->registrations->registrtations_aptitude->th_speak == 1) checked @endif  disabled   /> พูด &nbsp;
                            <input  type="checkbox" name="th_read"   @if($interviewlist->registrations->registrtations_aptitude->th_read == 1)  checked @endif   disabled   /> อ่าน &nbsp;
                            <input  type="checkbox" name="th_write"  @if($interviewlist->registrations->registrtations_aptitude->th_write == 1) checked @endif   disabled   />  &nbsp; เขียน
                        </div>
                </div>

            {{-- ภาษาอังกฤษ --}}
                <div class="form-group col-md-4 text-center">
                <center><label for="" class="font-weight-bold">ภาษาอังกฤษ</label></center>
                    <div id="RadioGroup">
                        <input  type="checkbox" name="en_speak"  @if($interviewlist->registrations->registrtations_aptitude->en_speak == 1)  checked @endif    disabled   /> พูด &nbsp;
                        <input  type="checkbox" name="en_read" @if($interviewlist->registrations->registrtations_aptitude->en_read == 1)  checked @endif   disabled   /> อ่าน &nbsp;
                        <input  type="checkbox" name="en_write"  @if($interviewlist->registrations->registrtations_aptitude->en_write == 1)  checked @endif   disabled  />  &nbsp; เขียน
                    </div>
                </div>

            {{-- ภาษาจีน --}}
                <div class="form-group col-md-4 text-center">
                <center><label for="" class="font-weight-bold">ภาษาจีน</label></center>
                    <div id="RadioGroup">
                        <input  type="checkbox" name="ch_speak"   @if($interviewlist->registrations->registrtations_aptitude->ch_speak == 1) checked @endif  disabled  /> พูด &nbsp;
                        <input  type="checkbox" name="ch_read"   @if($interviewlist->registrations->registrtations_aptitude->ch_read == 1) checked @endif   disabled /> อ่าน &nbsp;
                        <input  type="checkbox" name="ch_write"  @if($interviewlist->registrations->registrtations_aptitude->ch_write == 1) checked @endif  disabled  />  &nbsp; เขียน
                    </div>
                </div>
            </div>{{-- End div Form-row ความถนัดทางภาษา --}}

            <br><br>

            {{-- ความสามารถพิเศษ --}}
            <div class="form-row">

                {{-- แถว 1 --}}
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">ความสามารถพิเศษ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->talent}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">งานอดิเรก </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->hobby}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">กีฬาที่ชอบ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->sport}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3 ">
                    <label for="" class="font-weight-bold">ความรู้พิเศษ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->knowledge}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="font-weight-bold">ความสามารถพิเศษอื่นๆ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->other_talent}}">
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
                        value="{{$interviewlist->registrations->contactrelated_as}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">เบอร์ติดต่อ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_phone}}">
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
                        value="{{$interviewlist->registrations->contact_house_number}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">หมู่ที่ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_moo}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ถนน </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_road}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ตำบล/แขวง </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_district}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">อำเภอ/เขต </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_amphur}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">จังหวัด </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_province}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">รหัสไปรษณีย์ </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_zipcode}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">Email </label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->contact_email}}">
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
                        @switch($interviewlist->registrations->prosecuted)
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
                        value="{{$interviewlist->registrations->prosecuted_detail}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 text-left mt-1">
                    <label for="" class="font-weight-bold">ท่านเคยป่วยหนักหรือโรคร้ายแรงหรือไม่</label>
                    <div id="RadioGroup">
                        @switch($interviewlist->registrations->contagion)
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
                        value="{{$interviewlist->registrations->contagion_detail}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 text-left mt-1 ">
                    <label for="" class="font-weight-bold">ท่านมีโรคประจำตัวหรือไม่</label>
                    <div id="RadioGroup" class="mt-2">
                        @switch($interviewlist->registrations->congenital_disease)
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
                        value="{{$interviewlist->registrations->congenital_disease_detail}}">
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
                    <textarea type="text" class="form-control" id="" name=""
                        value="{{$interviewlist->registrations->about_yourself}} " readonly cols="160" rows="10">{{$interviewlist->registrations->about_yourself}}
                            </textarea>

                </div>
            </div>
            <div class="history mt-3">
            <form action="{{ Route('Interviewlist.update',$interviewlist)}}" method="POST">
                @csrf
                @foreach ($interviewlist->history as $item =>$data)
                <div class=" d-flex justify-content-center">
                    <div class="row col-6">
                        <div class="col-12 mt-2">
                            <label for="detail"> สัมภาษณ์งานครั้งที่ {{$item+1}} </label>
                            <input type="text" name="date" class="form-control @error('date') is-invalid @enderror"
                                value="{{ date('j / M / Y', strtotime($data->date)) }}" readonly>

                        </div>
                        <div class="col-12">
                            <label for="detail"> หมายเหตุ</label>
                            <textarea type="text" class="form-control @error('detail') is-invalid @enderror"
                                id="detail" name="detail" cols="30" rows="5"
                                readonly>{{$data->detail}}</textarea>
                            @error('detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @endforeach
               @if($interviewlist->status !='ไม่ผ่านการสัมภาษณ์งาน')
                <div class=" d-flex justify-content-center mt-5">
                    <div class="row col-6">
                        <div class="col-12 my-1">
                            <label class="mr-sm-2" for="status">สถานนะผู้สมัครงาน</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="{{ old('status') }}" class="form-control">
                                    {{ old('status') ? :'เลือกสถานะ' }}</option>
                                <option value="ผ่านการสัมภาษณ์งาน">ผ่านการสัมภาษณ์งาน</option>
                                <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์ครั้งที่ {{$interviewlist->registrations->status_rols+1}}</option>
                                <option value="ไม่ผ่านการสัมภาษณ์งาน">ไม่ผ่านการสัมภาษณ์งาน</option>
                               
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="detail"> รายระเอียดการสัมภาษณ์</label>
                            <textarea type="text" class="form-control @error('detail') is-invalid @enderror"
                                id="detail" name="detail" cols="30"
                                rows="5">{{ old('detail') ? :  $interviewlist->detail ? : '' }}</textarea>
                            @error('detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label for="date"> วันนัดสัมภาษณ์งาน <span style="font-size: 13px; color:red;">
                                    *หากมีการนัดสัมภาษณ์งานต่อ</span> </label>
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
                    <button type="submit" name="button"  value="1"  class="btn btn-primary mr-2">บันทึก</button>
                    <button type="submit" name="button"  value="2" class="btn btn-outline-primary">รอผลการสรุป</button>

                </div>
                @else
                <div class=" d-flex justify-content-center  ml-3 mt-2">
                    <div class="row col-6">
                <span>สถานะ : {{$interviewlist->status}}</span>
                    </div>
                </div>
                @endif
                <div class="d-flex justify-content-end">
                    <a href="/jobs/interviewlists/" class="btn btn-outline-primary">ย้อนกลับ</a>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
