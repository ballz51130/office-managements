@extends('layouts.admin')
@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>ข้อมูลการลางาน</h1>
                </div>
                {{-- <div class="page-header-subtitle"></div>
                    --}}
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <form action="{{ Route('leave') }}" class="d-flex">
                        <input type="text" name="search" class="form-control" value="{{ request()->search ?? '' }}">
                        <div class="ml-1">
                            <button class="btn btn-outline-primary text-nowrap">
                                <i class="fa fa-search" aria-hidden="true"></i>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-md-6">
        <form action="{{ Route('leave') }}" >
            <div class="d-flex  justify-content-md-start">
                <div class="form-group ml-1">
                    <label for="date">วันที่ลา</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ request()->date ?: '' }}">
                </div>
                <div class="form-group ml-1">
                    <label for="department">แผนก</label>
                    <select class="form-control" name="department" id="department">
                        <option value="{{ request()->department ?: '' }}">แผนกงาน</option>
                        @foreach( $departments AS $data )
                        @php
                        $sel = '';
                        @endphp
                        @if( !empty($_GET['department']) )
                        @if( $_GET['department'] == $data->name)
                        @php
                        $sel = 'selected="1"';
                        @endphp
                        @endif
                        @endif
                        <option {{ $sel }} value="{{ $data->name ?: '' }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-1">
                    <label for="position">ตำแหน่ง</label>
                    <select class="form-control" name="position" id="position">
                        <option value="{{ request()->position ?: '' }}">ตำแหน่งงาน</option>
                        @foreach( $positions AS $data )
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
                </div>
                <div class="d-flex mt-4 p-2">
                    <button class="btn btn-outline-primary form-control text-nowrap"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                    <a href="/leaves" class="btn btn-outline-primary form-control text-nowrap ml-1"><i
                            class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="/leaves/export" >
            <div class="d-flex  justify-content-md-end">
                <div class="form-group ml-1">
                   <span class="">Export</span>
                </div>
                <div class="form-group ml-1">
                    <label for="month">เดือน</label>
                    <select class="form-control @error('month') is-invalid @enderror" name="month" id="month">
                        <option value="{{ request()->month ?: '' }}">เลือกเดือน</option>
                        @foreach( $months AS $data )
                        @php
                        $sel = '';
                        @endphp
                        @if( !empty($_GET['month']) )
                        @if( $_GET['month'] == $data->month)
                        @php
                        $sel = 'selected="1"';
                        @endphp
                        @endif
                        @endif
                        <option {{ $sel }} value="{{ $data->month ?: '' }}">{{ date('M', strtotime($data->date)) }}</option>
                        @endforeach
                    </select>
                    @error('month')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                @enderror
                </div>
                <div class="form-group ml-1">
                    <label for="year">ปี</label>
                    <select class="form-control @error('year') is-invalid @enderror" name="year" id="year">
                        <option value="{{ request()->year ?: '' }}">เลือกปี</option>
                        @foreach( $years AS $data )
                        @php
                        $sel = '';
                        @endphp
                        @if( !empty($_GET['year']) )
                        @if( $_GET['year'] == $data->year)
                        @php
                        $sel = 'selected="1"';
                        @endphp
                        @endif
                        @endif
                        <option {{ $sel }} value="{{ $data->year ?: '' }}">{{ date('Y', strtotime($data->date)) }}</option>
                        @endforeach
                    </select>
                    @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                @enderror
                </div>
                <div class="d-flex mt-4 p-2">
                    <button class="btn btn-success form-control mr-1" name="button" value="Excel">Excel</button>
                    <button class="btn btn-danger form-control text-nowrap" name="button" value="PDF">PDF</button>
                   
                </div>
            </div>
           

        </form>
    </div>
</div>
        
    </div>
</div>


<div class="card-container container mb-5 mt-3">
    <div class="card">
        @include('leave.page.HRnav')
        <table class="table text-center">
            <thead style="background-color: #0078D7" class="text-white">
                <tr>
                    <th class="td-name">ชื่อ</th>
                    <th>แผนก</th>
                    <th>ตำแหน่ง</th>
                    <th>วันทำรายการ</th>
                    <th>ประเภทการลา</th>
                    <th>จำนวนวันที่ลา</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                </tr>
            </thead>

            <tbody class="text-center">
                @foreach ($leaves as $i=> $leave)
                <tr>
                    <td>{{$leave->user->name}}</td>
                    <td>{{$leave->user->department->name}}</td>
                    <td>{{$leave->user->position->name}}</td>
                    <td>{{ date('j M Y', strtotime($leave->date)) }}</td>
                    <td>{{$leave->leaves_type->topic}}</td>
                    <td>{{$leave->days}}</td>
                    <td>
                        <a href="{{ROUTE('leave.detail', $leave)}}" class="btn btn-outline-info">รายละเอียด</a>

                    </td>
                    @switch($leave->status)

                    @case('ผ่านการอนุมัติ')
                    <td>
                        <span class="btn btn-success  text-white">{{$leave->status}}</span>
                    </td>
                    @break

                    @case('ไม่ผ่านการอนุมัติ')
                    <td>
                        <span class="btn btn-danger  text-white">{{$leave->status}}</span>
                    </td>
                    @break
                    @case('รออนุมัติ')
                    <td>
                        <span>
                            <div class="dropdown show">
                                <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{$leave->status}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#approve{{$leave->id}}">อนุมัติคำขอ</button>
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#notapprove{{$leave->id}}">ไม่อนุมัติคำขอ</button>
                                </div>
                                @include('leave.model.approve1')
                                @include('leave.model.notapprove1')
                            </div>

                        </span>
                    </td>
                    @break

                    @endswitch
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>ผลลัพท์ทั้งหมด {{ number_format($leaves->total()) }} รายการ</div>
                <div>{{ $leaves->links() }}</div>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
