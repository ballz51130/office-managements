@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>รายการคำขอ</h1>
                    <h2 class="text-primary">A011</h2>

                </div>

            </div>
        </div>

    </div>
</div>

<div class="card-container container mb-5 mt-3">
    <div class="card p-3 col-6">
        <form action="" method="post">
        <div class="page-header-title m-3" data-hook="page-header-title">
            <div class="form-group">
                <label for="detail"><h3>รายระเอียด</h3></label>
                <textarea name="detail" id="detail"  class="form-control col-sm-10" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="type"><h3>ประเภทเอกสารคำขอ</h3></label>
                <select id="type" name="type" class="form-control col-sm-5">
                  <option selected>กรุณาเลือกหมวดหมู่</option>
                  <option value="เอกสารรับรองเงินเดือน">เอกสารรับรองเงินเดือน</option>
                  <option value="เอกสารรับรองการทำงาน">เอกสารรับรองการทำงาน</option>
                </select>
            </div>
        </div>
        <div class="footer m-5" align="center">
            <a href="" class="btn btn-secondary btn-lg mr-5">ยกเลิก</a>
            <button type="submit" class="btn btn-primary btn-lg ml-5">ส่งคำขอ</button>
        </div>
    </form>
        </div>
    </div>

@include('sweetalert::alert')
@endsection
