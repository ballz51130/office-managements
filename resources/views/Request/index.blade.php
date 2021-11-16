@extends('layouts.admin')
@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h3 style="color:#0078D7">รายการคำขอ</h3>
                    <p>รายการคำขอ >  </p>
                </div>
              
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
                                        placeholder="ค้นหาพนักงาน จากชื่อ คำขอ เลจที่เอกสารผู้รับ" value="">
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
                                <a href="{{ROUTE('request.create')}}" class="btn btn-outline-primary float-right ml-1"><i class="fa fa-plus"></i>
                                            สร้างรายการ</a>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card-container container mb-5 mt-3">
    <div class="card">
        @include('Request.page.nav')

        <table class="table">
            <thead style="background-color: #0078D7" class="text-white">
                <tr>
                    <th>วันที่</th>
                    <th>เลขคำขอ</th>
                    <th>ชื่อผู้ขอ</th>
                    <th>หมวดหมู่</th>
                    <th>สถานะ</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @php
                $status = ['รอดำเนินการ','รับการอนุมัติ','ไม่รับการอนุมัติ'];
                $count = count($status);
                @endphp
                @for ($i = 0; $i < $count ; $i++)

                 @php $statuss=$status[$i]; @endphp
                <tr>
                    <td>5 กรกฎาคม 2563 </td>
                    <td><a href="{{ROUTE('request.checkrequset',$i)}}" class="text-dark">A0{{$i}}</a> </td>
                    <td> member {{$i}}</td>
                    <td>
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill bg-info rounded-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                      คำขอหนังสือรับรองการทำงาน </td>
                    @switch($statuss)
                    @case('รอดำเนินการ')
                    <td>
                        <span class=" bg-secondary text-white">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$statuss}}
                            </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <form action="" method="post">
                                      <input type="hidden" name="type" value="อนุมัติคำคอ">
                                      <button type="submit" class="btn btn-secondary">อนุมัติคำขอ</button>
                                  </form>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#notapprove">
                                        ไม่อนุมัติคำขอ
                                    </a>

                                </div>
                              </div>
                        </span>

                        @include('Request.model.notapprove')
                    </td>
                    @break

                    @case('รับการอนุมัติ')
                    <td>
                        <span class=" bg-secondary text-white">
                            <div class="dropdown show">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$statuss}}
                            </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#approve">
                                       ส่งเอกสารคำขอ
                                    </a>

                                </div>
                              </div>
                        </span>
                        @include('Request.model.approve')
                    </td>
                    @break

                    @case('ไม่รับการอนุมัติ')
                    <td>
                        <span class=" bg-danger text-white p-1">{{$statuss}}</span>
                    </td>
                    @break

                    @endswitch
                    <td class="td-action">
                        <div class="d-flex align-items-center dropdown">
                            <a class="btn btn-light ml-1" data-toggle="modal" data-target="#sendemail">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                </svg>
                                @include('Request.model.sendemail')
                            </a>
                            <a href="" class="btn btn-light ml-1">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                              </a>

                        </div>
                    </td>
                    </tr>
                    @endfor
            </tbody>

        </table>
        <div class="card-footer d-flex justify-content-end">
            {{-- <?php echo $users->render(); ?> --}}
        </div>
    </div>
    @endsection
