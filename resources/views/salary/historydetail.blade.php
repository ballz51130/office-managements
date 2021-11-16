@extends('layouts.admin')

@section('content')
<div class="container">

    <form class="my-5" method="POST" action="" enctype="multipart/form-data">
        @csrf
            <div class="card card-body mt-3">

                <div class="row mt-1 m-2">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-primary col-md-1 float-right ml-2">พิมพ์</a>
                        <a href="#" class="btn btn-light col-md-1 float-right ml-2">ยกเลิก</a>

                        <h3 style="color:#0078D7">บันทึกค่าใช้จ่าย</h3><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 mt-2">

                            <h5 class="ml-3" style="color:#0078D7">ผู้จำหน่าย</h5>
                            <p class="ml-3">BKK (สาขาใหญ่)</p>
                            <p class="ml-3">79/4 ลำปาง 52000</p>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label ml-3 " style="color:#0078D7">ชื่อรายการ :</label>
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
                            <label for="" class="col-sm-4 col-form-label" style="color:#0078D7">ผู้ทำรายการ</label>
                            <div class="col-sm-8 mt-2">
                                <span>Minami</span>
                            </div>
                        </div>

                        </div>
                    </div>
                <br>
                <table class="table">
                    <thead style="background-color: #0078D7" class="text-white text-center">
                        <tr>
                            <th>ลำดับ</th>
                            <th></th>
                            <th>หมวดหมู่</th>
                            <th>จำนวน</th>
                            <th>หน่วย</th>
                            <th>จำนวนวัน</th>
                            <th>ราคารวม</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>Luck Davids</td>
                            <td>เงินเดือน/ค่าจ้าง</td>
                            <td>500</td>
                            <td>วัน</td>
                            <td>30</td>
                            <td>15,000</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <br><br><br>
                       <h5 class="ml-5 mt-5">(หนึ่งหมื่นสามพันเก้าร้อยห้าสิบบาทถ้วน)</h5>
                    </div>
                    <div class="col-md-6 float-right">
                        <h5 class="float-right mr-5 ">15,000  บาท</h5>
                        <h5><font color="#0078D7" class="float-right mr-3"> รวมเป็นเงิน </font></h5><br><br/>
                        <h5 class="float-right mr-5">13,950  บาท</h5>
                        <h5><font color="#0078D7" class="float-right mr-3"> ภาษีมูลค่าเพิ่ม 7% </font></h5><br><br/>
                        <h5 class="float-right mr-5">13,950  บาท</h5>
                        <h5><font color="#0078D7" class="float-right mr-3"> จำนวนเงินรวมทั้งสิ้น </font></h5><br><br/>

                    </div>
                </div>
                <hr>
                <div class="col-md-8 mt-2">
                    <div>
                    <h5 class="ml-3" style="color:#0078D7">รายละเอียดการชำระ</h5>
                </div><br>
                <div>
                <label for="" class="font-weight-bold ml-3">ช่องทางการชำระ</label>
                <div class="ml-2" id="RadioGroup"> &nbsp;
                    <input  type="radio" name="###"  value="" /> เงินสด &nbsp;
                    <input  type="radio" name="###"  value="" />  &nbsp; โอนเงิน
                </div>
            </div><br>
            <div>

                <p><font class="float-left mr-2"> ธนาคาร : </font></p>
                <p class="float-left mr-3 ">กสิกร/ออมทรัพย์ </p>

                <p><font class="float-left mr-2"> เลขบัญชี : </font></p>
                <p class="float-left mr-3 ">6234525925</p>

                <p><font class="float-left mr-2"> เลขบัญชี : </font></p>
                <p class="float-left mr-3 ">6234525925</p><br></br>

                <p><font class="float-left mr-2 mt-3"> ยอดชำระ : </font></p>
                <p class="float-left mr-3 ">15,000 </p>

                <p><font class="float-left mr-2"> หัก ณ ที่จ่าย : </font></p>
                <p class="float-left mr-3 ">0.00</p>
            </div><br><br></br>

                <div class="col-md-12 text-center">
                    <div class=" float-left ml-2">
                        <p>ผู้รับเงิน</p>
                        <p>.........................................</p>
                        <p>(.........................................)</p>
                         <p>วันที่ :..........................</p>
                    </div>
                    <div class=" float-left ml-5">
                        <p>ผู้จัดทำ</p>
                        <p>.........................................</p>
                        <p>(.........................................)</p>
                         <p>วันที่ :..........................</p>
                    </div>
                    <div class=" float-left ml-5">
                        <p>ผู้อนุมัติ</p>
                        <p>.........................................</p>
                        <p>(.........................................)</p>
                        <p>วันที่ :..........................</p>
                    </div>
                </div>

                </div>


        </form>
        </div>
        @endsection
