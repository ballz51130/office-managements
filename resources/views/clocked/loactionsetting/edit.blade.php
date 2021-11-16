@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">
            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>แก้ไข QR Clocking Zone</h1>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="card-container container mb-5 mt-4">
        <form action="" method="post">
        <div class="card col-sm-9">
            <div class="form-group">
                <label for="name">ชื่อโซน</label>
                <input type="text" class="form-control" id="name" name="">
              </div>
              <div class="form-group">
                <span>ตำแหน่งที่ตั้งบน Google Mab (คริก2ครั้งเพื่อระบุตำแหน่ง)</span>
                <img src="" alt=""  width="500px" height="500px" rcset="">
              </div>
              <div class="form-group">
                  <a href="" class="btn btn-outline-primary"><i class="material-icons">add_location</i>ใช้จำแหน่งปัจจุปัน</a>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="La">ละติจูด</label>
                  <input type="email" class="form-control" id="La" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">ลองติจูด</label>
                  <input type="password" class="form-control" id="" readonly>
                </div>
              </div>
              <div class="m-2" align="center">
                
                    <a href="" class="btn btn-outline-primary">ยกเลิกการแก้ไข</a>
                    <button type="submit" class="btn btn-primary">
                       
                        บันทึกการแก้ไขสถานที่
                    </button>
                
              </div>
            </form>
        </div>

    </div>

     

@include('sweetalert::alert')
@endsection
