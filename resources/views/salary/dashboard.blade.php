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
            <a href="{{ROUTE('salary.create')}}" class="btn btn-outline-primary float-right ml-1 mt-3"><i class="fa fa-plus"></i>
                    เพิ่มรายการ</a>
            </div>
        </div>


<div class="card-container container mb-5 mt-3">
    <div class="card">


        <table class="table">
            <thead style="background-color: #0078D7" class="text-white">
                <tr>
                    <th>วันทำรายการ</th>
                    <th>เลขที่เอกสาร</th>
                    <th>ชื่อผู้รับ</th>
                    <th>หมวดหมู่</th>
                    <th>ยอดรวมสุทธิ</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $status = ['ชำระเงินแล้ว','รอดำเนินการ','อนุมัติ'];
                $count = count($status);
                @endphp
                @for ($i = 0; $i < $count; $i++)
                @php $statuss=$status[$i]; @endphp
                <tr>
                    <td>5 กรกฎาคม 2563 </td>
                    <td> <a href="{{ROUTE('salary.detail'),$i}}"> EX00{{$i}} </a> </td>
                    <td> member {{$i}}</td>
                    <td> รายเดือน </td>
                    <td>{{$i*1000}}</td>

                        @switch($statuss)

                        @case('ชำระเงินแล้ว')
                        <td>
                            <button class="btn btn-success">{{$statuss}}</button>
                        </td>
                        @break
                        @case('รอดำเนินการ')
                        <td>
                        <span>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$statuss}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#approve">
                                      ยกเลิก
                                    </a>

                                </div>
                              </div>

                            </span>
                        </td>
                        @break

                        @case('อนุมัติ')
                        <td>
                             <span>
                                <div class="dropdown show">
                                    <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$statuss}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#payment">
                                             ชำระเงิน
                                        </a>

                                    </div>
                                  </div>

                                </span>
                        </td>
                        @break

                        @endswitch

                    <td class="td-action">
                        <div class="d-flex align-items-center dropdown">
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-light btn-action ml-1" data-toggle="dropdown">
                                    <svg height="24" width="24" viewBox="0 0 24 24" aria-label="ตัวเลือกเพิ่มเติม" role="img">
                                        <path d="M12 9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3M3 9c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm18 0c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z"></path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu text-md-left">
                                    <ul>
                                        <li>
                                            <a href="" class="text-dark"  data-toggle="modal" data-target="#addsendemail">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                                  </svg>
                                                  <span> ส่งอีเมล์</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="text-dark">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                                    <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                    <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                </svg>
                                                <span> พิมพ์เอกสาร</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                @include('salary.model.addsendemail')
                                @include('salary.model.addbank')
                            </div>
                            <div class="col-sm-3">
                                <a href="" class="text-dark ml-2">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                      </svg>
                                </a>
                            </div>
                        </div>

                    </td>
                    </tr>
                    @endfor
            </tbody>
            @include('salary.model.payment')
        </table>
        <div class="card-footer d-flex justify-content-end">
            {{-- <?php echo $users->render(); ?> --}}
        </div>
    </div>

</div>
</div>
    @endsection
