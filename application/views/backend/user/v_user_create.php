<form action="<?= base_url('user-add'); ?>" method="post">
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
                  <input type="text" class="form-control" name="name" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Tên đăng nhập</label>
                  <input type="text" class="form-control" name="username" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="text" class="form-control" name="password" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Vai trò</label>
                  <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_decentralization">
                     <?php foreach ($list_decentralization_group as $decentralization_group): ?>
                        <option value="<?= $decentralization_group['id']; ?>"><?= $decentralization_group['name_decentralization']; ?></option>
                     <?php endforeach ?>
                  </select>
               </div>
               <div class="mb-3">
                <button class="btn btn-sm btn-primary" type="submit" name="add" value="update_all_close"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
             </div>
            </div>
         </div>
   </div>
   </div>
</form>