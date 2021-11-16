@extends('layouts.admin')

@section('content')
<div class="container">

    <form class="my-5" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <h3>สร้างค่าใช้จ่าย</h3>
            <a href="#" class="btn btn-primary col-md-1 float-right ml-2">บันทึก</a>
            <a href="#" class="btn btn-danger col-md-1 float-right">ยกเลิก</a>
            <h2>
                <font color="#0078D7"> EX232002003 </font>
            </h2> &nbsp;
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>รายละเอียด</h3>
                        <br>
                        <textarea type="text" class="form-control @error('') is-invalid @enderror" id="" name=""
                            value="{{ old('') }}" cols="100" rows="10"></textarea>
                    </div>
                    <div class="col-md-6 float-right">
                        <h3 class="float-right mr-5">จำนวนเงินรวมทั้งสิ้น</h3><br><br />
                        <h2>
                            <font color="#0078D7" class="float-right mr-5"> 0.00 </font>
                        </h2><br><br />
                        <div class="form-group row float-right mr-2">
                            <h5><label for="inputPassword" class=" col-form-label">วันที่ :</label></h5>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="inputPassword">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <h5><label for="inputPassword" class=" col-form-label">ชื่อรายการ :</label></h5>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputPassword">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead style="background-color: #0078D7" class="text-white">
                                <tr>
                                    <th width="10px">ลำดับ</th>
                                    <th width="40px">พนักงาน</th>
                                    <th width="10px">จำนวน</th>
                                    <th width="10px">หน่วย</th>
                                    <th width="20px">จำนวนวัน</th>
                                    <th width="10px">ราคารวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>1.00</td>
                                    <td>วัน</td>
                                    <td>30</td>
                                    <td>30,000</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>


                <div class="row">
                    <div class="col-md-6">
                        <h3>หมายเหตุ :</h3>
                        <br>
                        <textarea type="text" class="form-control @error('') is-invalid @enderror" id="" name=""
                            value="{{ old('') }}" cols="100" rows="10"></textarea>
                    </div>
                    <div class="col-md-6 float-right">
                        <h2 class="float-right mr-5 ">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> รวมเป็นเงิน </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> ค่าคอมมิชชั่น </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> ค่าประกันสังคม </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> ภาษีมูลค่าเพิ่ม 7% </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> ค่าล่วงเวลา </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> ค่าปรับ </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> ค่าเพิ่มเติม </font>
                        </h2><br><br />
                        <h2 class="float-right mr-5">0.00</h2>
                        <h2>
                            <font color="#0078D7" class="float-right mr-3"> จำนวนเงินรวมทั้งสิ้น </font>
                        </h2><br><br />


                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection
