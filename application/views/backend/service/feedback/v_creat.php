<form action="<?= base_url('feedback-add?lang='.$lang); ?>" method="post">
   <div class="card mt-3">
      <div class="card-body">
         <h6 class="card-title">Nội dung nhận xét<?php $this->MainModel->checkLang($lang); ?></h6>
         <div class="mb-3">
            <label class="form-label">Tên người nhận xét</label>
            <input type="text" class="form-control" name="name_feedback">
         </div>
         <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <div class="row">
               <div class="col-md-8">
                  <input id="xFilePath1" name="img_feedback" type="text" size="60" class="form-control">
               </div>
               <div class="col-md-4">
                  <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
               </div>
            </div>
         </div>
         <div class="mb-3">
            <label class="form-label">Nội dung nhận xét</label>
            <textarea class="form-control" name="content_feedback"></textarea>
         </div>
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm nhận xét</button>
      </div>
   </div>
</form>