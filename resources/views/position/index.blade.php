@extends('layouts.admin')

@section('content')
<div class="container">

    {{-- header --}}
    <div class="d-flex justify-content-between mt-5">
        <h1>ตำแหน่งงาน</h1>

        <div class="d-flex">


            {{-- add --}}
            <div class="ml-3">
                <a href="{{ Route('position.create') }}" class="btn btn-outline-primary">
                    <i class="fa fa-plus"></i>
                    <span class="ml-1">เพิ่มตำแหน่งงาน</span>
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
                        <th>ตำแหน่งงาน</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($positions as $i => $position)
                    <tr item-id="{{ $position->id }}">
                        <td>{{(($positions->currentPage() - 1 ) * $positions->perPage() ) + $i + 1}}</td>

                        <td>{{$position->name}}</td>
                        <td>
                            <div class="d-flex justify-content-center text-nowrap">
                                <a href="{{ Route('position.edit', $position) }}" class="btn btn-light"><i
                                        class="fa fa-pencil"></i><span class="ml-1">แก้ไข</span></a>
                                <button type="button" class="btn btn-danger ml-1"
                                    onclick="del({{$position->id}}, '/users/positions/{{$position->id}}')"><i
                                        class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>ผลลัพท์ทั้งหมด {{ number_format($positions->total()) }} รายการ</div>
                    <div>{{ $positions->links() }}</div>
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
            title: 'ต้องการลบตำแหน่งงานนี้ ?',
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
                    Swal.fire( 'Error!', 'ไม่สามรถทำการลบได้ !!!', 'error');
                });
            }
        });
    }

    </script>
    @endsection
