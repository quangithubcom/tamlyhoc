<form action="<?= base_url('faps-add?lang='.$lang); ?>" method="post">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung Faps<?php $this->MainModel->checkLang($lang); ?></h6>
         <div class="mb-3">
            <label class="form-label">Câu hỏi Faps</label>
            <textarea class="form-control" name="question_faps"></textarea>
         </div>
         <div class="mb-3">
            <label class="form-label">Trả lời Faps</label>
            <textarea class="form-control" name="answer_faps"></textarea>
         </div>
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm Faps</button>
      </div>
   </div>
</form>