<form action="<?= base_url('menu-backend-update'); ?>" method="post">
   <input type="hidden" name="id_menu_backend" value="<?= $view_menu_backend['id']; ?>">
   <div class="row">
      <div class="col-md-12 mb-3">
         <a href="<?= base_url('menu-backend'); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách Menu</a>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Chỉnh sửa Thông tin Menu</h6>
               <div class="mb-3">
                  <label class="form-label">Icon Font Awesome(<span>Menu con không cần Icon</span>)</label>
                  <input type="text" class="form-control" name="icon_font" value="<?= $view_menu_backend['icon_font']; ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Tên Menu</label>
                  <input type="text" class="form-control" name="name_menu" value="<?= $view_menu_backend['name_menu']; ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Link Menu</label>
                  <input type="text" class="form-control" name="link_menu" value="<?= $view_menu_backend['link_menu']; ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Danh mục chính</label>
                  <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="father">
                     <option value="0"<?php if($view_menu_backend['father'] == 0){ echo ' selected'; } ?>>Danh mục cha</option>
                     <?= $list_father_menu; ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label class="form-label">Chức năng</label>
                  <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="menu_function">
                     <option value="0"<?php if($view_menu_backend['menu_function'] == 0){ echo ' selected'; } ?>>Menu hiển thị</option>
                     <option value="1"<?php if($view_menu_backend['menu_function'] == 1){ echo ' selected'; } ?>>Menu chức năng</option>
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