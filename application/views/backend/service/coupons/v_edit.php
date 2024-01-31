<form action="<?= base_url('coupons-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_coupons" value="<?= $id_coupons; ?>">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung khuyến mãi<?php $this->MainModel->checkLang($lang); ?></h6>
         <?php if($lang != 'vn'){ ?>
         <p>(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mãu từ dữ liệu tiếng việt</p>
         <?php } ?>
         <div class="row">
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">Tên chương trình khuyến mãi</label>
                  <input type="text" class="form-control" name="name_coupons" value="<?= $view_coupons['name_coupons']; ?>" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">Mã khuyến mãi</label>
                  <input type="text" class="form-control" name="code_coupons" value="<?= $view_coupons['code_coupons']; ?>" disabled>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label class="form-label">Trừ khuyến mại</label>
                  <div class="input-group">
                    <div class="input-group-text">VNĐ</div>
                    <input type="number" class="form-control" name="discount_coupons_vnd" value="<?= $view_coupons['discount_coupons_vnd']; ?>">
                 </div>
              </div>
           </div>
           <div class="col-md-6">
            <div class="mb-3">
               <label class="form-label">Trừ khuyến mại</label>
               <div class="input-group">
                 <div class="input-group-text">%</div>
                 <input type="number" class="form-control" name="discount_coupons_percent" value="<?= $view_coupons['discount_coupons_percent']; ?>">
              </div>
           </div>
        </div>
        <div class="col-md-12">
           <p style="color:red;">*Lưu ý: Chỉ áp dụng 1 hình thức khuyến mại cho 1 chương trình ưu tiên từ trừ VNĐ rồi tới khuyến mãi %.</p>
        </div>
        <div class="col-md-3">
         <div class="mb-3">
            <label class="form-label">Thời gian bắt đầu</label>
            <input type="date" class="form-control" name="time_start" value="<?= date("Y-m-d" , $view_coupons['time_start']); ?>">
         </div>
      </div>
      <div class="col-md-3">
         <div class="mb-3">
            <label class="form-label">Thời gian kết thúc</label>
            <input type="date" class="form-control" name="time_end" value="<?= date("Y-m-d" , $view_coupons['time_end']); ?>">
         </div>
      </div>
      <div class="col-md-2">
         <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="number" class="form-control" name="num_coupons" required  value="<?= $view_coupons['num_coupons']; ?>">
            <p style="margin-top: 10px;">* 0 là không giới hạn số lượng</p>
         </div>
      </div>
      <div class="col-md-2 mb-3">
                  <label class="form-label">Áp dụng</label>
                  <select class="select2 form-control mb-3 custom-select" name="category_type">
                     <option value="all"<?php if($view_coupons['category_type'] == 'all'){ echo ' selected'; } ?>>Tổng đơn</option>
                     <option value="product"<?php if($view_coupons['category_type'] == 'product'){ echo ' selected'; } ?>>Áp dụng sản phẩm</option>
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
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa khuyến mãi</button>
      </div>
   </div>
</form>