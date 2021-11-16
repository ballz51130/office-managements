<div class="modal fade" id="identification_card" tabindex="-1" role="dialog" aria-labelledby="identification_cardTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/users/{{$user->id}}/docs" method="post" enctype="multipart/form-data">
                @csrf
    
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="head-text text-center">
                        @if(!empty($user->identification_card))
                        <h4 class="text-primary mb-1">รูปบัตรประจำตัวประชาชน</h4>
                        <img  src="{{asset('storage/'.$user->identification_card)}}"style="width:250px; height:250px; ">
                        @else
                        <h4 class="text-primary">กรุณาใส่รูปบัตรประจำตัวประชาชน</h4>
                        @endif
                        <input type="file" accept="image/*" class="form-control mt-2" name="identification_card" required oninvalid="this.setCustomValidity('กรุณาใส่รูปบัตรประจำตัวประชาชน')" oninput="this.setCustomValidity('')">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

            </form>
        </div>
    </div>
</div>
</div>
{{--  end identification_card --}}

{{-- house_registration  --}}

<div class="modal fade" id="house_registration" tabindex="-1" role="dialog" aria-labelledby="house_registrationTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/users/{{$user->id}}/docs" method="post" enctype="multipart/form-data">
                @csrf
    
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="head-text text-center">
                        @if(!empty($user->house_registration))
                        <h4 class="text-primary mb-1">สำเนาทะเบียนบ้าน</h4>
                        <img  src="{{asset('storage/'.$user->house_registration)}}"style="width:250px; height:250px; ">
                        @else
                        <h4 class="text-primary">กรุณาใส่รูปสำเนาทะเบียนบ้าน</h4>
                        @endif
                        <input type="file" accept="image/*" class="form-control mt-2" name="house_registration" required oninvalid="this.setCustomValidity('กรุณาใส่รูปสำเนาทะเบียนบ้าน')" oninput="this.setCustomValidity('')">
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

            </form>
        </div>
    </div>
</div>
</div>
{{-- end house_registration --}}

{{-- etc Doc --}}
<div class="modal fade" id="etc" tabindex="-1" role="dialog" aria-labelledby="etcTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/users/{{$user->id}}/docs" method="post" enctype="multipart/form-data">
                @csrf
    
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="head-text text-center">
                        @if(!empty($user->etc))
                        <h4 class="text-primary mb-1">เอกสารอื่นๆ</h4>
                        <img src="{{asset('storage/'.$user->etc)}}" style="width:250px; height:250px; ">
                        @else
                        <h4 class="text-primary">เอกสารอื่นๆ</h4>
                        @endif
                        <input type="file" accept="image/*" class="form-control mt-2" name="etc" required oninvalid="this.setCustomValidity('กรุณาเลือกเอกสารอื่นๆ')" oninput="this.setCustomValidity('')">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

            </form>
        </div>
    </div>
</div>
</div>
{{-- End etc Doc --}}