<form action="page-add?lang=<?= $lang; ?>" method="post">
   <div class="row">
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung chuyên mục</h6>
               <div class="mb-3">
                  <label class="form-label">Tên chuyên mục</label>
                  <input type="text" class="form-control" name="name_<?= $lang; ?>" id="name" onkeyup="ChangeToSlug();" oninput="checkname()" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control" id="slug" name="url_<?= $lang; ?>">
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
                  <input type="text" class="form-control" name="title_<?= $lang; ?>" id="title" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Mô tả ngắn</label>
                  <textarea class="form-control" rows="5" name="description_<?= $lang; ?>"></textarea>
               </div>
               <div class="mb-3">
                  <label class="form-label">Từ khóa</label>
                  <input type="text" class="form-control" name="keywords_<?= $lang; ?>">
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm thông tin</button>
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
               
            </div>
         </div>
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Hình ảnh đại diện</h6>
               <div class="mb-3">
                  <label class="form-label">Ảnh website</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgwebsite_<?= $lang; ?>" type="text" size="60" class="form-control">
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
                        <input id="xFilePath" name="imgsocial_<?= $lang; ?>" type="text" size="60" class="form-control">
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