<div class="modal fade" id="requestdocuments" tabindex="-1" role="dialog" aria-labelledby="requestdocuments" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="requestdocuments" >ส่งเอกสารคำขอ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="number" class="col-sm-4 col-form-label">เลขที่เอกสาร :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="number" name="number" value="A04" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="number" class="col-sm-4 col-form-label">ประเภทเอกสาร :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="number" name="number" value="ใบรับของการทำงาน" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">วันที่ส่งเอกสาร :</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">แนบไฟล์เอกสาร :</label>
                        <div class="col-sm-8">
                          <input type="file" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">อีเมลผู้รับ :</label>
                        <div class="col-sm-8">
                          <input type="text" readonly class="form-control" id="name" name="name" value="Excemple@gmail.com">
                        </div>
                    </div>
                    <h3 class="text-info">รายระเอียดเพิ่มเติม</h3>
                    <div class="form-group row mt-3">
                        <label for="detail" class="col-sm-4 col-form-label">หมายเหตุ :</label>
                        <div class="col-sm-8">
                        <textarea name="detail" id="detail" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
            </form>
        </div>
    </div>
</div>
