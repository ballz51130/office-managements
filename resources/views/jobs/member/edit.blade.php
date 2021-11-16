@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="col-md-12">

        <div class="card card-body mt-5 mb-5 m-1">

            {{-- Logo BKK --}}
            
            <h2 class="text-center">ใบรับสมัครงาน</h2>
            <br>
            <div class="d-flex justify-content-center">
                <label for="file" style="cursor: pointer;"><img id="output" src=""
                    width="200" height="200" class="rounded-circle" /> </label>
                
            </div>
            <div class="d-flex justify-content-center">
            <div class="ml-2">รูปภาพ 1นิ้ว หรือ 2.50 x 3.25 cm</div>
            </div>
    

            <div class="form-row mt-5">

                {{-- ชื่อภาษาไทย แถว 1--}}
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">คำนำหน้า <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{ $registration->title_name }}">

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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->title_name_eng}}">
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">Name in English <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->name_eng}}">
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">เพศ<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->nickname_eng}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->house_number}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->nationality}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->place_of_issue}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">บัตรหมดอายุ <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->card_expired}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->military_year}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->marriage_status}}">

                </div>
                <div class="form-group col-md-12">
                    <label for="" class="font-weight-bold">กรณีแต่งงาน</label>
                    <input type="text" readonly class="form-control" id="" name=""
                        value="{{$registration->marriage_registration}}">

                </div>
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">ชื่อภรรยาหรือสามี </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->marriage_name}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->child_study}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="font-weight-bold">จำนวนบุตรที่ไม่ได้ศึกษา </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->chid_nonstudy}}">
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
                            <label for="" class="font-weight-bold">วุฒิการศึกษา </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->educational}}">
                        </div>
                        <div class="form-group mr-1 ">
                            <label for="" class="font-weight-bold">สถาบันการศึกษา </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->institution}}">
                        </div>
                        <div class="form-group mr-1 ">
                            <label for="" class="font-weight-bold">สาขาวิชา </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->field_of_study}}">
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
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->job_description}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">ค่าจ้าง </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->salary}}">
                    </div>
                    <div class="form-group mr-1">
                        <label for="" class="font-weight-bold">เหตุผลที่ออก </label>
                        <input type="text" readonly class="form-control" id="" name="" value="{{$data->reason_for_issue}}">
                    </div>
                </div>
                {{-- แถว 2 สถานที่ 2 --}}
                @endforeach
            </div> {{-- End div Form-row รายละเอียดของงานที่ผ่านมา --}}
            <br>

            {{-- ภาษา --}}
            <h2 class="text-center">ความถนัดทางภาษา</h2>

            @foreach ($registration->registrtations_aptitude as $data)

            <div class=" d-flex justify-content-center">
                <div class="d-flex">
                    <div class="form-row ">
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">ภาษา </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->language}}">
                        </div>
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">พูด </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->speak}}">
                        </div>
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">อ่าน </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->read}}">
                        </div>
                        <div class="form-group mr-1">
                            <label for="" class="font-weight-bold">เขียน </label>
                            <input type="text" readonly class="form-control" id="" name="" value="{{$data->write}}">
                        </div>
                    </div>
                </div>
            </div>{{-- End div Form-row ความถนัดทางภาษา --}}
            @endforeach

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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->other_talent}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contactrelated_as}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">เบอร์ติดต่อ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_phone}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_moo}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ถนน </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_road}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">ตำบล/แขวง </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_district}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">อำเภอ/เขต </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_amphur}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">จังหวัด </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_province}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 ">
                    <label for="" class="font-weight-bold">รหัสไปรษณีย์ </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_zipcode}}">
                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5 ">
                    <label for="" class="font-weight-bold">Email </label>
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contact_email}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->prosecuted_detail}}">
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
                    <input type="text" readonly class="form-control" id="" name="" value="{{$registration->contagion_detail}}">
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
                    <textarea type="text" class="form-control" id="" name="" value="{{$registration->about_yourself}} " readonly
                        cols="160" rows="10">{{$registration->about_yourself}}
                            </textarea>

                </div>
            </div>
            <h2 class="text-center mt-5">สถานนะผู้สมัครงาน</h2>
            <form action="{{ Route('jobslist.update',$registration)}}" method="POST">
                @csrf
                <div class="d-flex justify-content-md-center mt-5 mb-5">
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" id="status" name="status" required>
                            <option value="" selected>เลือกสถานะ</option>
                            @switch($registration->status)
                                @case('รอตรวจสอบ')
                                    <option value="ไม่ผ่านการตรวจเอกสาร">ไม่ผ่านการตรวจเอกสารครั้งที่ 1</option>
                                    <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งานครั้งที่ 1</option>
                                   
                                @break
                                @case('ไม่ผ่านการตรวจเอกสาร')
                                <option value="ไม่ผ่านการตรวจเอกสาร">ไม่ผ่านการตรวจเอกสารครั้งที่ {{$registration->status_rols+1}}</option>
                                    <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งานครั้งที่ 1</option>
                                    <option value="ไม่ผ่านการสมัครงาน">ไม่ผ่านการสมัครงาน</option>
                                @break
                                @case('รอสัมภาษณ์งาน')
                                    <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งานครั้งที่ {{$registration->status_rols+1}}</option>
                                    <option value="ผ่านสัมภาษณ์งาน">ผ่านสัมภาษณ์งาน</option>
                                    <option value="ไม่ผ่านสัมภาษณ์งาน">ไม่ผ่านสัมภาษณ์งาน</option>
                                @break
                              
                            @endswitch
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <a href="/jobslists" class="btn btn-outline-primary">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
            {{-- <div class=" d-flex justify-content-center mt-5">
                <div class="row col-6">  
                <div class="col-12 my-1">
                <label class="mr-sm-2" for="status">สถานนะผู้สมัครงาน</label>
                <select class="custom-select mr-sm-2" id="status" name="status" required>
                    <option value="" selected>เลือกสถานะ</option>
                    @switch($registration->status)
                    @case('รอตรวจสอบ')
                        <option value="ไม่ผ่านการตรวจเอกสาร">ไม่ผ่านการตรวจเอกสารครั้งที่ 1</option>
                        <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งานครั้งที่ 1</option>
                       
                    @break
                    @case('ไม่ผ่านการตรวจเอกสาร')
                    <option value="ไม่ผ่านการตรวจเอกสาร">ไม่ผ่านการตรวจเอกสารครั้งที่ {{$registration->status_rols+1}}</option>
                        <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งานครั้งที่ 1</option>
                        <option value="ไม่ผ่านการสมัครงาน">ไม่ผ่านการสมัครงาน</option>
                    @break
                    @case('รอสัมภาษณ์งาน')
                        <option value="รอสัมภาษณ์งาน">รอสัมภาษณ์งานครั้งที่ {{$registration->status_rols+1}}</option>
                        <option value="ผ่านสัมภาษณ์งาน">ผ่านสัมภาษณ์งาน</option>
                        <option value="ไม่ผ่านสัมภาษณ์งาน">ไม่ผ่านสัมภาษณ์งาน</option>
                    @break
                  
                @endswitch
                </select>
                    </div>
                <div class="col-12">
                    <label for="status_detail"> หมายเหตุ</label>
                    <textarea type="text" class="form-control" id="status_detail" name="status_detail" value="" required
                        cols="30" rows="5">{{$registration->status_detail}}</textarea>
                    </div>
               
               
            </div>
        </div>
            <div class=" d-flex justify-content-center mt-5 mb-5">
                <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
                <a href="/jobslists" class="btn btn-outline-primary">ย้อนกลับ</a>
            </div> --}}
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
