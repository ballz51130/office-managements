@extends('layouts.admin')

@section('content')
<div class="container">

    <form class="my-5" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">

            <a href="#" class="btn btn-secondary col-md-2 float-right ml-2">ดาวน์โหลดExcel</a>

            <h3 style="color:#0078D7">รายงานสรุปค่าใช้จ่าย</h3>

            <div class="card card-body mt-3">

                <div class="row mt-1 m-2">
                    <div class="col-md-10">
                        <h3>รายละเอียด</h3>
                        <h4>ช่างเวลา : </h4>
                    <form action="" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">วันเริ่มต้น</label>
                                <input type="date" class="form-control" id="" name="">
                            </div>
                            <div class="col-md-3">
                                <label for="">วันสิ้นสุด</label>
                                <input type="date" class="form-control" id="" name="">

                            </div>
                            <div class="col-md-3">
                                <label for="">สถานะ</label>
                                <select name="" id="" class="form-control">
                                    <option value="">แสดงทั้งหมด</option>
                                    <option value="">-----</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2 float-right mt-4 p-3">
                        <button type="submit" class="btn btn-primary mt-5">แสดงผลรายงาน</button>
                    </div>
                </form>
                </div>
                <br>
                <hr>
                <h3 style="color:#0078D7">รายงานสรุปค่าใช้จ่าย</h3>
                <div class="row">
                    <div class="col-sm-8 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ณ วันที่</label>
                            <div class="col-sm-10">
                                <span> 13 สิงหาคม 2020 </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ช่วงเวลา</label>
                            <div class="col-sm-10">
                                <span>1 กรกฏาคม 2020 - 13 สิงหาคม 2020 </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">เลขที่</label>
                            <div class="col-sm-10">
                                <span>EX2301320321 - EX2301320333 </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="form-row text-right mt-3 m-2">
                            <div class="col-md-6">
                                <label for="">มูลค่ารวม</label>
                                <h3 style="color:#0078D7">0.00</h3>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02">ภาษีมูลค่าเพิ่ม</label>
                                <h3>0.00</h3>

                            </div>

                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead style="color: #0078D7" class="text-center">
                        <tr>
                            <th>เลขที่อกสาร</th>
                            <th>วันที่</th>
                            <th>ชื่อผู้จำหน่าย</th>
                            <th>หมวดหม่</th>
                            <th>มูลค่า</th>
                            <th>ภาษีมูลค่าเพิ่ม</th>
                            <th>ยอดรวมสุทธิ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for ($i = 1; $i <= 5; $i++)
                        <tr>
                            <td><a href="{{ROUTE('cost_detail',$i)}}"> EX232012212{{$i}} </a></td>
                            <td>21/12/2020</td>
                            <td>BKK</td>
                            <td><i class='fas fa-child' style='color:green'></i> เงินเดือน/ค่าจ้าง</td>
                            <td class="text-center">10000</td>
                            <td class="text-center">200</td>
                            <td class="text-center">10200</td>
                            <td>ชำระเงินแล้ว</td>
                        </tr >

                        </tr>
                        @endfor
                    </tbody>
                </table>

            </div>

        </div>
        @endsection
