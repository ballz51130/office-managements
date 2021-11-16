@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>เวลาการเข้า-ออกงาน</h1>
                </div>
            </div>
            <form id="sends" name="sends" action="{{ROUTE('clockedsetting.save')}}" method="post">
                @csrf
                <div class="card-container container mb-3 mt-2">
                    <div class=" d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary">อัพเดทเวลา</button>
                    </div>
            </div>
        </div>


        <div class="card">
            <table class="table">
                <thead style="background-color: #0078D7" class="text-white">
                    <tr class="text-center">
                        <th>วัน</th>
                        <th></th>
                        <th>เวลาเข้างาน</th>
                        <th>เวลาออกงาน</th>
                        <th>เวลาพักงาน</th>
                        <th>รวมเวลาทำงาน</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clock as $value)

                    @php
                    $begin = $value->time_checkin ;
                    $end = $value->time_checkout ;

                    $remain=intval(strtotime($end)-strtotime($begin));
                    $wan=floor($remain/86400);
                    $l_wan=$remain%86400;
                    $hour=floor($l_wan/3600);
                    $l_hour=$l_wan%3600;
                    $minute=floor($l_hour/60);
                    $second=$l_hour%60;

                    @endphp

                    <tr class="text-center">
                        <td>{{$value->day}}
                            <input type="hidden" name="id[{{$value->id}}]" value="{{$value->id}}">
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="type[{{$value->id}}]" name="type[{{$value->id}}]" {{ $value->type ? 'checked' : '' }} >

                                <label class="custom-control-label" for="type[{{$value->id}}]"></label>
                              </div>
                         </td>
                        <td> <input type="time" name="time_checkin[{{$value->id}}]"
                                value="{{ old('time_checkin.'.$value->id) ? : date('H:i', strtotime($value->time_checkin)) }}"
                                class="form-control @error('time_checkin.'.$value->id) is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('time_checkin.'.$value->id) }}</strong>
                            </span>
                        </td>
                        <td> <input type="time" name="time_checkout[{{$value->id}}]"
                                value="{{old('time_checkout.'.$value->id)  ? : date('H:i', strtotime($value->time_checkout)) }}"
                                class="form-control @error('time_checkout.'.$value->id) is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('time_checkout.'.$value->id) }}</strong>
                            </span> </td>
                        <td width="15%"><input type="text" name="freetime[{{$value->id}}]"
                                value="{{old('freetime.'.$value->id) ? : $value->freetime }}"
                                class="form-control text-center @error('freetime.'.$value->id) is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('freetime.'.$value->id) }}</strong>
                            </span></td>
                        <td width="15%"> <input type="text" name="timeout[{{$value->id}}]"
                                value="{{$hour.' ชั่วโมง '.$minute.' นาที '}}" class="form-control text-center"
                                readonly> </td>
                    </tr>
                    @endforeach
                </tbody>
</form>
@include('sweetalert::alert')
<script>
    function myFunction() {
        document.getElementById("sends").submit();
    }

</script>

@endsection
