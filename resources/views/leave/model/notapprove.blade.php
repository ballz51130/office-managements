

<div class="modal fade" id="notapprove" tabindex="-1" role="dialog" aria-labelledby="notapproveTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger" style="height: auto">
            
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="{{ROUTE('leave.detail.update',$leave->id)}}" method="post">
                @csrf
                <input type="hidden" name="status" value="ไม่ผ่านการอนุมัติ" >
                <div class="modal-body">
                    <div class="head-text text-center"> 
                    <h4 class="text-primary"> ไม่อนุมัติคำขอ ของ {{$leave->user->name}}</h4>
                    </div> 
                    <div class="form-group row mt-3">
                        <label for="reason" class="col-sm-3 col-form-label">หมายเหตุ :</label>
                        <div class="col-sm-9">
                        <textarea name="reason" id="reason" cols="30" rows="5" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกหมายเหตุ')" oninput="this.setCustomValidity('')"></textarea>
                        </div>
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