@extends('layouts.admin')

@section('content')

        <div class="page-header-container">
        <div class="page-header-wrapper container">

            <div class="d-flex justify-content-between mt-3">

                <div>
                    <div class="page-header-title" data-hook="page-header-title">
                        <h1>ประวัติการลางาน</h1>
                    </div>
                    {{-- <div class="page-header-subtitle"></div>
                    --}}
                </div>

                <div class="page-header-actionbar d-flex align-items-center">
                    <div class="filter-item">
                        <form method="GET" action="{{ Route('search') }}" class="form-inline">
                        <input type="text" class="form-control" placeholder="ค้นหา..." id="search" name="search" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
                        <button type="submit" class="btn btn-primary ml-1"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
    <div class="card-container container mb-5 mt-3">
        <div class="card">
            @include('leave.page.nav')

            <table class="table">
                <thead style="background-color: #0078D7" class="text-white">
                    <tr>
                        <th class="td-name">ชื่อ</th>
                        <th>วันทำรายการ</th>
                        <th>ประเภทการลา</th>
                        <th>จำนวนวันที่ลา</th>
                        <th>เอกสารการลา</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>

                <tbody>
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <td>Member {{$i}}</td>
                        <td>5 กรกฎาคม 2563 </td>
                        <td> ลาป่วย </td>
                        <td> {{$i}}</td>
                        <td><a href="{{ROUTE('leave.detail',$i)}}" class="btn btn-outline-info">เอกสาร</a></td>
                    <td><a href="{{ROUTE('leave.detail',$i)}}" class="btn btn-outline-info">รายละเอียด</a></td>
                        <td>รออนุมัติ</td>

                    </tr>
                @endfor
                </tbody>
                
            </table>

            <div class="card-footer d-flex justify-content-end">
                {{-- <?php echo $users->render(); ?> --}}
            </div>
        </div>

 @include('sweetalert::alert')
 @endsection
