<form action="<?= base_url('posting-add'); ?>" method="post" enctype="multipart/form-data">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung</h6>
         <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name_user" value="<?php if(isset($_GET['name_user'])){ echo $_GET['name_user']; }else{ echo $this->session->userdata('LoggedIn')['name']; } ?>">
         </div>
         <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone_user" value="<?php if(isset($_GET['phone_user'])){ echo $_GET['phone_user']; } ?>">
         </div>
         <div class="mb-3">
            <label class="form-label">Email (Nhận thông báo)</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('LoggedIn')['email']; ?>" disabled>
         </div>
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