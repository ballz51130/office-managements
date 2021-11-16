@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">
            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>รายการคำขอ 1 </h1>
                    <div class="form-group row">
                        <div class="col-sm-4"> <h3 class="text-info">A013 </h3></div>
                        <div class="col-sm-8 mt-2 "><span class=" btn-secondary text-dark p-1"> รอดำเนินการ</span></div>
                      </div>
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
                <textarea name="detail" id="detail"  class="form-control col-sm-10" cols="30" rows="10" readonly> .....</textarea>
            </div>
            <div class="form-group">
                <label for="type"><h3>ประเภทเอกสารคำขอ</h3></label>
                <input type="text" class="form-control col-sm-10"  value="เอการเงินเดือน" readonly>
            </div>
        </div>
        <div class="footer m-5" align="center">
        <a href="{{ROUTE('request.member')}}" class="btn btn-primary btn-lg mr-5">กลับหน้าหลัก</a>
     
        </div>
    </form>
        </div>
    </div>

@include('sweetalert::alert')
@endsection
