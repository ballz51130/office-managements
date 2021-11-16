@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1 class="ml-4">ตำแหน่งงาน</h1>
                </div>
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
                        เพิ่มตำแหน่งงาน
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card-container container mb-5 mt-3">
    <div class="card card-body sm-3">
        <div class="row my-3  px-5">
            <div class="col-md-12">
                <table class="table">
                    <thead style="background-color: #0078D7" class="text-white">
                        <tr>
                            <th class="">ชื่อตำแหน่งงาน</th>
                            <th class="">รายละเอียด</th>
                            <th> การจัดการ </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($position as $value)
                        <tr item-id="{{ $position->id }}">
                            <th class="" id="position_name">{{ $value->position_name }}</th>
                            <td class="" id="position_detail">{{ $value->position_detail }}</td>
                           
                            <td>
                                <div class="d-flex text-nowrap">
                                    <a href="{{ Route('position.edit', $position) }}" class="btn btn-light"><i class="fa fa-pencil"></i><span class="ml-1">แก้ไข</span></a>
                                    <button type="button" class="btn btn-danger ml-1" onclick="del({{$position->id}}, '/position/{{$position->id}}')"><i class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot class="table table-striped">
                    <ul class="pagination pagination-lg">
                        <li class="page-item">

                        <li>
                    </ul>
                </tfoot>

            </div>
            </div>
        </div>
    </div>
</div>


@include('sweetalert::alert')
@endsection
@section('scritp')
    
@endsection
