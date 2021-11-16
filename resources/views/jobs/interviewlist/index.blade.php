@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- header --}}
    <div class="d-flex justify-content-between mt-5">
        <h1>รายการสัมภาษณ์</h1>

        <div class="d-flex">
            {{-- search --}}
            <form action="{{Route('Interviewlist')}}" class="d-flex">
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
        {{-- <div class="d-flex justify-content-start mb-3">
            <form action="{{ Route('candidate') }}" class="d-flex">
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
           </div> --}}
        <div class="card">
         
            <table class="card-table">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th class="td-name">ชื่อ</th>
                        <th>อีเมล</th>
                        <th >เอกสาร</th>
                        <th >ตำแหน่งงาน</th>
                        <th >วันนัดสัมภาษณ์งาน</th>
                        <th class="text-center">สถานะ</th>
                        <th></th>
                 
                    </tr>
                </thead>

                <tbody>
                   @foreach ($interviewlists as $i => $interviewlist)
                    <tr class="text-center">
                        @switch($interviewlist->status)
                            @case('ไม่ผ่านการสัมภาษณ์งาน')
                                
                                @break
                            @case('ผ่านการสัมภาษณ์งาน')
                                
                            @break
                            
                            @default
                            <td>{{(($interviewlists->currentPage() - 1 ) * $interviewlists->perPage() ) + $i + 1}}</td>
                        
                            <td> <a href=""> {{$interviewlist->registrations->name}} </a></td>
                            <td class="">{{$interviewlist->registrations->email}}</td>
                            <td class=""><i class="fa fa-file-photo-o" style="font-size:48px;color:red"></i></td>
                            <td class="">{{$interviewlist->registrations->position}}</td>
                            @if(date('j / M  / Y', strtotiMe($interviewlist->date)) == '1/01/1970')
                            <td class="text-center">-</td>
                            @else
                            <td >{{ date('j M Y', strtotime($interviewlist->date)) }}</td>
                            @endif
                            <td>  
                                @switch($interviewlist->status)
                                @case('รอสัมภาษณ์งาน')
                                    <h5> <span class="badge badge-info"> {{$interviewlist->status}}</span></h5>
                                    @break
                                    @case('รอผลการสรุป')
                                   <h5> <span class="badge badge-light"> {{$interviewlist->status}}</span></h5>
                                    @break
                                    
                            @endswitch  
                             
                            </td>
                                <td> <a href="{{Route('Interviewlist.edit',$interviewlist)}}" class="btn btn-outline-primary">รายละเอียด</a></td>
                        @endswitch
                        
                          
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>{{ $interviewlists->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

 @include('sweetalert::alert')
 @endsection
