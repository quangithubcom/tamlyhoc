<form action="<?= base_url('location-add?lang='.$lang); ?>" method="post">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung địa chỉ<?php $this->MainModel->checkLang($lang); ?></h6>
         <div class="mb-3">
            <label class="form-label">Tên địa chỉ</label>
            <input type="text" class="form-control" name="name_location" required>
         </div>
         <div class="mb-3">
            <label class="form-label">Link Map (<a href="" class="text-primary" target="_blank"><i class="fa-solid fa-circle-info"></i> Hướng dẫn lấy link map</a>)</label>
            <textarea class="form-control" name="link_map_location"></textarea>
         </div>
         <div class="mb-3">
            <label class="form-label">Địa chỉ chi tiết</label>
            <input type="text" class="form-control" name="name_detail_location">
         </div>
         <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email_location">
         </div>
         <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone_location">
         </div>
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm địa chỉ</button>
      </div>
   </div>
</form>