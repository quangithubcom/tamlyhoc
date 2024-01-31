<form action="<?= base_url('posting-add'); ?>" method="post" enctype="multipart/form-data">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung</h6>
         <div class="mb-3">
            <label class="form-label">Tên bài viết</label>
            <textarea class="form-control" name="name" required><?php if(isset($_GET['name'])){ echo $_GET['name']; } ?></textarea>
         </div>
         <div class="mb-3">
            <label class="form-label">Tóm tắt</label>
            <textarea class="form-control" name="description" rows="6" required><?php if(isset($_GET['description'])){ echo $_GET['description']; } ?></textarea>
         </div>
         <div class="mb-3">
            <label class="form-label">File bài viết (<span style="color:red">* Nội dung chấp nhận doc,docx</span>)</label>
            <input type="file" class="form-control" name="file_post" required>
         </div>
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="send">Gửi bài viết</button>
      </div>
   </div>
</form>