<form action="<?= base_url('language-add?lang='.$lang); ?>" method="post">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung ngôn ngữ</h6>
               <div class="mb-3">
                  <label class="form-label">Nội dung Tiếng Việt</label>
                  <textarea class="form-control" name="text_vn"></textarea>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung Tiếng Anh</label>
                  <textarea class="form-control" name="text_en"></textarea>
               </div>
               <button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm ngôn ngữ</button>
            </div>
         </div>
      </div>
   </div>
</form>