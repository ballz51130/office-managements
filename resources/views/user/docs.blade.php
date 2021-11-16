@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- header --}}
    <div class="mt-5 mb-4">
        <div class="media">
            <div class="avatar mr-4">
                @if(!empty($user->image))
                <img src="{{asset('storage/'.$user->image)}}">
                @else
                @endif
            </div>
            <div class="media-body ml-2">
                <h1>{{ $user->name }}</h1>
                <div><h4 class="ml-2">{{ $user->department->name ?? '-' }}</h4></div>
                
                    <div class="col-9 mt-3">
                        <div class="row">
                        <div class="col-6"><h5>วัน/เดือน/ปีเกิด</h5></div>
                        <div class="col-6"><h5>{{ date('j/M/Y', strtotime($user->brithday)) }}</h5></div>
                        <div class="col-6 mt-3"><h5>หมายเลขติดต่อ</h5></div>
                        <div class="col-6 mt-3"><h5>{{ $user->phone ?? '-' }}</h5></div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    {{-- end: heaer --}}


    <ul class="nav nav-tabs nav-profile mb-4">
        <li class="nav-item">
            <a class="nav-link" href="/users/{{ $user->id }}">ข้อมูลพื้นฐาน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users/{{ $user->id }}/account">ตั้งค่าบัญชีผู้ใช้</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users/{{ $user->id }}/password">ตั้งค่ารหัสผ่าน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users/{{ $user->id }}/jobs">ข้อมูลการจ้างงาน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/users/{{ $user->id }}/docs">ไฟล์เอกสาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users/{{ $user->id }}/leave">การลา</a>
        </li>
    </ul>



        <div class="card">

            <div class="card-body">
                <table class="card-table mb-2 mt-1">
                    <tbody>
                        {{-- บัตรประจำตัวประชาชน --}}
                        <tr>
                            <td>
                                @if(!empty($user->identification_card))
                                <div class="d-flex mr-5">
                                    <div class="d-flex">
                                        <i class="fa fa-address-card fa-2x text-primary" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex  ml-1">
                                        <span>บัตรประจำตัวประชาชน</span>
                                    </div>
                                </div>
                            <td>
                                <div class="d-flex">
                                    {{-- download --}}
                                    <div class="download mr-1">
                                        <form action="{{route('getfile', $user)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="download" value="identification_card">
                                            <button type="submit"  class="btn btn-light"><i class="fa fa-download  text-dark mr-1"aria-hidden="true"></i>Download</button>
                                        </form>
                                   
                                           
                                    </div>
                                    {{-- preview --}}
                                    <div class="link mr-1">
                                        <a href="{{asset('storage/'.$user->identification_card)}}" class="btn btn-light"
                                            target="_blank" rel="noopener noreferrer"><i class="fa fa-eye text-dark"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    {{-- edit --}}
                                    <div class="edit mr-1">
                                        <button class="btn btn-light text-center " type="button" data-toggle="modal"
                                        data-target="#identification_card"><i class="fa fa-pencil text-dark"
                                        aria-hidden="true"></i></button>
                                       
                                    </div>
                                    {{-- delete --}}
                                    <div class="delete mr-1">
                                        <button type="button" class="btn btn-danger ml-1"
                                        onclick="delidentification_card({{$user->id}}, '/users/identification_card/{{$user->id}}')"><i
                                            class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                                    </div>
                                </div>

                            </td>
                            @else
                            <div class="d-flex">
                                <div class="d-flex">
                                    <span class="mt-2"> บัตรประจำตัวประชาชน</span>
                                </div>
                                <div class="d-flex ml-2 ">
                                    <button class="btn btn-primary text-center " type="button" data-toggle="modal"
                                        data-target="#identification_card"><i class="fa fa-plus text-center mr-1"
                                            aria-hidden="true"></i>เพิ่ม</button>
                                </div>
                            </div>
                            @endif
                            </td>
                        </tr>
                        {{-- End บัตรประจำตัวประชาชน --}}
                        {{-- สำเนาทะเบียนบ้าน --}}
                        <tr>
                            <td>
                                @if(!empty($user->house_registration))
                                <div class="d-flex mr-5">
                                    <div class="d-flex">
                                        <i class="fa fa-address-card fa-2x text-primary" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex  ml-1">
                                        <span>สำเนาทะเบียนบ้าน</span>
                                    </div>
                                </div>
                            <td>
                                <div class="d-flex">
                                    <div class="download mr-1">
                                        <form action="{{route('getfile', $user)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="download" value="house_registration">
                                            <button type="submit"  class="btn btn-light"><i class="fa fa-download  text-dark mr-1"aria-hidden="true"></i>Download</button>
                                        </form>
                                    </div>
                                    <div class="link mr-1">
                                        <a href="{{asset('storage/'.$user->house_registration)}}" class="btn btn-light"
                                            target="_blank" rel="noopener noreferrer"><i class="fa fa-eye text-dark"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="edit mr-1">
                                        <button class="btn btn-light text-center " type="button" data-toggle="modal"
                                        data-target="#house_registration"><i class="fa fa-pencil text-dark"
                                        aria-hidden="true"></i></button>
                                    </div>
                                    <div class="delete mr-1">
                                        <button type="button" class="btn btn-danger ml-1"
                                        onclick="delhouse_registration({{$user->id}}, '/users/house_registration/{{$user->id}}')"><i
                                            class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                                    </div>
                                </div>

                            </td>
                            @else
                            <div class="d-flex">
                                <div class="d-flex">
                                    <span class="mt-2"> สำเนาทะเบียนบ้าน</span>
                                </div>
                                <div class="d-flex ml-2 ">
                                    <button class="btn btn-primary text-center" style="margin-left: 23px;" type="button" data-toggle="modal"
                                        data-target="#house_registration"><i class="fa fa-plus text-center mr-1"
                                            aria-hidden="true"></i>เพิ่ม</button>
                                </div>

                            </div>
                            @endif
                            </td>
                        </tr>
                        {{-- End  สำเนาทะเบียนบ้าน --}}
                        {{-- เอกสารอื่นๆ --}}
                        <tr>
                            <td>
                                @if(!empty($user->etc))
                                <div class="d-flex mr-5">
                                    <div class="d-flex">
                                        <i class="fa fa-address-card fa-2x text-primary" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex  ml-1">
                                        <span>เอกสารอื่นๆ</span>
                                    </div>
                                </div>
                            <td>
                                <div class="d-flex">
                                    <div class="download mr-1">
                                        <form action="{{route('getfile', $user)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="download" value="etc">
                                            <button type="submit"  class="btn btn-light"><i class="fa fa-download  text-dark mr-1"aria-hidden="true"></i>Download</button>
                                        </form>
                                    </div>
                                    <div class="link mr-1">
                                        <a href="{{asset('storage/'.$user->etc)}}" class="btn btn-light"
                                            target="_blank" rel="noopener noreferrer"><i class="fa fa-eye text-dark"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="edit mr-1">
                                        <button class="btn btn-light text-center " type="button" data-toggle="modal"
                                        data-target="#etc"><i class="fa fa-pencil text-dark"
                                        aria-hidden="true"></i></button>
                                    </div>
                                    <div class="delete mr-1">
                                        <button type="button" class="btn btn-danger ml-1"
                                        onclick="deletc({{$user->id}}, '/users/etc/{{$user->id}}')"><i
                                            class="fa fa-trash"></i><span class="ml-1">ลบ</span></button>
                                    </div>
                                </div>

                            </td>
                            @else
                            <div class="d-flex">
                                <div class="d-flex">
                                    <span class="mt-2"> เอกสารอื่นๆ</span>
                                </div>
                                <div class="d-flex ml-2">
                                    <button class="btn btn-primary text-center" style="margin-left: 63px;" type="button" data-toggle="modal"
                                        data-target="#etc"><i class="fa fa-plus text-center mr-1"
                                            aria-hidden="true"></i>เพิ่ม</button>
                                </div>

                            </div>
                            @endif
                            </td>
                        </tr>
                        {{-- End เอกสารอื่นๆ --}}
                    </tbody>

                </table>
        

            </div>
            @include('user.form.editdoc') {{-- form model edit doc --}}

        </div>
</div>
@include('sweetalert::alert')
@endsection
@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.css">
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.js'></script>

<script>
     function delidentification_card( id, url ) {
    Swal.fire({
        title: '',
        text: "ต้องการลบบัตรประจำตัวประชาชน ?",
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
                  
                    Swal.fire( 'ทำการลบเรียบร้อย!', res, 'success' );
                    setTimeout(function () { // 
                                    location.reload(); 
                                }, 1500);
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
function delhouse_registration( id, url ) {
    Swal.fire({
        title: '',
        text: "ต้องการลบสำเนาทะเบียนบ้าน ?",
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
                  
                    Swal.fire( 'ทำการลบเรียบร้อย!', res, 'success' );
                    setTimeout(function () { // 
                                    location.reload(); 
                                }, 1500);
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
function deletc( id, url ) {
    Swal.fire({
        title: '',
        text: "ต้องการลบเอกสารอื่นๆ ?",
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
                  
                    Swal.fire( 'ทำการลบเรียบร้อย!', res, 'success' );
                    setTimeout(function () { // 
                                    location.reload(); 
                                }, 1500);
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