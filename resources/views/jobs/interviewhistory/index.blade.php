@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- header --}}
    <div class="d-flex justify-content-between mt-5">
        <h1>ประวัติการสัมภาษณ์</h1>

        <div class="d-flex">
            {{-- search --}}
            <form action="{{Route('Interviewhistory')}}" class="d-flex">
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
        <div class="card">
         
            <table class="card-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="td-name">ชื่อ</th>
                        <th>อีเมล</th>
                        <th >เอกสาร</th>
                        <th >ตำแหน่งงาน</th>
                        <th></th>
                 
                    </tr>
                </thead>

                <tbody>
                   @foreach ($interviewhistorys as $i => $interviewhistory)
                    <tr>
                        <td>{{(($interviewhistorys->currentPage() - 1 ) * $interviewhistorys->perPage() ) + $i + 1}}</td>
                            <td> <a href=""> {{$interviewhistory->registrations->name}} </a></td>
                            <td class="">{{$interviewhistory->registrations->email}}</td>
                            <td class=""><i class="fa fa-file-photo-o" style="font-size:48px;color:red"></i></td>
                            <td class="">{{$interviewhistory->registrations->position}}</td>
                            <td> <a href="{{Route('Interviewhistory.detail',$interviewhistory)}}" class="btn btn-outline-primary">รายละเอียด</a></td>
                          
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>ผลลัพท์ทั้งหมด {{ number_format($interviewhistorys->total()) }} รายการ</div>
                    <div>{{ $interviewhistorys->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

 @include('sweetalert::alert')
 @endsection
