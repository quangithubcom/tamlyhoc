<?php $info_vn = json_decode($view_feedback['text_feedback_vn']); ?>
<?php $info = json_decode($view_feedback['text_feedback_'.$lang]); ?>
<?php 
                if(isset($info->{'img_feedback'})){
                    $img_feedback = $info->{'img_feedback'};
                }else{
                    $img_feedback = 'no-image';
                } 
            ?>
<form action="<?= base_url('feedback-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_feedback" value="<?= $id_feedback; ?>">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung nhận xét<?php $this->MainModel->checkLang($lang); ?></h6>
         <?php if($lang != 'vn'){ ?>
         <p>(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mẫu từ dữ liệu tiếng việt</p>
         <?php } ?>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'name_feedback'})){ echo 'Tên người nhận xét'; }else{ echo '<span style="color:red">Tên người nhận xét</span>';} ?></label>
            <input type="text" class="form-control" name="name_feedback" value="<?php if(isset($info->{'name_feedback'})){ echo $info->{'name_feedback'};}else{ echo $info_vn->{'name_feedback'};} ?>">
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'img_feedback'})){ echo 'Ảnh đại diện'; }else{ echo '<span style="color:red">Ảnh đại diện</span>';} ?>Ảnh đại diện</label>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <img src="<?php get_img($img_feedback); ?>" width="200px">
               </div>
               <div class="col-md-8">
                  <input id="xFilePath1" name="img_feedback" type="text" size="60" class="form-control" value="<?php if(isset($info->{'img_feedback'})){ echo $info->{'img_feedback'};}else{ echo $info_vn->{'img_feedback'};} ?>">
               </div>
               <div class="col-md-4">
                  <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
               </div>
            </div>
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'content_feedback'})){ echo 'Nội dung nhận xét'; }else{ echo '<span style="color:red">Nội dung nhận xét</span>';} ?>Nội dung nhận xét</label>
            <textarea class="form-control" name="content_feedback"><?php if(isset($info->{'content_feedback'})){ echo $info->{'content_feedback'};}else{ echo $info_vn->{'content_feedback'};} ?></textarea>
         </div>
         
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa địa chỉ</button>
      </div>
   </div>
</form>