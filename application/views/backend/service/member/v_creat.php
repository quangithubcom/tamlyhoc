<form action="<?= base_url('member-add?lang='.$lang); ?>" method="post">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung thành viên<?php $this->MainModel->checkLang($lang); ?></h6>
         <div class="row">
            <div class="col-md-12 mb-3">
               <label class="form-label">Tên thành viên</label>
               <input type="text" class="form-control" name="name_member" required>
            </div>
            <div class="col-md-12 mb-3">
               <label class="form-label">Chức vụ</label>
               <input type="text" class="form-control" name="position_member" required>
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label">Địa chỉ chi tiết</label>
               <input type="text" class="form-control" name="address_member">
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label">Kinh nghiệm</label>
               <input type="text" class="form-control" name="ex_member">
            </div>
            <div class="col-md-12 mb-3">
               <label class="form-label">Ảnh Thành viên</label>
               <div class="row">
                  <div class="col-md-8">
                     <input id="xFilePath1" name="img_member" type="text" class="form-control">
                  </div>
                  <div class="col-md-4">
                     <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                  </div>
               </div>
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label">Email</label>
               <input type="text" class="form-control" name="email_member">
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label">Số điện thoại</label>
               <input type="text" class="form-control" name="phone_member">
            </div>
            <div class="col-md-12 mb-3">
                  <label class="form-label">Giới thiệu chung</label>
                  <textarea id="textarea" class="form-control" name="content_member"></textarea>
                  <script>
                     CKEDITOR.replace('content_member');
                  </script>
               </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label">Tên Mạng xã hội 1</label>
                     <input type="text" class="form-control" name="name_social_1">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label">Icon mạng xã hội 1</label>
                     <input type="text" class="form-control" name="icon_social_1">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Link mạng xã hội 1</label>
                     <input type="text" class="form-control" name="link_social_1">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label">Tên Mạng xã hội 2</label>
                     <input type="text" class="form-control" name="name_social_2">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label">Icon mạng xã hội 2</label>
                     <input type="text" class="form-control" name="icon_social_2">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Link mạng xã hội 2</label>
                     <input type="text" class="form-control" name="link_social_2">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label">Tên Mạng xã hội 3</label>
                     <input type="text" class="form-control" name="name_social_3">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label">Icon mạng xã hội 3</label>
                     <input type="text" class="form-control" name="icon_social_3">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Link mạng xã hội 3</label>
                     <input type="text" class="form-control" name="link_social_3">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label">Tên Mạng xã hội 4</label>
                     <input type="text" class="form-control" name="name_social_4">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label">Icon mạng xã hội 4</label>
                     <input type="text" class="form-control" name="icon_social_4">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Link mạng xã hội 4</label>
                     <input type="text" class="form-control" name="link_social_4">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label">Tên Mạng xã hội 5</label>
                     <input type="text" class="form-control" name="name_social_5">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label">Icon mạng xã hội 5</label>
                     <input type="text" class="form-control" name="icon_social_5">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Link mạng xã hội 5</label>
                     <input type="text" class="form-control" name="link_social_5">
                  </div>
               </div>
            </div>
            <div class="col-md-12 mb-3">
               <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm thành viên</button>
            </div>
         </div>
      </div>
   </div>
</form>