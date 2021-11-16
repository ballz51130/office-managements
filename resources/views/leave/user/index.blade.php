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
                    <a href="{{Route('leave.create')}}" class="btn btn-outline-primary ml-2">แจ้งข้อมูลการลางาน</a>
                </div>
         
            </div>
        </div>
    </div>

    <div class="card-container container mb-5 mt-3">
        <div class="card">
            @include('leave.page.usernav')

            <table class="table">
                <thead style="background-color: #0078D7" class="text-white text-center">
                    <tr>
                        <th class="td-name">ชื่อ</th>
                        <th>วันทำรายการ</th>
                        <th>ประเภทการลา</th>
                        <th >จำนวนวันที่ลา</th>
                        <th>รายละเอียด</th>
                        <th >สถานะ</th>
                       
                    </tr>
                </thead>

                <tbody  class="text-center">
                    @foreach ($data as $value)
                    <tr>
                    <td>{{auth::user()->name}}</td>
                    <td>{{$value->date}}</td>
                    <td>{{$value->topic}}</td>
                    <td>{{$value->days}}</td>

                    @switch($value->status)
                    @case('ไม่ผ่านการอนุมัติ')
                        <td> 
                            {{$value->reason}}
                        </td>
                        @break
                        @default
                       <td>
                        <form action="{{Route('leave.user.edit', ['id' => $value->id]) }}" method="post" >
                            @csrf
                                <button type="submit" class="btn btn-outline-info">รายละเอียด</button>
                        </form>
                    </td>
                    @endswitch

                    @switch($value->status)

                    @case('ผ่านการอนุมัติ')
                    <td >
                        <span class="bg-success p-2">{{$value->status}}</span>
                    </td>
                    @break
                    
                    @case('ไม่ผ่านการอนุมัติ')
                    <td >
                        <span class=" bg-danger p-2">{{$value->status}}</span>
                    </td>
                    @break
                    @case('รออนุมัติ')
                    <td >
                    <span>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$value->status}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="" class="btn btn-danger ml-1" data-toggle="modal" data-target="#cancel">
                                  ยกเลิกคำขอ
                                </a>
                        
                            </div>
                          </div>
                         @include('leave.user.model.cancel')
                        </span>
                    </td>
                    @break
                    @case('ยกเลิกคำขอ')
                    <td >
                            <span class=" bg-warning p-2">{{$value->status}} </span>   
                    </td>
                   
                    @break
                    @endswitch
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
            <div class="card-footer d-flex justify-content-end">
                <?php echo $data->render(); ?>
            </div>
        </div>
    </div>

 @include('sweetalert::alert')
 @endsection
