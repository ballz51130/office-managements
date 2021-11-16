@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h3 style="color:#0078D7">ประวัติการรับเงินเดือน</h3>
                    <p>ประวัติการรับเงินเดือน > ทั้งหมด</p>
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
       @include('salary.page.nav')

        <table class="table">
            <thead style="background-color: #0078D7" class="text-white">
                <tr>
                    <th>วันทำรายการ</th>
                    <th>เลขที่เอกสาร</th>
                    <th>ชื่อผู้ทำรายการ</th>
                    <th>หมวดหมู่</th>
                    <th>ยอดรวมสุทธิ</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++) <tr>
                    <td>5 กรกฎาคม 2563 </td>
                <td> <a href="{{ROUTE('salary.printdetail',$i)}}">EX00{{$i}}  </a> </td>
                    <td> member {{$i}}</td>
                    <td> รายเดือน </td>
                    <td>{{$i*1000}}</td>
                    <td ><span class="bg-success text-white p-1" > ชำระเงินแล้ว </span></td>
                    <td class="td-action">
                    <a href="{{ROUTE('salary.historydetail',$i)}}" class="text-dark">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        <span> พิมพ์สริป</span>
                    </a>
                    <p class="text-secondary">จำนวนกสนพิมพ์ : {{$i}} ครั้ง</p>
                    </td>
                    </tr>
                    @endfor
            </tbody>

        </table>
        <div class="card-footer d-flex justify-content-end">
            {{-- <?php echo $users->render(); ?> --}}
        </div>
    </div>

</div>
</div>

    @endsection
