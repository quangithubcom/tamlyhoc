<?php $info = json_decode($view_faps['text_faps_'.$lang]); ?>
<?php $info_vn = json_decode($view_faps['text_faps_vn']); ?>
<form action="<?= base_url('faps-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_faps" value="<?= $id_faps; ?>">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung Faps<?php $this->MainModel->checkLang($lang); ?></h6>
         <?php if($lang != 'vn'){ ?>
         <p>(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mãu từ dữ liệu tiếng việt</p>
         <?php } ?>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'question_faps'})){ echo 'Câu hỏi Faps'; }else{ echo '<span style="color:red">Câu hỏi Faps</span>';} ?></label>
            <textarea class="form-control" name="question_faps"><?php if(isset($info->{'question_faps'})){ echo $info->{'question_faps'};}else{ echo $info_vn->{'question_faps'};} ?></textarea>
         </div>
         <div class="mb-3">
            <label class="form-label"><?php if(isset($info->{'answer_faps'})){ echo 'Trả lời Faps'; }else{ echo '<span style="color:red">Trả lời Faps</span>';} ?></label>
            <textarea class="form-control" name="answer_faps"><?php if(isset($info->{'answer_faps'})){ echo $info->{'answer_faps'};}else{ echo $info_vn->{'answer_faps'};} ?></textarea>
         </div>
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa địa chỉ</button>
      </div>
   </div>
</form>