<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approve" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success" style="height: 30px;"> 
            </div>
            <div class="mr-3">
                <button type="button" class="close text-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="text-info text-center"> ยืนยันรายการ</h4>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body text-center">
                  <span> คุณต้องการยืนยันรายการนี้ ?</span> 
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success">ยืนยัน</button>
                    </div>
            </form>
        </div>
    </div>
</div>
