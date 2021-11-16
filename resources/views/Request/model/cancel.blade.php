<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger" style="height: 30px;"> 
            </div>
           
            <div class="mr-3">
                <button type="button" class="close text-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="text-info text-center"> ยืนยันการยกเลิกรายการ</h4>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body text-center">
                  <span> คุณกำลังยกเลิกรายการคำขอ ต้องการดำเนินการต่อหรื่อไม่ ?</span> 
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ยืนยัน</button>
                    </div>
            </form>
        </div>
    </div>
</div>
