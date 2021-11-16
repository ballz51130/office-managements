@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h3 style="color:#0078D7">รายการค่าใช้จ่าย</h3>
                    <p>รายการค่าใช้จ่าย > ทั้งหมด</p>
                </div>
                <div class="page-header-subtitle"></div>
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <br>
                    <div class="container">
                        <div class="clearfix mb-2 float-right">
                            <form method="GET" class="form-inline">
                                <div class="form-group">
                                    <label for="text">ค้นหา : </label>
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control float-right ml-3" id="search" name="search"
                                        placeholder="ค้นหาพนักงาน" value="">
                                    </select>
                                </div>
                                <div class="form-group ml-3">
                                    <label for="text">สถานะเอกสาร :</label>
                                    <select class="form-control  ml-2 col-md-6 " name="type" id="type">
                                        <option value="" hidden>ทั้งหมด</option>
                                        <option value="">-ทั้งหมด-</option>
                                    </select>
                                </div>
                                <div class="form-group ml-3">
                                    <label for="text">ช่วงเวลา : </label>
                                    <select class="form-control ml-2 col-md-7 " name="type" id="type">
                                        <option value="" hidden>ทั้งหมด</option>
                                        <option value="">-ทั้งหมด-</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary ml-1"><i
                                        class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<div class="card-container container mb-5 mt-3">
    <div class="card">


        <table class="table">
            <thead style="background-color: #0078D7" class="text-white text-center">
                <tr>
                    <th>วันทำรายการ</th>
                    <th>เลขที่เอกสาร</th>
                    <th>ชื่อผู้รับ</th>
                    <th>หมวดหมู่</th>
                    <th>ยอดรวมสุทธิ</th>
                    <th  class="text-left">สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                $status = ['ชำระเงินแล้ว','รอดำเนินการ','อนุมัติ'];
                $count = count($status);
                @endphp
                @for ($i = 0; $i < $count; $i++)
                @php $statuss=$status[$i]; @endphp
                <tr>
                    <td>5 กรกฎาคม 2563 </td>
                    <td> EX00{{$i}} </td>
                    <td> member {{$i}}</td>
                    <td> รายเดือน </td>
                    <td>{{$i*1000}}</td>
                    @switch($statuss)

                            @case('ชำระเงินแล้ว')
                            <td class="text-left">

                                <a class="btn btn-success p-1">{{$statuss}}</a>
                            </td>
                            @break

                            @case('รอดำเนินการ')
                            <td class="text-left">
                            <span>
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$statuss}}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="" class="btn btn-danger " data-toggle="modal" data-target="#notapprove">
                                            ไม่อนุมัติรายการ
                                        </a>
                                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#approve">
                                            อนุมัติรายการ
                                        </a>

                                    </div>
                                  </div>
                                    @include('salary.MD.model.approve')
                                    @include('salary.MD.model.notapprove')
                                </span>
                            </td>
                            @break

                            @case('อนุมัติ')
                            <td class="text-left">

                                <a class="btn btn-primary">{{$statuss}}</a>
                            </td>
                            @break

                            @endswitch
                    </tr>
                    @endfor
            </tbody>

        </table>

        <div class="footer text-right">
            <h3 class="mr-5">ยอดรวมทั้งหมด : <span class="text-info">50000</span></h3>
        </div>
    </div>
</div>
</div>
    @endsection
