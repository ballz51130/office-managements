@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- header --}}
    <div class="d-flex justify-content-between mt-5">
        <h1>รายชื่อผู้สมัคร</h1>

        <div class="d-flex">
            {{-- search --}}
            <form action="" class="d-flex">
                <input type="text" name="search" class="form-control" value="{{ request()->search ?? '' }}">

                <div class="ml-1">
                    <button class="btn btn-outline-primary text-nowrap">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <span class="ml-1">ค้นหา</span>
                    </button>
                </div>
            </form>

          
        </div>
        
    </div>
    {{-- end: header --}}


    {{-- content --}}
    <div class="">
        <div class="d-flex justify-content-start mb-3">
            <form action="{{ Route('jobslist') }}" class="d-flex">
              <select class="form-control" name="position" id="position">
                    <option value="{{ request()->position ?: '' }}">ตำแหน่งงาน</option>
                    @foreach( $position AS $data )
                      @php
                        $sel = '';
                      @endphp
                      @if( !empty($_GET['position']) )
                          @if( $_GET['position'] == $data->name)
                            @php
                                $sel = 'selected="1"';
                            @endphp
                        @endif
                      @endif
                    <option {{ $sel }} value="{{ $data->name ?: '' }}">{{ $data->name }}</option>
                    @endforeach
                    </select>
                <div class="ml-1">
                    <button class="btn btn-outline-primary text-nowrap">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <span class="ml-1">ค้นหา</span>
                    </button>
                </div>
                <a href="/jobslists" class="btn btn-outline-primary text-nowrap ml-1">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
            </form>
           </div>
        <div class="card">
         
            <table class="card-table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="td-name">ชื่อ</th>
                        <th>อีเมล</th>
                        <th >เอกสาร</th>
                        <th >ตำแหน่งงาน</th>
                        <th class="text-center">สถานะ</th>
                        <th></th>
                 
                    </tr>
                </thead>

                <tbody>
                   @foreach ($registrations as $i => $registration)
                    <tr>
                        <td>{{(($registrations->currentPage() - 1 ) * $registrations->perPage() ) + $i + 1}}</td>
                            <td> <a href="{{Route('jobslist.edit',$registration)}}">{{$registration->name}} </a> </td>
                            <td> <a href=""> {{$registration->email}} </a></td>
                            <td class=""><i class="fa fa-file-photo-o" style="font-size:48px;color:red"></i></td>
                            <td class="">{{$registration->position}}</td>
                            <td class="text-center">  
                                @switch($registration->status)
                                @case('รอตรวจสอบ')
                                    <h5> <span class="badge badge-secondary ">รอตรวจสอบ</span></h5>
                                    @break
                                    @case('รอสัมภาษณ์งาน')
                                   <h5> <span class="badge badge-info  ">รอสัมภาษณ์งานตรั้งที่ {{$registration->status_rols}}</span></h5>
                                    @break
                                    @case('ผ่านสัมภาษณ์งาน')
                                    <h5><span class="badge badge-success ">ผ่านสัมภาษณ์งาน</span></h5>
                                    @break
                                    @case('ไม่ผ่านสัมภาษณ์งาน')
                                    <h5><span class="badge badge-danger">ไม่ผ่านสัมภาษณ์งาน</span></h5>
                                    @break
                                    @case('ไม่ผ่านการสมัครงาน')
                                    <h5><span class="badge badge-danger ">ไม่ผ่านการสมัครงาน</span></h5>
                                    @break
                                    @case('ไม่ผ่านการตรวจเอกสาร')
                                    <h5><span class="badge badge-warning ">ไม่ผ่านการตรวจเอกสารครั้งที่ {{$registration->status_rols}}</span></h5>
                                    @break
                            @endswitch  
                            </td>
                                <td> <a href="{{Route('jobslist.edit',$registration)}}" class="btn btn-outline-primary">ตรวจสอบ</a></td>
                          
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>ผลลัพท์ทั้งหมด {{ number_format($registrations->total()) }} รายการ</div>
                    <div>{{ $registrations->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

 @include('sweetalert::alert')
 @endsection
