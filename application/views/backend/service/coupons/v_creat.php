<form action="<?= base_url('coupons-add?lang='.$lang); ?>" method="post">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung địa chỉ<?php $this->MainModel->checkLang($lang); ?></h6>
         <div class="row">
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">Tên chương trình khuyến mãi</label>
                  <input type="text" class="form-control" name="name_coupons" required>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label class="form-label">Mã khuyến mãi</label>
                  <input type="text" class="form-control" name="code_coupons">
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label class="form-label">Tạo mã tự động</label><br>
                  <input type="checkbox" id="switch1" switch="none" name="code_coupons_auto" checked="">
                  <label for="switch1" data-on-label="On" data-off-label="Off"></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label class="form-label">Trừ khuyến mại</label>
                  <div class="input-group">
                    <div class="input-group-text">VNĐ</div>
                    <input type="number" class="form-control" name="discount_coupons_vnd">
                 </div>
              </div>
           </div>
           <div class="col-md-6">
            <div class="mb-3">
               <label class="form-label">Trừ khuyến mại</label>
               <div class="input-group">
                 <div class="input-group-text">%</div>
                 <input type="number" class="form-control" name="discount_coupons_percent">
              </div>
           </div>
        </div>
        <div class="col-md-12">
           <p style="color:red;">*Lưu ý: Chỉ áp dụng 1 hình thức khuyến mại cho 1 chương trình ưu tiên từ trừ VNĐ rồi tới khuyến mãi %.</p>
        </div>
        <div class="col-md-3">
         <div class="mb-3">
            <label class="form-label">Thời gian bắt đầu</label>
            <input type="date" class="form-control" name="time_start" value="<?= date('Y-m-d'); ?>">
         </div>
      </div>
      <div class="col-md-3">
         <div class="mb-3">
            <label class="form-label">Thời gian kết thúc</label>
            <input type="date" class="form-control" name="time_end" value="<?= date('Y-m-d'); ?>">
         </div>
      </div>
      <div class="col-md-2">
         <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="number" class="form-control" name="num_coupons" required value="0">
            <p style="margin-top: 10px;">* 0 là không giới hạn số lượng</p>
         </div>
      </div>
      <div class="col-md-2 mb-3">
                  <label class="form-label">Áp dụng</label>
                  <select class="select2 form-control mb-3 custom-select" name="category_type">
                     <option value="all">Tổng đơn</option>
                     <option value="product">Áp dụng sản phẩm</option>
                  </select>
               </div>
               <div class="col-md-2 mb-3">
                  <label class="form-label">Trạng thái</label>
                  <select class="select2 form-control mb-3 custom-select" name="status">
                     <option value="1">Hoạt động</option>
                     <option value="0">Kết thúc</option>
                  </select>
               </div>
   </div>

   <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm khuyến mãi</button>
</div>
</div>
</form>