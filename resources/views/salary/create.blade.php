@extends('layouts.admin')

@section('content')
<div class="container">

    <form class="my-5" method="POST" action="" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12">
                    <h3>สร้างค่าใช้จ่าย</h3>
                    <a href="#" class="btn btn-primary col-md-1 float-right ml-2" >บันทึก</a>
                    <a href="#" class="btn btn-danger col-md-1 float-right" >ยกเลิก</a>
                    <h2><font color="#0078D7"> EX232002003 </font></h2> &nbsp;

                    <div class="card card-body">

                        <div class="row">
                            <div class="col-md-12">

                                <a href="#" data-toggle="modal" data-target="#addsenemail">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope-fill float-right " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                      </svg>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#printsalary">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-download float-right mr-4 " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                      </svg>
                                </a>
                                <a href="" data-toggle="modal" data-target="#sendemail">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-printer float-right mr-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H5a1 1 0 0 0-1 1v2H3V3a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h-1V3a1 1 0 0 0-1-1zm3 4H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1v1H2a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z"/>
                                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM5 8a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H5z"/>
                                        <path d="M3 7.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                                @include('salary.model.addsendemail')
                                @include('salary.model.addbank')
                                @include('salary.model.payment')
                                @include('salary.model.requestdocuments')
                                @include('salary.model.sendemail')

                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>รายละเอียด</h3>
                                <br>
                                <textarea type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}" cols="100" rows="10"></textarea>
                            </div>
                            <div class="col-md-6 float-right">
                                <h3 class="float-right mr-5">จำนวนเงินรวมทั้งสิ้น</h3><br><br/>
                                <h2><font color="#0078D7" class="float-right mr-5"> 0.00 </font></h2><br><br/>
                                <div class="form-group row float-right mr-2">
                                    <h5><label for="inputPassword" class=" col-form-label">วันที่ :</label></h5>
                                    <div class="col-md-9">
                                      <input type="date" class="form-control" id="inputPassword">
                                    </div>
                            </div>
                        </div>
                        </div>
                        <br><hr>
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
                                  <tr>
                                    <th scope="row">2</th>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 ">
                            <a href="#" class="btn btn-outline-primary col-md-2 float-left" ><i class="fas fa-plus"></i> เพิ่มแถวรายการ</a>
                        </div>
                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-md-6">
                            <h3>หมายเหตุ :</h3>
                            <br>
                            <textarea type="text" class="form-control @error('') is-invalid @enderror" id="" name="" value="{{ old('') }}" cols="100" rows="10"></textarea>
                        </div>
                        <div class="col-md-6 float-right">
                            <h2 class="float-right mr-5 ">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> รวมเป็นเงิน </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> ค่าคอมมิชชั่น </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> ค่าประกันสังคม </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> ภาษีมูลค่าเพิ่ม 7% </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> ค่าล่วงเวลา </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> ค่าปรับ </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> ค่าเพิ่มเติม </font></h2><br><br/>
                            <h2 class="float-right mr-5">0.00</h2>
                            <h2><font color="#0078D7" class="float-right mr-3"> จำนวนเงินรวมทั้งสิ้น </font></h2><br><br/>


                        </div>
                    </div>
                    </div>

</div>
    </form>
</div>

@endsection
