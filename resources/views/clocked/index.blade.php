@extends('layouts.admin')

@section('content')

        <div class="page-header-container">
        <div class="page-header-wrapper container">

            <div class="d-flex justify-content-between mt-3">

                <div>
                    <div class="page-header-title" data-hook="page-header-title">
                        <h1>รายการเข้า-ออกงาน</h1>
                    </div>
                    {{-- <div class="page-header-subtitle"></div>
                    --}}
                </div>

                <div class="page-header-actionbar d-flex align-items-center">
                    <div class="filter-item p-3">
                        {{-- <form method="GET" action="{{ Route('search') }}" class="form-inline">
                        <input type="text" class="form-control" placeholder="ค้นหา..." id="search" name="search" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
                        <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
                        </form> --}}
                    </div>
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-2">
                  <label for="inputCity">วันที่</label>
                  <input type="date" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-1">
                    <label for="inputCity">.</label>
                  <button type="submit" class="form-control btn btn-primary"><i class="fa fa-search"></i></button>
                </div>

              </div>


    <div class="card-container container mb-5 mt-3 col-md-12">
        <div class="card">
            <table class="table">
                <thead style="background-color: #0078D7" class="text-white text-center">
                    <tr>
                        <th> </th>
                        <th class="td-name">ชื่อ</th>
                        <th>วันทำรายการ</th>
                        <th>เวลาเข้างาน</th>
                        <th>เวลาออกงาน</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>

                <tbody class="text-center  ">
                @for ($i = 0; $i <= 5 ; $i++)
                    <tr>
                        <td>
                            <div class="avatar">
                                @if(!empty($user->image))
                                <img src="{{asset('storage/'.$user->image)}}">
                                @else
                                <img src="{{asset('storage/photos/no-photo.png')}}">
                                @endif
                            </div>
                        </td>
                        <td class="p-3 mt-3">menber {{$i}} </td>
                        <td class="p-3 mt-3">5 กรกฎาคม 2563 </td>
                        <td class="p-3 mt-3"> 09.00.00 </td>
                        <td class="p-3 mt-3"> 16.00.00 </td>
                        <td class="badge badge-success p-2 mt-3" width="80px">ปกติ</td>

                    </tr>
                @endfor
                </tbody>

            </table>

            <div class="card-footer d-flex justify-content-end">
                {{-- <?php echo $users->render(); ?> --}}
            </div>
        </div>
    </div>
 @include('sweetalert::alert')
 @endsection
