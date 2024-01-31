<?php $info = json_decode($view_location['text_location_'.$lang]); ?>
<?php $info_vn = json_decode($view_location['text_location_vn']); ?>
<form action="<?= base_url('location-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_location" value="<?= $id_location; ?>">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung địa chỉ<?php $this->MainModel->checkLang($lang); ?></h6>
         <?php if($lang != 'vn'){ ?>
         <p>(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mãu từ dữ liệu tiếng việt</p>
         <?php } ?>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'name_location'})){ echo 'Tên địa chỉ'; }else{ echo '<span style="color:red">Tên địa chỉ</span>';} ?></label>
            <input type="text" class="form-control" name="name_location" value="<?php if(isset($info->{'name_location'})){ echo $info->{'name_location'};}else{ echo $info_vn->{'name_location'};} ?>" required>
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'link_map_location'})){ echo 'Link Map '; }else{ echo '<span style="color:red">Link Map </span>';} ?>(<a href="" class="text-primary" target="_blank"><i class="fa-solid fa-circle-info"></i> Hướng dẫn lấy link map</a>)</label>
            <textarea class="form-control" name="link_map_location"><?php if(isset($info->{'link_map_location'})){ echo $info->{'link_map_location'};}else{ echo $info_vn->{'link_map_location'};} ?></textarea>
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'name_detail_location'})){ echo 'Địa chỉ chi tiết'; }else{ echo '<span style="color:red">Địa chỉ chi tiết</span>';} ?></label>
            <input type="text" class="form-control" name="name_detail_location" value="<?php if(isset($info->{'name_detail_location'})){ echo $info->{'name_detail_location'};}else{ echo $info_vn->{'name_detail_location'};} ?>">
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'email_location'})){ echo 'Email'; }else{ echo '<span style="color:red">Email</span>';} ?></label>
            <input type="text" class="form-control" name="email_location" value="<?php if(isset($info->{'email_location'})){ echo $info->{'email_location'};}else{ echo $info_vn->{'email_location'};} ?>">
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'phone_location'})){ echo 'Số điện thoại'; }else{ echo '<span style="color:red">Số điện thoại</span>';} ?></label>
            <input type="text" class="form-control" name="phone_location" value="<?php if(isset($info->{'phone_location'})){ echo $info->{'phone_location'};}else{ echo $info_vn->{'phone_location'};} ?>">
         </div>
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa địa chỉ</button>
      </div>
   </div>
</form>