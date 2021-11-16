@extends('layouts.admin')

@section('content')


<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1 class="ml-4">แผนก</h1>
                </div>
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
                        เพิ่มแผนก
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="card-container container mb-5 mt-3">
    <div class="card card-body sm-3">
        <div class="row my-3  px-5">
            <div class="col-md-12">
                <table class="table">
                    <thead style="background-color: #0078D7" class="text-white">
                        <tr>
                            <th class="text-center">ชื่อแผนกงาน</th>
                            <th class="text-center">รายละเอียด</th>
                            <th class="text-center">แก้ไข</th>
                            <th class="text-center">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($department as $value)
                        <tr class="data-row">
                            <th class="text-center" id="department_name">{{ $value->department_name }}</th>
                            <td class="text-center" id="department_detail">{{ $value->department_detail }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" id="edit-item"
                                    data-item-id="{{$value->id}}">แก้ไข</button>
                            </td>
                            <td class="text-center">
                                <form id="delete-department"
                                    action="{{ route('department.delete', ['id' => $value->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('delete-department')">ลบ</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot class="table table-striped">
                    <ul class="pagination pagination-lg">
                        <li class="page-item">

                        <li>
                    </ul>
                </tfoot>

            </div>
        </div>
    </div>
</div>
</div>

<!-- insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนกงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- form post --}}
            <form action="{{ROUTE('department.save')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="department_name">
                            ขื่อแผนกงาน
                        </label>
                        <input type="text" class="form-control @error('department_name') is-invalid @enderror"
                            id="department_name" name="department_name">
                        @error('department_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department_detail">
                            รายระเอียด
                        </label>
                        <textarea class="form-control  @error('department_detail') is-invalid @enderror"
                            id="department_detail" name="department_detail" rows="3"></textarea>
                        @error('department_detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
{{-- end insert Model --}}

<!-- edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขแผนกงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="{{ROUTE('department.update','id')}}">
                    @csrf
                    <input type="hidden" name="id" class="form-control" id="modal-input-id" required>
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-name">ชื่อแผนงงาน</label>
                        <input type="text" name="department_name" class="form-control" id="modal-input-name" required
                            autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-detail">รายละเอียด</label>
                        <textarea type="text" name="department_detail" class="form-control" id="modal-input-detail"
                            row="3"> </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /edit Modal -->

@include('sweetalert::alert')
    
@endsection
@section('script')
<script>
    
</script>
@endsection
