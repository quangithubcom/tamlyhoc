<form action="<?= base_url('user-update'); ?>" method="post">
   <input type="hidden" name="id_user" value="<?= $view_user['id']; ?>">
   <div class="row">
      <div class="col-md-12 mb-3">
         <a href="<?= base_url('user'); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách người dùng</a>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Thông tin người dùng</h6>
               <div class="mb-3">
                  <label class="form-label">Tên Hiển thị</label>
                  <input type="text" class="form-control" name="name" value="<?= $view_user['name']; ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Tên đăng nhập</label>
                  <input type="text" class="form-control" name="username" disabled value="<?= $view_user['username']; ?>" required>
               </div>
               <div class="mb-3">
                <button class="btn btn-sm btn-primary" type="submit" name="update"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
             </div>
            </div>
         </div>
   </div>
   </div>
</form>