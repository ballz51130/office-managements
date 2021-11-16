@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <div class="form-group row">
                        <label for="staticEmail" style="color:#0078D7;" class="col-sm-5 col-form-label">
                            <h4>รายการคำขอ </h4>
                        </label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control" id="staticEmail" value="รอดำเนินการ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" style="color:#0078D7;" class="col-sm-3 col-form-label">
                            <h5>A011</h5>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="Luke Davids">
                        </div>
                    </div>
                </div>
                <div class="page-header-subtitle"></div>
            </div>

            <div class="page-header-actionbar d-flex align-items-center">

            </div>
        </div>

    </div>
</div>

<div class="card-container container mb-5 mt-3">
    <div class="card col-sm-8">
        <div class="form-group m-5">
            <label for="exampleFormControlInput1">รายระเอียด</label>
            <textarea name="" readonly class="col-sm-9 form-control-plaintext" id="" cols="30"
                rows="10"> ............... </textarea>
        </div>
        <div class="form-group m-5">
            <label for="exampleFormControlInput1">ประเภาเอกสารคำขอ</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="เอกสารรับรองเงินเดือน">
        </div>
        <div class="row mb-5 ml-3">
            <div class="col-sm-4">
                <button type="button" class="btn btn-outline-secondary">ยกเลิก</button>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-light btn-action" data-toggle="dropdown">จัดการคำขอ</button>

                <div class="dropdown-menu text-md-left">
                    <ul>
                        <li>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#approve">
                                อนุมัติคำขอ
                            </a>
                        </li>
                        <li>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#notapprove">
                                ไม่อนุมัติคำขอ
                            </a>
                        </li>
                    </ul>
                </div>
                @include('Request.model.approve')
                @include('Request.model.notapprove')
            </div>
        </div>



    </div>
    @endsection
