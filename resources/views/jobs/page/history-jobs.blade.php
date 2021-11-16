@extends('layouts.admin')

@section('content')

        <div class="page-header-container">
        <div class="page-header-wrapper container">

            <div class="d-flex justify-content-between">

                <div>
                    <div class="page-header-title" data-hook="page-header-title">
                        <h1>รายการรับสมัครงาน</h1>
                    </div>
                </div>

                <div class="page-header-actionbar d-flex align-items-center">
                    <a href="{{ Route('user.create') }}" class="btn btn-primary d-flex align-items-center ml-2"><svg
                            viewBox="0 0 24 24" width="24" height="24">
                            <path d="M12 12L12 6 11 6 11 12 5 12 5 13 11 13 11 19 12 19 12 13 18 13 18 12z"></path>
                        </svg><span class="ml-1">เพิ่มใบสมัคร</span></a>
                </div>
            </div>
        </div>
    </div>


    <div class="card-container container mb-5">
        <div class="card">

            <ul class="list-group list-group-horizontal-sm text-center">
                <a href=""class="list-group-item list-group-item-action">ทั้งหมด</a>
                <a href=""class="list-group-item list-group-item-action">เปิดรับสมัคร</a>
                <a href=""class="list-group-item list-group-item-action">ยังไม่ได้เปิดรับ</a>
                <a href=""class="list-group-item list-group-item-action">หมดอายุ</a>
              </ul>

            <div class="card-header">
                <div class="filter-container">
                    <div class="">

                    </div>
                    <div class=" d-flex justify-content-between">
                        <div class="filter">

                            <div class="filter-item">
                                <form method="GET" action="{{ Route('search') }}" class="form-inline">
                                <input type="text" class="form-control" placeholder="ค้นหา..." id="search" name="search" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <table class="card-table">
                <thead>

                </thead>

                <tbody>
                    @for ($i = 1; $i <= 5; $i++)
                        <tr>
                            <td class="td-name">
                                <div class="card ">
                                    <div class="row my-3  px-5 no-gutters">
                                      <div class="col-md-3" >
                                        <img src="https://miro.medium.com/max/620/1*Pb47wnmlN201inlk7FnT7A.jpeg" class="card-img" alt="..." height="250px" width="150px">
                                      </div>
                                <div class="card-body">
                                  <h5 class="card-title">Java Programer</h5>
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                  <p class="card-text"><i class="fas fa-briefcase"></i> 35,000/เดือน</p>
                                  <p class="card-text"><i class="fas fa-briefcase"></i> คนสมัคร 5 </p>
                                  <p class="card-text"><i class="fas fa-clock"></i> เริ่ม 1 กรกฎาคม 2563 12.00 น.</p>
                                  <p class="card-text"><i class="fas fa-clock"></i> สิ้นสุด 30 กรกฎาคม 2563 12.00 น.</p>
                                  <p class="card-text"><i class="fas fa-briefcase"></i> สถานะ </p>
                                  <a href="#" class="btn btn-outline-primary float-right ml-2">ลบ</a>
                                  <a href="#" class="btn btn-outline-primary float-right">แก้ไข</a>
                                </div>
                              </div>

                            </div>
                            </td>
                        </tr>
                        @endfor
                </tbody>

            </table>

            <div class="card-footer d-flex justify-content-end">

            </div>
        </div>
    </div>
 @include('sweetalert::alert')
 @endsection
