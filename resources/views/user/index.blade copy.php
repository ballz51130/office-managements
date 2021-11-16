@extends('layouts.admin')

@section('content')

        <div class="page-header-container">
        <div class="page-header-wrapper container">

            <div class="d-flex justify-content-between">
                <div>
                    <div class="page-header-title mt-4" data-hook="page-header-title">
                        <h1>รายชื่อพนักงาน</h1>
                    </div>
                    {{-- <div class="page-header-subtitle"></div>
                    --}}
                </div>

                <div class="page-header-actionbar d-flex align-items-center">
                    <a href="/position" class="btn btn-light d-flex align-items-center"><svg viewBox="0 0 24 24"
                            width="24" height="24">
                            <path
                                d="M12,13.5 C11.172,13.5 10.5,12.828 10.5,12 C10.5,11.172 11.172,10.5 12,10.5 C12.828,10.5 13.5,11.172 13.5,12 C13.5,12.828 12.828,13.5 12,13.5 L12,13.5 Z M11.975,9.577 C10.627,9.577 9.536,10.667 9.536,12.012 C9.536,13.358 10.627,14.448 11.975,14.448 C13.32,14.448 14.411,13.358 14.411,12.012 C14.411,10.667 13.32,9.577 11.975,9.577 L11.975,9.577 Z M17.467,12.987 C17.12,13.056 16.835,13.304 16.719,13.639 C16.654,13.823 16.58,14.002 16.495,14.176 C16.341,14.495 16.366,14.872 16.562,15.167 L17.431,16.469 L16.469,17.431 L15.167,16.563 C15,16.452 14.807,16.395 14.612,16.395 C14.464,16.395 14.315,16.428 14.177,16.495 C14.004,16.579 13.824,16.654 13.64,16.719 C13.305,16.835 13.057,17.12 12.987,17.467 L12.68,19 L11.32,19 L11.014,17.467 C10.944,17.12 10.696,16.835 10.361,16.719 C10.177,16.654 9.997,16.58 9.824,16.495 C9.686,16.428 9.537,16.395 9.388,16.395 C9.193,16.395 9,16.452 8.833,16.563 L7.531,17.431 L6.569,16.469 L7.438,15.167 C7.633,14.872 7.659,14.496 7.505,14.177 C7.422,14.003 7.346,13.824 7.281,13.639 C7.165,13.305 6.881,13.057 6.533,12.987 L5.001,12.68 L5,11.32 L6.533,11.013 C6.881,10.944 7.165,10.696 7.281,10.361 C7.346,10.177 7.421,9.998 7.505,9.824 C7.66,9.505 7.634,9.128 7.438,8.833 L6.569,7.531 L7.531,6.569 L8.833,7.437 C9,7.548 9.193,7.605 9.388,7.605 C9.536,7.605 9.686,7.572 9.823,7.505 C9.996,7.421 10.176,7.346 10.361,7.281 C10.695,7.165 10.943,6.88 11.013,6.533 L11.32,5 L12.68,5 L12.987,6.533 C13.057,6.88 13.305,7.165 13.639,7.281 C13.823,7.346 14.003,7.42 14.176,7.505 C14.314,7.572 14.464,7.605 14.612,7.605 C14.807,7.605 15,7.548 15.167,7.437 L16.469,6.569 L17.431,7.531 L16.562,8.833 C16.367,9.128 16.341,9.504 16.495,9.823 C16.579,9.997 16.654,10.176 16.719,10.361 C16.835,10.695 17.12,10.943 17.467,11.013 L19,11.32 L19,12.68 L17.467,12.987 Z M19.196,10.339 L17.663,10.032 C17.586,9.811 17.496,9.596 17.396,9.388 L18.263,8.086 C18.527,7.689 18.475,7.161 18.138,6.824 L17.176,5.862 C16.982,5.669 16.727,5.569 16.469,5.569 C16.276,5.569 16.083,5.625 15.914,5.737 L14.612,6.605 C14.404,6.504 14.189,6.414 13.968,6.337 L13.661,4.804 C13.567,4.336 13.156,4 12.68,4 L11.32,4 C10.844,4 10.433,4.336 10.339,4.804 L10.032,6.337 C9.811,6.414 9.596,6.504 9.388,6.605 L8.086,5.737 C7.917,5.625 7.724,5.569 7.532,5.569 C7.273,5.569 7.018,5.669 6.824,5.862 L5.862,6.824 C5.525,7.161 5.473,7.689 5.737,8.086 L6.605,9.388 C6.504,9.596 6.414,9.811 6.337,10.033 L4.805,10.339 C4.337,10.433 4,10.843 4,11.32 L4,12.68 C4,13.157 4.337,13.567 4.805,13.661 L6.337,13.968 C6.414,14.189 6.504,14.404 6.605,14.612 L5.737,15.914 C5.473,16.311 5.525,16.839 5.862,17.176 L6.824,18.138 C7.018,18.331 7.273,18.431 7.532,18.431 C7.724,18.431 7.917,18.375 8.086,18.263 L9.388,17.395 C9.597,17.496 9.812,17.586 10.033,17.663 L10.339,19.196 C10.433,19.664 10.844,20 11.32,20 L12.68,20 C13.156,20 13.567,19.664 13.661,19.196 L13.968,17.663 C14.189,17.586 14.404,17.496 14.612,17.395 L15.914,18.263 C16.084,18.375 16.276,18.431 16.469,18.431 C16.727,18.431 16.982,18.331 17.176,18.138 L18.138,17.176 C18.475,16.839 18.527,16.311 18.263,15.914 L17.396,14.612 C17.496,14.404 17.586,14.189 17.663,13.967 L19.196,13.661 C19.664,13.567 20,13.157 20,12.68 L20,11.32 C20,10.843 19.664,10.433 19.196,10.339 L19.196,10.339 Z">
                            </path>
                        </svg><span class="ml-1">ประเภทสมาชิก</span></a>

                    <a href="{{ Route('user.create') }}" class="btn btn-primary ml-2"><i class="fa fa-plus"></i> เพิ่มสมาชิกใหม่</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-container container mb-5 mt-3">
        <div class="card">
            @component('components.tabs', ['items'=>member_status_tabs()]) @endcomponent
            <div class="card-header">
                <div class="filter-container">
                    <div class=" d-flex justify-content-between">
                        <div class="filter">
                            <div class="filter-item">
                                <form method="GET" action="{{ Route('user') }}" class="form-inline">
                                <input type="text" class="form-control mr-1" placeholder="ค้นหา..." id="search" name="search" value="{{ request()->search ?? '' }}">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <table class="table">
                <thead style="background-color: #0078D7" class="text-white text-center">
                    <tr>
                        <th class="td-name" width="30%">ชื่อ</th>
                        <th>อีเมล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th width="30%">ตำแหน่งงาน</th>
                        <th width="40%">การใช้งาน</th>
                        <th class="td-status text-center">สถานะ</th>
                        <th class="td-action"></th>
                        <th></th>

                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr>
                            <td class="td-name">
                                <div class="media media-user">
                                    <div class="avatar">
                                        @if(!empty($user->image))
                                        <img src="{{asset('storage/'.$user->image)}}" style="width:60px; height:auto; border-radius:50%">
                                        @else
                                        <img src="{{asset('storage/photos/no-photo.png')}}" style="width:60px; height:auto; border-radius:50%">
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0 fs-16"><a
                                                href="{{ asset("/user/{$user->id}") }}">{{ $user->name }}</a></h5>
                                        {{-- <div class="mt-1 text-muted fs-13">{{$user->position_name}}</div> --}}
                                    </div>
                                </div>
                                </div>
                            </td>

                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->position_name}}</td>
                        <td>
                            <div class="custom-control custom-switch">
                            <input data-id="{{$user->id}}" type="checkbox" class="toggle-class custom-control-input" id="customSwitch1{{$user->id}}" {{ $user->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customSwitch1{{$user->id}}"></label>
                              </div>
                         </td>
                            <td width="text-center">
                                @switch($user->status)
                                @case(1)
                                <span class="badge badge-success ">เปิดใช้งาน</span>
                                    @break
                                @default
                                <span class="badge badge-danger">ปิดใช้งาน</span>
                            @endswitch
                               </td>

                            <td class="td-date">
                                <div class="text-nowrap">
                                    <div class="d-block">{{ date('j/m/Y', strtotime($user->updated_at)) }}</div>
                                    <div class="d-block">{{ date('H:i', strtotime($user->updated_at)) }}</div>
                                </div>
                            </td>

                            <td class="td-action">
                                <div class="d-flex align-items-center dropdown">

                                    <button type="button" class="btn btn-light btn-action ml-1" data-toggle="dropdown"><svg
                                            height="24" width="24" viewBox="0 0 24 24" aria-label="ตัวเลือกเพิ่มเติม"
                                            role="img">
                                            <path
                                                d="M12 9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3M3 9c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm18 0c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z">
                                            </path>
                                        </svg></button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{ route('user.edit', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-link dropdown-item" >
                                                แก้ไข
                                            </button>
                                        </form>
                                    <form id="delete-user" action="{{ route('user.delete', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-link dropdown-item" onclick="confirmDelete('delete-user')">ลบ</button>
                                        </form>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="card-footer d-flex justify-content-end">
                <?php echo $users->render(); ?>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            var id = $(this).data('id');
            swal({
                title: "ต้องการลบใช้งานบัญชีผู้ใช้ ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#delete-user').submit();
                    } else {
                        swal({
                            title: "ยกเลิกการลบ",
                            icon: "success",
                            })
                    }
                });
        }
    </script>
   <script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var user_id = $(this).data('id');
            if(status == 0){
                swal(
              {
                title: "ต้องการระงับบัญชีผู้ใช้",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                location.reload();
              }
                });
                    } else {
                        swal({
                            title: "ยกเลิกการระงับบัญชีผู้ใช้",
                            icon: "success",
                            })
                    }
                });
             }
             if(status == 1){
                swal(
              {
                title: "ต้องการเปิดใช้งานบัญชีผู้ใช้",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
               location.reload();
              }
          });
                    } else {
                        swal({
                            title: "ยกเลิก",
                            icon: "success",
                            })

                    }
                });
            }
      })
    })
  </script>
 @include('sweetalert::alert')

 @endsection
