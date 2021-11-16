@extends('layouts.leave')

@section('content')
<center>
    <div class="container pt-5">
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-sm-7">
                <div class="card" >

                    <center><img class="mt-4" src="{{ asset('images/header.png') }}" style="height: 40px;width:auto"></center>

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <h2>ข้อมูลการลางาน</h2>
                                <a href="{{ROUTE('leaves.detail')}}" class="btn btn btn-sm col-md-4 mt-2" style="padding: 30px 30px; font-size:1.2rem; background-color:#FFF380;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-folder mb-2" viewBox="0 0 16 16">
                                        <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                                      </svg></br>
                                    ประวัติการลางาน </a>
                            </div>

                            <div class="col-md-12 mt-5">
                                <h2>แจ้งข้อมูลการลางาน</h2>
                                <a href="{{ROUTE('leaves.create')}}" class="btn btn btn-sm col-md-4 mt-2" style="padding: 30px 30px; font-size:1.2rem; background-color:#65F199;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-badge mb-2" viewBox="0 0 16 16">
                                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                      </svg></br>
                                    เพิ่มการลางาน </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</center>
@include('sweetalert::alert')

@endsection
