
<div class="modal fade" id="approve{{$leave->id}}" tabindex="-1" role="dialog" aria-labelledby="approvee{{$leave->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="{{ROUTE('leave.detail.update',$leave->id)}}" method="post">
                @csrf
                <input type="hidden" name="status" value="ผ่านการอนุมัติ" >
                <div class="modal-body">
                    <div class="head-text text-center"> 
                    <h4 class="text-primary">คุณต้องการอนุมัติการลาของ {{$leave->user->name}}</h4>
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