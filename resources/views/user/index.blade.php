@extends('layouts.admin')

@section('content')

    <div class="container">

        {{-- header --}}
        <div class="d-flex justify-content-between mt-5">
            <h1>รายชื่อพนักงาน</h1>

            <div class="d-flex">
                {{-- search --}}
                <form action="{{ Route('user') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" value="{{ request()->search ?? '' }}">

                    <div class="ml-1">
                        <button class="btn btn-outline-primary text-nowrap">
                            <i class="fa fa-search" aria-hidden="true"></i>

                        </button>
                    </div>
                </form>

                {{-- add --}}
                <div class="ml-3">
                    <a href="{{ Route('user.create') }}" class="btn btn-outline-primary">
                        <i class="fa fa-plus"></i>
                        <span class="ml-1">เพิ่มพนักงาน</span>
                    </a>
                </div>
            </div>
        </div>
        {{-- end: header --}}


        {{-- content --}}
        <div class="">

            <div class="card">
                
                <table class="card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ตำแหน่งงาน</th>
                            <th>สถานะ</th>
                            <th>เปิด/ปิด สถานะ</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $i => $user)
                        <tr item-id="{{ $user->id }}">
                            <td>{{(($users->currentPage() - 1 ) * $users->perPage() ) + $i + 1}}</td>
                            <td>
                                <a href="{{ Route('user.edit', $user) }}">{{$user->name}}</a>

                                <div>แผนกงาน : {{ $user->department->name ?? '-' }}</div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td> {{ $user->position->name ?? '-' }}</td>
                            <td width="text-center">
                                @switch($user->status)
                                @case(1)
                                <span class="badge badge-success ">เปิดใช้งาน</span>
                                    @break
                                @default
                                <span class="badge badge-danger">ปิดใช้งาน</span>
                            @endswitch
                               </td>
                               <td class="text-center">
                                   <div class="checkbox">
                                <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-size="sm" {{ $user->status ? 'checked' : '' }}>
                            </div> 
                            </td>
                            <td>
                                <div class="d-flex text-nowrap">
                                    <a href="{{ Route('user.edit', $user) }}" class="btn btn-light"><i class="fa fa-pencil"></i><span class="ml-1">แก้ไข</span></a>
                                    <button type="button" class="btn btn-danger ml-1" onclick="del({{$user->id}}, '/users/{{$user->id}}')"><i class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>ผลลัพท์ทั้งหมด {{ number_format($users->total()) }} รายการ</div>
                        <div>{{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end: content --}}
    </div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.css">
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.js'></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>

    function del( id, url ) {
        const $item = $('[item-id='+ id +']');

        Swal.fire({
            title: 'ต้องการลบบัญชีผู้ใช้',
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

    $(function(id) {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
        if($(this).prop('checked') == true)
        {
            var  msg = 'ต้องการเปิดการใช้งานบัญชีผู้ใช้';
            var butt = 'ยืนยันการเปิดการใช้';
            var color ='#3085d6';
            var alert = 'ทำการเปิดการใช้งานบัญชีผู้ใช้แล้ว'
        }
        else
        {
            var  msg = 'ต้องการระงับการใช้งานบัญชีผู้ใช้';
            var butt = 'ยืนยันการระงับ';
            var color ='#3085d6';
            var alert = 'ทำการระงับบัญชีแล้ว'
         
        }
        const $item = $('[item-id='+ user_id +']');
        Swal.fire({
            title: msg,
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#268CDD',
            cancelButtonText: 'ยกเลิก',
            cancelButtonColor: '#3085d6',
            confirmButtonText: butt
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'user_id': user_id},
                })
                .done( res => {
                    if(res.type == 'success'){
                        Swal.fire( alert , res, 'success' );
                        setTimeout(function () { // 
                                    location.reload(); 
                                }, 2500);
                    } else {
                        Swal.fire( 'Error!', res.message, 'error' );
                    }
                })
                .fail( msg => {
                    Swal.fire( 'Error!', 'ไม่สามารถทำการลบได้ !!!', 'error');
                });
            }
            else
            {
               
             location.reload();
                                
            }
        });

     
    })
  })
</script>
@endsection
