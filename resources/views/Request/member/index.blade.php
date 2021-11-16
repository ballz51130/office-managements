@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <form action="" method="post">
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="page-header-title" data-hook="page-header-title">
                        <h4 style="color:#0078D7">ประวัติการส่งคำขอเอกสาร</h4>
                        <p>ประวัติการส่งคำขอเอกสาร > ทั้งหมด </p>
                    </div>
                </div>
           
                <div class="col-sm-9">
                    <div class="form-group row ">
                        <label for="" class="col-form-label"> &nbsp; Search </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="search" name="search"
                            placeholder="ค้นหา" value="">
                        </div>
                        <label for="" class="col-form-label">สถานะเอกสาร :</label>
                        <div class="col-sm-2">
                            <select class="form-control " name="type" id="type">
                                <option value="" hidden>ทั้งหมด</option>
                                <option value="">-ทั้งหมด-</option>
                            </select>
                        </div>
                        <label for="" class="col-form-label">ช่วงเวลา : </label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="" id="">
                            
                        </div>
                         <div class="col-sm-2">
                            <button type="submit" class="btn btn-outline-primary "><i
                                class="fa fa-search"></i></button>
                        </div>
                      </div>
                      
                
                </div>

            </form>
            
            <a href="{{ROUTE('request.create')}}" class="btn btn-outline-primary" style="position: absolute; margin-top:0px;margin-left:1000px"><i class="fa fa-plus"></i>
                สร้างรายการ</a>
        </div>

    </div>
    
</div>

<div class="card-container container mb-5 mt-3">
    <div class="card">
      

        <table class="table">
            <thead style="background-color: #0078D7" class="text-white text-center">
                <tr>
                    <th>วันที่</th>
                    <th>เลขคำขอ</th>
                    <th>หมวดหมู่</th>
                    <th>สถานะ</th>
                    <th></th>

                </tr>
            </thead>
            <tbody class="text-center">
                @php
                $status = ['รอดำเนินการ','รับการอนุมัติ','ไม่รับการอนุมัติ'];
                $count = count($status);
                @endphp

                @for ($i = 0; $i < $count; $i++) @php $statuss=$status[$i]; @endphp <tr>
                    <td>5 กรกฎาคม 2563 </td>
                    <td><a href="{{ROUTE('request.show',$i)}}"> A0{{$i}} </a> </td>
                    <td> คำขอหนังสือรับรองการทำงาน </td>
                    @switch($statuss)
                    @case('รอดำเนินการ')
                    <td>
                        <button type="button" class="btn btn-light btn-action"
                            data-toggle="dropdown">{{$statuss}}</button>
                        <div class="dropdown-menu text-md-left">
                            <ul>
                                <li>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#cancel">
                                        ยกเลิก
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @include('Request.model.cancel')

                    </td>
                    @break

                    @case('รับการอนุมัติ')
                    <td>
                        <span class=" bg-success text-white p-1">{{$statuss}}</span>
                    </td>
                    @break

                    @case('ไม่รับการอนุมัติ')
                    <td>
                        <span class=" bg-danger text-white p-1">{{$statuss}}</span>
                    </td>
                    @break

                    @endswitch

                    <td class="td-action">
                        <a href="" class="btn btn-light ml-1">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
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
