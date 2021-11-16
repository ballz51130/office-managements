
@extends('layouts.admin')

@section('content')

    <div class="container">

        {{-- header --}}
        <div class="mt-5 mb-4">
            <div class="d-flex justify-content-center">
            <H1><a href="/users/departments" class="btn btn-light"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>แก้ไขแผนกงาน</H1>
        </div>
        </div>
        {{-- end: heaer --}}



        <form action="{{ROUTE('department.update',$department)}}" method="post">
            @csrf
            {{ method_field('PUT') }}

            <div class=" d-flex justify-content-center">
            <div class="card" style="width: 500px; height:auto;">

                <div class="card-body">
                 
                    <div class="form-group">
                        <label for="name">แผนกงาน</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$department->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group ">
                        <label for="detail">รายละเอียด</label>
                        <textarea id="detail" class=" form-control @error('detail') is-invalid @enderror" name="detail" rows="4" cols="50">{{$department->detail}}</textarea>
                      </div>
                      @error('detail')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                     
            </div>

                <div class="card-footer">

                    <div class="d-flex justify-content-center mt-2">
                     
                        <button type="submit" class="btn btn-primary mr-5">บันทึก</button>
                        <a href="/users/departments" class="btn btn-light">ย้อนกลับ</a>
                    </div>
                </div>
            </div>

            </div>
        </form>

    </div>
@include('sweetalert::alert')
@endsection
