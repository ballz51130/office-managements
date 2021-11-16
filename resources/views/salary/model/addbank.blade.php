<div class="modal fade" id="addbank" tabindex="-1" role="dialog" aria-labelledby="addbank" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#0078D7" id="addbank" >เพิ่มบัญชีธนคาร</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="namebank" class="col-sm-3 col-form-label">ธนคาร :</label>
                        <div class="col-sm-9">
                            <select name="namebank" id="namebank" class="form-control">
                                <option value="ธนคารกรุงไทย">ธนคารกรุงไทย</option>
                                <option value="ธนคารกสิกรไทย">ธนคารกสิกรไทย</option>
                                <option value="ธนคารกรุงเทพ">ธนคารกรุงเทพ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="number" class="col-sm-3 col-form-label">เลขบัญชี :</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="number" name="number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">ชื่อบัญชี :</label>
                        <div class="col-sm-9">
                          <input type="name" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-3 pt-0">ประเภทบัญชี :</legend>
                          <div class="col-sm-9">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="ออมทรัพย์" id="ออมทรัพย์" value="ออมทรัพย์">
                              <label class="form-check-label" for="ออมทรัพย์">
                                ออมทรัพย์
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="ฝากประจำ" id="ฝากประจำ" value="ฝากประจำ">
                              <label class="form-check-label" for="ฝากประจำ">
                                ฝากประจำ
                              </label>
                            </div>
                            <div class="form-check ">
                              <input class="form-check-input" type="radio" name="กระแสรายวัน" id="กระแสรายวัน" value="กระแสรายวัน">
                              <label class="form-check-label" for="กระแสรายวัน">
                                กระแสรายวัน
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
            </form>
        </div>
    </div>
</div>
