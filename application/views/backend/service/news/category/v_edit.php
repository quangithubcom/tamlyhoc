<?php $seo = json_decode($view_category['seo']); ?>
<?php $setting = json_decode($view_category['category_setting']); ?>
<?php $view_category_father = $this->MainModel->viewId('tb_category',$id_category); ?>
<div class="row">
   <div class="col-md-12 mb-3 mt-3">
         <a href="<?= base_url('category?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách chuyên mục</a>
      </div>
</div>
<form action="<?= base_url('category-update?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_category_father" value="<?= $id_category; ?>">
   <input type="hidden" name="id_category" value="<?= $view_category['id']; ?>">
   <div class="row">
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung chuyên mục</h6>
               <div class="mb-3">
                  <label class="form-label">Tên chuyên mục</label>
                  <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug();" oninput="checkname()" value="<?= $view_category['name_category'] ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control"<?php if(strlen($view_category['url_category']) == 0){ echo ' id="slug"'; } ?> name="url" value="<?= $view_category['url_category'] ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung</label>
                  <textarea id="textarea" class="form-control" name="content"><?= $view_category['content_category'] ?></textarea>
                  <script>
                     CKEDITOR.replace('content');
                  </script>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h6 class="card-title">Cài đặt chuyên mục</h6>
            </div>
            <div class="card-body">
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Tối ưu Seo</span>    
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Settings</span>    
                     </a>
                  </li>
               </ul>
               <div class="tab-content p-3 text-muted">
                  <div class="tab-pane active" id="home" role="tabpanel">
                     <div class="mb-3">
                        <label class="form-label">Tên tin tức hiển thị Social</label>
                        <input type="text" class="form-control" name="title"<?php if(strlen($view_category['url_category']) == 0){ echo ' id="title"'; } ?> value="<?= $seo->{'title'} ?>" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Mô tả ngắn</label>
                        <textarea class="form-control" rows="5" name="description"><?= $seo->{'description'} ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Từ khóa</label>
                        <input type="text" class="form-control" name="keywords" value="<?= $seo->{'keywords'} ?>">
                     </div>
                  </div>
                  <div class="tab-pane" id="settings" role="tabpanel">
                     <div class="mb-3">
                        <label class="form-label">Ảnh Background</label>
                        <div class="row">
                           <div class="col-md-8">
                              <input id="xFilePath2" name="imgbackground" type="text" size="60" class="form-control" value="<?= $setting->{'imgbackground'} ?>">
                           </div>
                           <div class="col-md-4">
                              <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer2();" />
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Màu sắc hiển thị Background</label>
                        <input type="color" name="color_background" class="form-control form-control-color" value="<?= $setting->{'color_background'} ?>">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Màu sắc chữ</label>
                        <input type="color" name="color_text" class="form-control form-control-color" value="<?= $setting->{'color_text'} ?>">
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Danh mục</h6>
               <div class="col-md-12 mb-3">
                  <label class="my-3">Trạng thái</label>
                  <select class="select2 form-control mb-3 custom-select" name="status">
                     <option value="1">Công khai</option>
                     <option value="0">Bản nháp</option>
                  </select>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="form-label">Thư mục cha</label>
                  <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_father" required>
                     <option value="0" <?php if($view_category_father['id_father'] == 0){ echo 'selected'; } ?>>Thư mục cha</option>
                     <?= $this->CategoryModel->getFatherOptionSelect(0,$id_category,$view_category_father['id_father'],$category_type,$type_template,$lang); ?>
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
                     <?php foreach ($list_template as $value): ?>
                        <option value="<?= $value['id']; ?>" <?php if($value['id'] == $view_category_father['id_template']){ echo 'selected'; } ?>><b><?= $value['name_template']; ?></b></option>
                     <?php endforeach ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label class="form-label">Ảnh website</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgwebsite" type="text" size="60" class="form-control" value="<?= $seo->{'imgwebsite'} ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Ảnh Socail</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath" name="imgsocial" type="text" size="60" class="form-control" value="<?= $seo->{'imgsocial'} ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer();" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <button class="btn btn-primary btn-sm" type="submit" name="update">Chỉnh sửa chuyên mục</button>
      </div>
   </div>
</form>
<script type="text/javascript">
   function checkname() {
    var name = document.getElementById('name').value;
       // Thêm nội dung vào thẻ title và ID ggtitle
    document.getElementById('title').value = name;
 }
</script>