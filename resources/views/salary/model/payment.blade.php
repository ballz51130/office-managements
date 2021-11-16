<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="payment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#0078D7" id="payment" >บันทึกการชำระเงิน</h4>

            

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="number" class="col-sm-4 col-form-label">เลขที่เอกสาร :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="number" name="number" value="EX013546301">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sum" class="col-sm-4 col-form-label">ยอดที่ต้องชำระ :</label>
                        <div class="col-sm-8">
                          <input type="sum" class="form-control" id="sum" name="sum" value="20000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label">วันที่ชำระ :</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namebank" class="col-sm-4 col-form-label">วิธีการชำระ :</label>
                        <div class="col-sm-8">
                            <select name="namebank" id="namebank" class="form-control">
                                <option value="โอนเงิน">โอนเงิน</option>
                                <option value="เงินสด">เงินสด</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namebank" class="col-sm-4 col-form-label">บัญชีโอนเงิน :</label>
                        <div class="col-sm-8">
                            <select name="namebank" id="namebank" class="form-control">
                                <option value="ธนคารกรุงไทย">ธนคารกรุงไทย</option>
                                <option value="ธนคารกสิกรไทย">ธนคารกสิกรไทย</option>
                                <option value="ธนคารกรุงเทพ">ธนคารกรุงเทพ</option>
                              
                            </select>
                            <a href="" class="text-info btn btn-outline-primary"  data-toggle="modal" data-target="#addbank">
                                เพิ่มธนคาร
                        </a>
                         
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="number" class="col-sm-4 col-form-label">ค่าทำเนียม :</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" id="number" name="number">
                        </div>
                    </div>

                    <h3 class="text-info">รายระเอียดเพิ่มเติม</h3>

                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm-4 col-form-label">หมายเหตุ :</label>
                        <div class="col-sm-8">
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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
