@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1 class="ml-4">ตำแหน่งงาน</h1>
                </div>
            </div>

            <div class="page-header-actionbar d-flex align-items-center">
                <div class="filter-item">
                    <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
                        เพิ่มตำแหน่งงาน
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
                            <th class="text-center">ชื่อตำแหน่งงาน</th>
                            <th class="text-center">รายละเอียด</th>
                            <th class="text-center">แก้ไข</th>
                            <th class="text-center">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($position as $value)
                        <tr class="data-row">
                            <th class="text-center" id="position_name">{{ $value->position_name }}</th>
                            <td class="text-center" id="position_detail">{{ $value->position_detail }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" id="edit-item" data-item-id ="{{$value->id}}">แก้ไข</button>
                            </td>
                            <td class="text-center">
                                <form id="delete-position" action="{{ route('position.delete', ['id' => $value->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('delete-position')">ลบ</button>
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
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มตำแหน่งงาน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{-- form post --}}
        <form action="{{ROUTE('position.save')}}" method="post">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label for="position_name">
                       ขื่อตำแหน่งงาน
                    </label>
                    <input type="text" class="form-control @error('position_name') is-invalid @enderror"
                        id="position_name" name="position_name">
                    @error('position_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="position_detail">
                        รายละเอียด
                    </label>
                    <textarea class="form-control  @error('position_detail') is-invalid @enderror"
                        id="position_detail" name="position_detail" rows="3"></textarea>
                    @error('position_detail')
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
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขตำแหน่งงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="{{ROUTE('position.update','id')}}">
                    @csrf
                    <input type="hidden" name="id" class="form-control" id="modal-input-id" required>
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-name">ชื่อแผนงงาน</label>
                        <input type="text" name="position_name" class="form-control" id="modal-input-name" required
                            autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-detail">รายละเอียด</label>
                        <textarea type="text" name="position_detail" class="form-control" id="modal-input-detail"
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

<script>
    $(document).ready(function () {
        $(document).on('click', "#edit-item", function () {
            $(this).addClass('edit-item-trigger-clicked');
            $('#edit-modal').modal()
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function () {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = el.data('item-id');
            var name = row.children("#position_name").text();
            var detail = row.children("#position_detail").text();

            // fill the data in the input fields
            $("#modal-input-id").val(id);
            $("#modal-input-name").val(name);
            $("#modal-input-detail").val(detail);

        })
        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function () {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })
    })

</script>
<script>
    function confirmDelete() {
        var id = $(this).data('id');
        swal({
                title: "คุณต้องการลบตำแหน่งงานนี้ ?",

                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#delete-position').submit();
                } else {
                    swal({
                        title: "ยกเลิกการลบ ",
                        icon: "warning",
                    })
                }
            });
    }

</script>
@endsection
