<form action="<?= base_url('menus-update?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_menu" value="<?= $view_menu['id']; ?>">
   <div class="row">
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung chuyên mục</h6>
               <div class="mb-3">
                  <label class="form-label">Tên chuyên mục</label>
                  <input type="text" class="form-control" name="name_food" value="<?= $view_menu['name_food']; ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Mô tả ngắn</label>
                  <textarea id="textarea" class="form-control" name="content_food"><?= $view_menu['content_food']; ?></textarea>
               </div>
               <div class="mb-3">
                  <label class="form-label">Giá bán</label>
                  <div class="input-group">
                     <div class="input-group-text">$</div>
                    <input type="text" class="form-control" name="price_food" value="<?= $view_menu['price_food']; ?>" required>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="col-md-3 grid-margin stretch-card">
      <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Update Menu</button>
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Danh mục</h6>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="my-3">Trạng thái</label>
                  <select class="select2 form-control mb-3 custom-select" name="status">
                     <option value="1"<?php if($view_menu['status'] == 1){ echo ' selected'; } ?>>Công khai</option>
                     <option value="0"<?php if($view_menu['status'] == 0){ echo ' selected'; } ?>>Bản nháp</option>
                  </select>
               </div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="form-label">Thư mục cha</label>
               <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_father" required>
                  <option value="0"<?php if($view_menu['id_father'] == 0){ echo ' selected'; } ?>>Thư mục cha</option>
                  <?= $this->CategoryModel->getFatherOptionSelect(0,10,$view_menu['id_father'],$category_type,$type_template,$lang); ?>
               </select>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Giao diện - Hình ảnh</h6>
            <div class="mb-3">
               <label class="form-label">Danh sách Template</label>
               <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_template" required>
                  <option value="22"<?php if($view_menu['id_template'] == 22){ echo ' selected'; } ?>>Không có giao diện</option>
                  <?php foreach ($list_template as $value): ?>
                     <option value="<?= $value['id']; ?>"<?php if($value['id'] == $view_menu['id_template']){ echo ' selected'; } ?>><b><?= $value['name_template']; ?></b></option>
                  <?php endforeach ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">Ảnh website</label>
               <div class="row">
                  <div class="col-md-8">
                     <input id="xFilePath1" name="img_food" type="text" size="60" value="<?= $view_menu['img_food']; ?>" class="form-control">
                  </div>
                  <div class="col-md-4">
                     <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</form>