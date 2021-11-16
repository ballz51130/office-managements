@extends('layouts.admin')

@section('content')


    <div class="container">
        <h1 class="p-3"><a href="/jobs/" class="btn btn-light"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> เพิ่มใบสมัครงาน</h1>
    <form class="my-5" method="POST" action="{{ROUTE('jobs.save')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="card card-body">

                    <div class=" d-flex justify-content-between">
                        <h2>ข้อมูลทั่วไป</h2>

                    <div class=" d-flex justify-content-end">
                         <a href="/jobs" class="btn btn-outline-primary mr-2">ยกเลิกใบสมัครงาน</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> สร้างใบสมัคร</i></button>
                    </div>
                </div>
                    <div class="row mt-5 ">
                        <div class="col-6">
                            <div class="col-12 mb-3 mb-3">
                                <label for="name" class="font-weight-bold">ชื่อใบรับสมมัคร</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subtitle" class="font-weight-bold">คำบรรยายสั้นๆ</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" value="{{ old('subtitle') }}">

                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="salary" class="font-weight-bold">เงินเดือน</label>
                                <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" value="{{ old('salary') }}">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center mt-4">

                              <label for="file" style="cursor: pointer;"><img id="output" src="{{ asset('images/unnamed.png') }}"
                                style="width: 450px; height:250px; overflow: hidden;"/>

                            <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                               class="rounded-circle" alt="Cinque Terre" style="display: none;"></p>
                               <div class="lable-photo d-flex justify-content-center">
                               <span for="file "> อัพโหลดภาพ</span>
                            </div>
                        </div>
                    </div>
                        <h2>เกี่ยวกับงาน</h2>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="position" class="font-weight-bold">ตำแหน่งงาน <span class="text-danger">*</span></label>
                                <select class="form-control" name="position" id="position">
                                    <option value="{{ request()->position ?? '' }}">ตำแหน่งงาน</option>
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
                                    <option {{ $sel }} value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 offset-md-1">
                                <label for="tpye" class="font-weight-bold">ประเภทงาน <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="{{ old('type') }}" class="form-control">{{ old('type') ? :'เลือกประเภท' }}</option>
                                    <option value="ประจำ">ประจำ</option>
                                    <option value="พาสทาม">พาสทาม</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 offset-md-1">
                                <label for="quantity" class="font-weight-bold">จำนวนที่รับสมัครงาน <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ old('quantity') }}">

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="font-weight-bold">สวัสดิการของบริษัท</label>
                            <table class="table table-bordered" id="welfare">

                                   {{--  เช็คว่าค่า  error มีเท่าไหร่ โดยการนับ --}}
                                @if (count($errors->get('welfare.*.detail')) > 0)
                                <tr>
                                    <td></td>
                                    <td><button type="button" name="addwelfare" id="addwelfare" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                   {{-- เช็คว่า จำนวน ช่อง และค่าที่ส่งเดิม มีเท่าไหร แล้วนำกลับมาวนเพื่อสร้างตรางที่มีเท่ากันกับที่ส่งไปก่อนหน้านั้น --}}
                                @foreach (old('welfare') as $i => $welfare)
                                <tr>
                                    <td><input type="text" name="welfare[{{$i}}][detail]"  value="{{ old('welfare.'.$i.'.detail') }}" class="form-control @error('welfare.'.$i.'.detail') is-invalid @enderror" />
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('welfare.'.$i.'.detail') }}</strong>
                                        </span>
                                    </td>
                                    <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus"></i></button>
                                    </td>
                                </tr>
                                @endforeach

                                {{-- เป็นช่อง input เริ่มต้น เมื่อเข้าหน้านี้  --}}

                                @elseif(old('welfare')== '')
                                <tr>
                                    <td>
                                        <input type="text" name="welfare[0][detail]"  class="form-control @error('welfare') is-invalid @enderror" value="{{ old('welfare[0][detail]')}}" class="form-control"/>
                                            @error('welfare')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    </td>
                                    <td><button type="button" name="addwelfare" id="addwelfare" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                @else
                                <tr>
                                    <td></td>
                                    <td><button type="button" name="addwelfare" id="addwelfare" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                @foreach (old('welfare') as $i => $welfare)
                                <tr>
                                    <td><input type="text" name="welfare[{{$i}}][detail]"  value="{{ old('welfare.'.$i.'.detail') }}" class="form-control @error('welfare.'.$i.'.detail') is-invalid @enderror" />
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('welfare.'.$i.'.detail') }}</strong>
                                        </span>
                                    </td>
                                    <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                   {{-- @if (count($errors->get('welfare.*.detail')) > 0) --}}
                            </table>

                        </div>
                        <div class="mb-3">
                            <label for="" class="font-weight-bold">คุณสมบัติของผู้สมัคร</label>
                            <table class="table table-bordered" id="property">
                                {{--  เช็คว่าค่า  error มีเท่าไหร่ โดยการนับ --}}
                                @if (count($errors->get('property.*.detail')) > 0)
                                <tr>
                                    <td></td>
                                    {{-- ปุ่มไว้สำหรับเพิ่ม input +javascript อยู้ใน layout admim.blade.php --}}
                                    <td><button type="button" name="addproperty" id="addproperty" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                {{-- เช็คว่า จำนวน ช่อง และค่าที่ส่งเดิม มีเท่าไหร แล้วนำกลับมาวนเพื่อสร้างตรางที่มีเท่ากันกับที่ส่งไปก่อนหน้านั้น --}}
                                @foreach (old('property') as $i => $property)
                                <tr>
                                    <td><input type="text" name="property[{{$i}}][detail]"  value="{{ old('property.'.$i.'.detail') }}" class="form-control @error('property.'.$i.'.detail') is-invalid @enderror" />
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('property.'.$i.'.detail') }}</strong>
                                        </span>
                                    </td>
                                    <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                  {{-- เป็นช่อง input เริ่มต้น เมื่อเข้าหน้านี้  --}}

                                  @elseif(old('property') == '')
                                  <tr>
                                      <td>
                                          <input type="text" name="property[0][detail]"  class="form-control @error('property') is-invalid @enderror" value="{{ old('property[0][detail]')}}" class="form-control"/>
                                              @error('property')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                      @enderror
                                      </td>
                                      <td><button type="button" name="addproperty" id="addproperty" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                  </tr>
                                  @else
                                  <tr>
                                    <td></td>
                                    <td><button type="button" name="addproperty" id="addproperty" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                  @foreach (old('property') as $i => $property)
                                  <tr>
                                      <td><input type="text" name="property[{{$i}}][detail]"  value="{{ old('property.'.$i.'.detail') }}" class="form-control @error('property.'.$i.'.detail') is-invalid @enderror" />
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('property.'.$i.'.detail') }}</strong>
                                          </span>
                                      </td>
                                      <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus"></i></button>
                                      </td>
                                  </tr>
                                  @endforeach
                            @endif
                            {{-- END @if (count($errors->get('property.*.detail')) > 0)  --}}
                            </table>

                        </div>

                        <label for="" class="font-weight-bold">กำหนดเวลาที่สมัคร</label>
                        <div id="RadioGroup">
                        <input type="radio" name="times"  value="1"  @if(old('times') == 1) checked  @endif> กำหนด &nbsp;
                         <input type="radio" name="times" value="0"  @if(old('times') == 0) checked  @endif /> &nbsp; ไม่กำหนด
                            <div id="times2" class="desc">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="start" class="font-weight-bold">วัน </label>
                                        <input type="date" class="form-control @error('start') is-invalid @enderror" name="start" id="start" value="{{ old('start') }}">
                                        @error('start')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2 offset-md-0">
                                        <label for="start_time" class="font-weight-bold">เวลา </label>
                                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time" value="{{ old('start_time') }}">
                                        @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 offset-md-1">
                                        <label for="end" class="font-weight-bold">วันที่สิ้นสุด </label>
                                        <input type="date" class="form-control @error('end') is-invalid @enderror" name="end" id="end" value="{{ old('end') }}">
                                        @error('end')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2 offset-md-0">
                                        <label for="end_time" class="font-weight-bold">เวลาที่สิ้นสุด </label>
                                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" id="end_time" value="{{ old('end_time') }}">
                                        @error('end_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>

                            </div>
                        </div>
                    </div>
                    <!-- col-md-12 -->


                </div>
                <!-- .row -->

            </form>
            </div>
@endsection
@section('scripts')
<script type="text/javascript">
    var i = 0;
    $("#addwelfare").click(function () {

        ++i;

        $("#welfare").append('<tr><td><input type="text" name="welfare[' + i +
            '][detail]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
<script type="text/javascript">
    var i = 0;

    $("#addproperty").click(function () {

        ++i;

        $("#property").append('<tr><td><input type="text" name="property[' + i +
            '][detail]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus" aria-hidden="true"></i></i></button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
