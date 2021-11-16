@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="p-3">แก้ไขใบสมัครงาน</h1>
           <form id="sends" class="my-5" method="POST" action="{{ROUTE('jobs.update',$jobs->id)}}" enctype="multipart/form-data">
         
            
                @csrf
                 <div class="col-md-12">
                    <div class="card card-body">
                        
                        <div class=" d-flex justify-content-between">
                            <h2>ข้อมูลทั่วไป</h2>
                       
                        <div class=" d-flex justify-content-end">
                          <a href="/jobs" class="btn btn-outline-primary mr-2">ยกเลิกการแก้ไข</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> บันทึกการแก้ไข</i> </button>
                        </div>
                    </div>
                        <div class="row mt-5 ">
                            <div class="col-6">
                                <div class="col-12 mb-3 mb-3">
                                    <label for="name" class="font-weight-bold">ชื่อใบรับสมมัคร</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') ? : $jobs->name  }}">
        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="subtitle" class="font-weight-bold">คำบรรยายสั้นๆ</label>
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" value="{{ old('subtitle') ? :  $jobs->subtitle}}">
        
                                    @error('subtitle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="col-12 mb-3">
                                    <label for="salary" class="font-weight-bold">เงินเดือน</label>
                                    <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" value="{{ old('salary') ? :  $jobs->salary }}">
        
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                                                                                              
                            </div>
                            <div class="col-6 d-flex justify-content-center mt-4">
                                @if($jobs->image)
                                <label for="file" style="cursor: pointer;"><img id="output" src="{{asset('storage/'.$jobs->image)}}"
                                  style="width: 450px; height:250px; overflow: hidden;"/>
                                  @else
                                  <label for="file" style="cursor: pointer;"><img id="output" src="{{ asset('image/unnamed.png') }}"
                                    style="width: 450px; height:250px; overflow: hidden;"/>
                                  @endif
                                
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
                                <label for="position" class="font-weight-bold">แผนกงาน</label>
                                <select class="form-control" name="position" id="position">
                                    @foreach( $positions AS $data )
                                      @php
                                        $sel = '';
                                      @endphp
                                    
                                          @if( $jobs->position == $data->name)
                                            @php
                                                $sel = 'selected="1"';
                                            @endphp
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
                                <label for="tpye" class="font-weight-bold">ประเภทงาน</label>
                                <label for="type" class="font-weight-bold">ประเภท <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="{{ old('type') ? : $jobs->type }}" class="form-control"> {{ old('type') ? : $jobs->type }}</option>
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
                                <label for="quantity" class="font-weight-bold">จำนวนที่รับสมัครงาน</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ old('quantity') ? : $jobs->quantity }}">

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-8">
                            <p  class="font-weight-bold">สวัสดิการของบริษัท</p>
                           
                            <table class="table table-bordered" id="property">
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#propertyModel"><i class="fa fa-plus"></i></button>
                                 
                                    </td>
                                </tr>
                                <tbody>
                                @if(old('property')== '')
                                @foreach ($jobs->jobs_property as $value)
                             
                                <tr>
                                    <td>
                                        <input type="text" name="property[{{$value->id}}]"  class="form-control" value="{{$value->detail}}" />
                                    </td>
                                    <td class="text-center" >
                                        <form name="delproperty" action="{{ ROUTE('job.delproperty', ['id' => $value->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                        </form>
                                    </td>
                                   
                                </tr>
                                @endforeach
                                @else
                                @foreach (old('property') as $i => $property)
                                <tr>
                                    <td><input type="text" name="property[{{$i}}]"  value="{{ old('property.'.$i) }}" class="form-control @error('property.'.$i) is-invalid @enderror" />
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('property.'.$i) }}</strong>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form name="delproperty" action="{{ ROUTE('job.delproperty', ['id' => $i]) }}" method="POST">
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                        </form>
                                    </td>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                               
                            </tbody>
                            </table>
                        </div>
                        <div class="mb-3 col-8">
                            <p class="font-weight-bold">คุณสมบัติของผู้สมัคร</p>
                            <table class="table table-bordered" id="welfare">
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#welfareModel"><i class="fa fa-plus"></i></button>
                                 
                                    </td>
                                </tr>
                                <tbody>
                                @if(old('welfare')== '')
                                @foreach ($jobs->jobs_welfare as $value)
                                <tr>
                                    <td >
                                        <input type="text" name="welfare[{{$value->id}}]"  class="form-control" value="{{$value->detail}}" />
                                    </td>
                                    <td class="text-center" >
                                        <form name="delwelfare" action="{{ ROUTE('job.delwelfare', ['id' => $value->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                        </form>
                                    </td>
                                   
                                </tr>
                                @endforeach
                                @else
                                @foreach (old('welfare') as $i => $welfare)
                                <tr>
                                    <td><input type="text" name="welfare[{{$i}}]"  value="{{ old('welfare.'.$i) }}" class="form-control @error('welfare.'.$i) is-invalid @enderror" />
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('welfare.'.$i) }}</strong>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form name="delwelfare" action="{{ ROUTE('job.delwelfare', ['id' => $i ]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                               
                            </tbody>
                            </table>

                        </div>

                        <label for="" class="font-weight-bold">กำหนดเวลาที่สมัคร</label>
                        <div id="RadioGroup">
                            @if(old('times')!='')
                            <input type="radio" name="times"  value="1"  @if(old('times') == 1) checked  @endif > กำหนด &nbsp;
                            <input type="radio" name="times" value="0" @if(old('times') == 0) checked @endif /> &nbsp; ไม่กำหนด
                            @else
                            <input type="radio" name="times"  value="1"  @if( $jobs->times == '1' ) checked  @endif> กำหนด &nbsp;
                            <input type="radio" name="times" value="0"  @if(  $jobs->times =='0' ) checked  @endif /> &nbsp; ไม่กำหนด
                            @endif
                            
                            
                            <div id="times2" class="desc">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="start" class="font-weight-bold">วัน </label>
                                        <input type="date" class="form-control @error('start') is-invalid @enderror" name="start" id="start" value="{{ old('start') ? : $jobs->start }}">
                                        @error('start')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2 offset-md-0">
                                        <label for="start_time" class="font-weight-bold">เวลา </label>
                                        @php
                                        @endphp
                                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time" value="{{ old('start_time') ? : date('H:i', strtotime($jobs->start_time)) }}">
                                        @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 offset-md-1">
                                        <label for="end" class="font-weight-bold">วันที่สิ้นสุด </label>
                                        <input type="date" class="form-control @error('end') is-invalid @enderror" name="end" id="end" value="{{ old('end') ? : $jobs->end  }}">
                                        @error('end')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2 offset-md-0">
                                        <label for="end_time" class="font-weight-bold">เวลาที่สิ้นสุด </label>
                                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" id="end_time" value="{{ old('end_time') ? : date('H:i', strtotime($jobs->end_time))  }}">
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
<div class="modal fade" id="propertyModel" tabindex="-1" role="dialog" aria-labelledby="propertyModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="propertyModel">เพิ่มสวัสดิการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- form post --}}
            <form action="{{ROUTE('job.addproperty')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="property">
                            สวัสดิการ
                        </label>
                        <input type="hidden" name="job_id" value="{{$jobs->id}}">
                        <input type="text" class="form-control" id="property" name="property" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="welfareModel" tabindex="-1" role="dialog" aria-labelledby="welfareModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welfareModel">เพิ่มคุณสมบัติผู้สมัคร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- form post --}}
        <form action="{{ROUTE('job.addwelfare')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="welfare">
                            คุณสมบัติของผู้สมัคร
                        </label>
                        <input type="hidden" name="job_id" value="{{$jobs->id}}">
                        <input type="text" class="form-control" id="welfare" name="welfare" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection