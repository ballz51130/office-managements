@extends('layouts.admin')

@section('content')
<div class="container">

    {{-- header --}}
    <div class="d-flex justify-content-between mt-5">
        <h1>แผนกงาน</h1>

        <div class="d-flex">
           

            {{-- add --}}
            <div class="ml-3">
                <a href="{{ Route('department.create') }}" class="btn btn-outline-primary">
                    <i class="fa fa-plus"></i>
                    <span class="ml-1">เพิ่มแผนกงาน</span>
                </a>
            </div>
        </div>
    </div>
    {{-- end: header --}}


    {{-- content --}}
    <div class="">
<div class="card">
    <table class="card-table text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>แผนกงาน</th>
                <th>การจัดการ</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($departments as $i => $department)
            <tr item-id="{{ $department->id }}">
                <td>{{(($departments->currentPage() - 1 ) * $departments->perPage() ) + $i + 1}}</td>
               
                <td>{{$department->name}}</td>
                <td>
                    <div class="d-flex justify-content-center text-nowrap">
                        <a href="{{ Route('department.edit', $department) }}" class="btn btn-light"><i class="fa fa-pencil"></i><span class="ml-1">แก้ไข</span></a>
                        <button type="button" class="btn btn-danger ml-1" onclick="del({{$department->id}},'/users/departments/{{$department->id}}')"><i class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>ผลลัพท์ทั้งหมด {{ number_format($departments->total()) }} รายการ</div>
            <div>{{ $departments->links() }}</div>
        </div>
    </div>
</div>
</div>

@include('sweetalert::alert')
@endsection


@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.css">
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.js'></script>                                                              
<script>

function del( id, url ) {
        const $item = $('[item-id='+ id +']');

        Swal.fire({
            title: 'ต้องการลบแผนกงานนี้ ?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ยืนยันการลบ'
        })
        .then((result) => {
            if (result.value) {

                $.ajax({
                    method: "POST",
                    url: url,
                    dataType: "json",
                    data: {
                        '_method': 'DELETE',
                        '_token': $('meta[name=csrf-token]').attr('content'),
                    }
                })
                .done( res => {

                    if(res.type == 'success'){
                        $item.remove();

                        Swal.fire( 'ทำการลบเรียบร้อย!', res, 'success' );
                    } else {
                        Swal.fire( 'Error!', res.message, 'error' );
                    }
                })
                .fail( msg => {
                    Swal.fire( 'Error!', 'ไม่สามารถทำการลบได้ !!!', 'error');
                });
            }
        });
    }
</script>
@endsection



