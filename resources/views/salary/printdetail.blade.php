@extends('layouts.admin')

@section('content')
<div class="container">

    <form class="my-5" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="mr-3">
        <a href="#" class="btn btn-primary col-md-1 float-right ml-2">พิมพ์</a>
        <a href="#" class="btn btn-secondary col-md-1 float-right ml-2">ยกเลิก</a>
    </div>
        <br><br>
        <div class="col-md-12">
            <div class="card card-body col-12 mt-1">
                <div class="row">
                    <div class="col-sm-8 mt-2">

                            <h3 class="ml-3" style="color:#0078D7">BKK</h3>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label ml-3 " style="color:#0078D7">ชื่อ - นามสกุล:</label>
                                <div class="col-sm-2 mt-2">
                                    <span>Luck Davids</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label ml-3 " style="color:#0078D7">แผนก/ตำแหน่งงาน:</label>
                                <div class="col-sm-2 mt-2">
                                    <span>เงินเดือน</span>
                                </div>
                            </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label " style="color:#0078D7">เลขที่</label>
                            <div class="col-sm-8 mt-2">
                                <span>EX2301320321</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label" style="color:#0078D7">วันที่</label>
                            <div class="col-sm-8 mt-2">
                                <span>23/07/2020</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label" style="color:#0078D7">เลขบัญชี</label>
                            <div class="col-sm-8 mt-2">
                                <span>123-4-56789-0</span>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card mb-3" style="max-width: 22rem;">
                            <div class="card-header text-white text-center" style="background-color: #0078D7">เงินได้</div>
                            <div class="card-body">

                            <p class="   float-left ml-4">เงินเดือน/เงินจ้าง</p>
                            <p class="   float-right mr-5">15,000 บาท</p><br></br>
                            <p class="   float-left ml-4">ค่าล่วงเวลา</p>
                            <p class="   float-right mr-5">0.00 บาท</p><br></br>
                            <p class="   float-left ml-4">โบนัส</p>
                            <p class="   float-right mr-5">0.00 บาท</p><br></br>
                            <p class="   float-left ml-4">อื่นๆ</p>
                            <p class="   float-right mr-5">0.00 บาท</p>
                            </div>
                          </div>
                          <div class="card mb-3" style="max-width: 22rem;">
                            <div class="card-header text-white text-center" style="background-color: #0078D7">รายการหัก</div>
                            <div class="card-body">

                                <p class="   float-left ml-4">ภาษีมูลค่าเพิ่ม</p>
                                <p class="   float-right mr-5">1,050 บาท</p><br></br>
                                <p class="   float-left ml-4">ประกันสังคม</p>
                                <p class="   float-right mr-5">0.00 บาท</p><br></br>
                                <p class="   float-left ml-4">ค่าปรับ</p>
                                <p class="   float-right mr-5">0.00 บาท</p><br></br>
                                <p class="   float-left ml-4">อื่นๆ</p>
                                <p class="   float-right mr-5">0.00 บาท</p>
                            </div>
                          </div>
                          <div class="card mb-3" style="max-width: 22rem;">
                            <div class="card-header text-white text-center" style="background-color: #0078D7">สรุป</div>
                            <div class="card-body">

                                <p class="   float-left ml-4">เงินได้สะสม</p>
                                <p class="   float-right mr-5">15,000 บาท</p><br></br>
                                <p class="   float-left ml-4">รายการหัก</p>
                                <p class="   float-right mr-5">0.00 บาท</p><br></br>
                                <p class="   float-left ml-4">เงินได้สุทธิ</p>
                                <p class="   float-right mr-5">13,950 บาท</p>

                            </div>
                          </div>
                      </div>
        </div>
        @endsection
