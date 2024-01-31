<?php $info = json_decode($view_member['text_member_'.$lang]); ?>
<?php $info_vn = json_decode($view_member['text_member_vn']); ?>
<form action="<?= base_url('member-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_member" value="<?= $id_member; ?>">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung thành viên<?php $this->MainModel->checkLang($lang); ?></h6>
         <?php if($lang != 'vn'){ ?>
         <p>(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mãu từ dữ liệu tiếng việt</p>
         <?php } ?>
         <div class="row">
            <div class="col-md-12 mb-3">
               <label class="form-label"><?php if(isset($info->{'name_member'})){ echo 'Tên thành viên'; }else{ echo '<span style="color:red">Tên thành viên</span>';} ?></label>
               <input type="text" class="form-control" name="name_member" value="<?php if(isset($info->{'name_member'})){ echo $info->{'name_member'};}else{ echo $info_vn->{'name_member'};} ?>" required>
            </div>
            <div class="col-md-12 mb-3">
               <label class="form-label"><?php if(isset($info->{'position_member'})){ echo 'Chức vụ'; }else{ echo '<span style="color:red">Chức vụ</span>';} ?></label>
               <input type="text" class="form-control" name="position_member" value="<?php if(isset($info->{'position_member'})){ echo $info->{'position_member'};}else{ echo $info_vn->{'position_member'};} ?>" required>
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label"><?php if(isset($info->{'address_member'})){ echo 'Địa chỉ chi tiết'; }else{ echo '<span style="color:red">Địa chỉ chi tiết</span>';} ?></label>
               <input type="text" class="form-control" name="address_member" value="<?php if(isset($info->{'address_member'})){ echo $info->{'address_member'};}else{ echo $info_vn->{'address_member'};} ?>">
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label"><?php if(isset($info->{'address_member'})){ echo 'Kinh Nghiệm'; }else{ echo '<span style="color:red">Kinh Nghiệm</span>';} ?></label>
               <input type="text" class="form-control" name="address_member" value="<?php if(isset($info->{'address_member'})){ echo $info->{'address_member'};}else{ echo $info_vn->{'address_member'};} ?>">
            </div>
            <div class="col-md-12 mb-3">
               <label class="form-label"><?php if(isset($info->{'img_member'})){ echo 'Ảnh Thành viên'; }else{ echo '<span style="color:red">Ảnh Thành viên</span>';} ?></label>
               <div class="row">
                  <div class="col-md-8">
                     <input id="xFilePath1" name="img_member" type="text" class="form-control" value="<?php if(isset($info->{'img_member'})){ echo $info->{'img_member'};}else{ echo $info_vn->{'img_member'};} ?>">
                  </div>
                  <div class="col-md-4">
                     <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                  </div>
               </div>
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label"><?php if(isset($info->{'email_member'})){ echo 'Email'; }else{ echo '<span style="color:red">Email</span>';} ?></label>
               <input type="text" class="form-control" name="email_member" value="<?php if(isset($info->{'email_member'})){ echo $info->{'email_member'};}else{ echo $info_vn->{'email_member'};} ?>">
            </div>
            <div class="col-md-6 mb-3">
               <label class="form-label"><?php if(isset($info->{'phone_member'})){ echo 'Số điện thoại'; }else{ echo '<span style="color:red">Số điện thoại</span>';} ?></label>
               <input type="text" class="form-control" name="phone_member" value="<?php if(isset($info->{'phone_member'})){ echo $info->{'phone_member'};}else{ echo $info_vn->{'phone_member'};} ?>">
            </div>
            <div class="col-md-12 mb-3">
                  <label class="form-label"><?php if(isset($info->{'phone_member'})){ echo 'Giới thiệu chung'; }else{ echo '<span style="color:red">Giới thiệu chung</span>';} ?></label>
                  <textarea id="textarea" class="form-control" name="content_member"><?php if(isset($info->{'content_member'})){ echo $info->{'content_member'};}else{ echo $info_vn->{'content_member'};} ?></textarea>
                  <script>
                     CKEDITOR.replace('content_member');
                  </script>
               </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label"><?php if(isset($info->{'name_social_1'})){ echo 'Tên Mạng xã hội 1'; }else{ echo '<span style="color:red">Tên Mạng xã hội 1</span>';} ?></label>
                     <input type="text" class="form-control" name="name_social_1" value="<?php if(isset($info->{'name_social_1'})){ echo $info->{'name_social_1'};}else{ echo $info_vn->{'name_social_1'};} ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label"><?php if(isset($info->{'icon_social_1'})){ echo 'Icon mạng xã hội 1'; }else{ echo '<span style="color:red">Icon mạng xã hội 1</span>';} ?></label>
                     <input type="text" class="form-control" name="icon_social_1" value="<?php if(isset($info->{'icon_social_1'})){ echo $info->{'icon_social_1'};}else{ echo $info_vn->{'icon_social_1'};} ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label"><?php if(isset($info->{'link_social_1'})){ echo 'Link mạng xã hội 1'; }else{ echo '<span style="color:red">Link mạng xã hội 1</span>';} ?></label>
                     <input type="text" class="form-control" name="link_social_1" value="<?php if(isset($info->{'link_social_1'})){ echo $info->{'link_social_1'};}else{ echo $info_vn->{'link_social_1'};} ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label"><?php if(isset($info->{'name_social_2'})){ echo 'Tên Mạng xã hội 2'; }else{ echo '<span style="color:red">Tên Mạng xã hội 2</span>';} ?></label>
                     <input type="text" class="form-control" name="name_social_2" value="<?php if(isset($info->{'name_social_2'})){ echo $info->{'name_social_2'};}else{ echo $info_vn->{'name_social_2'};} ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label"><?php if(isset($info->{'icon_social_2'})){ echo 'Icon mạng xã hội 2'; }else{ echo '<span style="color:red">Icon mạng xã hội 2</span>';} ?></label>
                     <input type="text" class="form-control" name="icon_social_2" value="<?php if(isset($info->{'icon_social_2'})){ echo $info->{'icon_social_2'};}else{ echo $info_vn->{'icon_social_2'};} ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label"><?php if(isset($info->{'link_social_2'})){ echo 'Link mạng xã hội 2'; }else{ echo '<span style="color:red">Link mạng xã hội 2</span>';} ?></label>
                     <input type="text" class="form-control" name="link_social_2" value="<?php if(isset($info->{'link_social_2'})){ echo $info->{'link_social_2'};}else{ echo $info_vn->{'link_social_2'};} ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label"><?php if(isset($info->{'name_social_3'})){ echo 'Tên Mạng xã hội 3'; }else{ echo '<span style="color:red">Tên Mạng xã hội 3</span>';} ?></label>
                     <input type="text" class="form-control" name="name_social_3" value="<?php if(isset($info->{'name_social_3'})){ echo $info->{'name_social_3'};}else{ echo $info_vn->{'name_social_3'};} ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label"><?php if(isset($info->{'icon_social_3'})){ echo 'Icon mạng xã hội 3'; }else{ echo '<span style="color:red">Icon mạng xã hội 3</span>';} ?></label>
                     <input type="text" class="form-control" name="icon_social_3" value="<?php if(isset($info->{'icon_social_3'})){ echo $info->{'icon_social_3'};}else{ echo $info_vn->{'icon_social_3'};} ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label"><?php if(isset($info->{'link_social_3'})){ echo 'Link mạng xã hội 3'; }else{ echo '<span style="color:red">Link mạng xã hội 3</span>';} ?></label>
                     <input type="text" class="form-control" name="link_social_3" value="<?php if(isset($info->{'link_social_3'})){ echo $info->{'link_social_3'};}else{ echo $info_vn->{'link_social_3'};} ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label"><?php if(isset($info->{'name_social_4'})){ echo 'Tên Mạng xã hội 4'; }else{ echo '<span style="color:red">Tên Mạng xã hội 4</span>';} ?></label>
                     <input type="text" class="form-control" name="name_social_4" value="<?php if(isset($info->{'name_social_4'})){ echo $info->{'name_social_4'};}else{ echo $info_vn->{'name_social_4'};} ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label"><?php if(isset($info->{'icon_social_4'})){ echo 'Icon mạng xã hội 4'; }else{ echo '<span style="color:red">Icon mạng xã hội 4</span>';} ?></label>
                     <input type="text" class="form-control" name="icon_social_4" value="<?php if(isset($info->{'icon_social_4'})){ echo $info->{'icon_social_4'};}else{ echo $info_vn->{'icon_social_4'};} ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label"><?php if(isset($info->{'link_social_4'})){ echo 'Link mạng xã hội 4'; }else{ echo '<span style="color:red">Link mạng xã hội 4</span>';} ?></label>
                     <input type="text" class="form-control" name="link_social_4" value="<?php if(isset($info->{'link_social_4'})){ echo $info->{'link_social_4'};}else{ echo $info_vn->{'link_social_4'};} ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-2 mb-3">
                     <label class="form-label"><?php if(isset($info->{'name_social_5'})){ echo 'Tên Mạng xã hội 5'; }else{ echo '<span style="color:red">Tên Mạng xã hội 5</span>';} ?></label>
                     <input type="text" class="form-control" name="name_social_5" value="<?php if(isset($info->{'name_social_5'})){ echo $info->{'name_social_5'};}else{ echo $info_vn->{'name_social_5'};} ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="form-label"><?php if(isset($info->{'icon_social_5'})){ echo 'Icon mạng xã hội 5'; }else{ echo '<span style="color:red">Icon mạng xã hội 5</span>';} ?></label>
                     <input type="text" class="form-control" name="icon_social_5" value="<?php if(isset($info->{'icon_social_5'})){ echo $info->{'icon_social_5'};}else{ echo $info_vn->{'icon_social_5'};} ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label"><?php if(isset($info->{'link_social_5'})){ echo 'Link mạng xã hội 5'; }else{ echo '<span style="color:red">Link mạng xã hội 5</span>';} ?></label>
                     <input type="text" class="form-control" name="link_social_5" value="<?php if(isset($info->{'link_social_5'})){ echo $info->{'link_social_5'};}else{ echo $info_vn->{'link_social_5'};} ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-12 mb-3">
               <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa thành viên</button>
            </div>
         </div>
      </div>
   </div>
</form>