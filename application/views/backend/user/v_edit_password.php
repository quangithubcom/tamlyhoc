<form action="<?= base_url('change-password'); ?>" method="post">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Thay đổi thông tin mật khẩu</h6>
               <div class="mb-3">
                  <label class="form-label">Nhập mật khẩu cũ</label>
                  <input type="text" class="form-control" name="re_old_password" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nhập mật khẩu mới</label>
                  <input type="text" class="form-control" name="new_password" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nhập lại mật khẩu mới</label>
                  <input type="text" class="form-control" name="re_new_password" required>
               </div>
               <div class="mb-3">
                <button class="btn btn-sm btn-primary" type="submit" name="add"><i class="fa-solid fa-arrow-right-from-bracket"></i> Thay đổi mật khẩu</button>
             </div>
            </div>
         </div>
   </div>
   </div>
</form>