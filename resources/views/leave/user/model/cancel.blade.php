<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger" style="height: 30px;"> 
            </div>
            <div class="text-left mr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ROUTE('leave.cancel',['id' => $value->id] )}}" method="post">
            @csrf
                <div class="modal-body">
                    <div class="head-text text-center"> 
                        <h3 class="text-primary">คุณต้องการยกเลิกคำขอนี้หรือไม่ ?</h3>
                    </div> 
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-danger text-white">ยืนยัน</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    </div>
            </form>
        </div>
    </div>
</div>
