<?php $seo = json_decode($view_page['seo_'.$lang]); ?>
<form action="<?= base_url('page-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_page" value="<?= $view_page['id']; ?>">
   <div class="row">
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung chuyên mục</h6>
               <div class="mb-3">
                  <label class="form-label">Tên chuyên mục</label>
                  <input type="text" class="form-control" name="name_<?= $lang; ?>" id="name" onkeyup="ChangeToSlug();" oninput="checkname()" value="<?= $view_page['name_page_'.$lang] ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control"<?php if(strlen($view_page['url_'.$lang]) == 0){ echo ' id="slug" '; } ?>name="url_<?= $lang; ?>" value="<?= $view_page['url_'.$lang] ?>">
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h6 class="card-title">Cài đặt chuyên mục</h6>
            </div>
            <div class="card-body">
               <div class="mb-3">
                  <label class="form-label">Tên tin tức hiển thị Social</label>
                  <input type="text" class="form-control" name="title_<?= $lang; ?>"<?php if(strlen($seo->{'title_'.$lang}) == 0){ echo ' id="title" '; } ?>value="<?= $seo->{'title_'.$lang}; ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Mô tả ngắn</label>
                  <textarea class="form-control" rows="5" name="description_<?= $lang; ?>"><?= $seo->{'description_'.$lang}; ?></textarea>
               </div>
               <div class="mb-3">
                  <label class="form-label">Từ khóa</label>
                  <input type="text" class="form-control" name="keywords_<?= $lang; ?>" value="<?= $seo->{'keywords_'.$lang}; ?>">
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa thông tin</button>
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Danh mục</h6>
               <div class="col-md-12 mb-3">
                  <label class="my-3">Trạng thái</label>
                  <select class="select2 form-control mb-3 custom-select" name="status">
                     <option value="1"<?php if($view_page['status'] == 1){ echo ' selected'; } ?>>Công khai</option>
                     <option value="0"<?php if($view_page['status'] == 0){ echo ' selected'; } ?>>Bản nháp</option>
                  </select>
               </div>
               
            </div>
         </div>
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Hình ảnh đại diện</h6>
               <div class="mb-3">
                  <label class="form-label">Ảnh website</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgwebsite_<?= $lang; ?>" type="text" size="60" class="form-control" value="<?= $seo->{'imgwebsite_'.$lang}; ?>">
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
                        <input id="xFilePath" name="imgsocial_<?= $lang; ?>" type="text" size="60" class="form-control" value="<?= $seo->{'imgsocial_'.$lang}; ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer();" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
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