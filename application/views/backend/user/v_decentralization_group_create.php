<form action="<?= base_url('decentralization-group-add'); ?>" method="post">
   <div class="row">
      <div class="col-md-12 mb-3">
         <a href="<?= base_url('decentralization-group'); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách nhóm người dùng</a>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Thông tin nhóm người dùng</h6>
               <div class="mb-3">
                  <label class="form-label">Tên nhóm người dùng</label>
                  <input type="text" class="form-control" name="name_decentralization" required>
               </div>
               <div class="mb-3">
                <button class="btn btn-sm btn-primary" type="submit" name="add"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
             </div>
            </div>
         </div>
   </div>
   </div>
</form>