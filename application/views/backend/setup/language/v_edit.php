<form action="<?= base_url('language-update?lang='.$lang); ?>" method="post">
   <input type="hidden" name="id_language" value="<?= $id_language; ?>">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung ngôn ngữ</h6>
               <div class="mb-3">
                  <label class="form-label">Nội dung Tiếng Việt</label>
                  <textarea class="form-control" name="text_vn"><?= $view_language['text_vn']; ?></textarea>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung Tiếng Anh</label>
                  <textarea class="form-control" name="text_en"><?= $view_language['text_en']; ?></textarea>
               </div>
               <button class="btn btn-primary btn-sm mb-3" type="submit" name="update">Chỉnh sửa ngôn ngữ</button>
            </div>
         </div>
      </div>
   </div>
</form>