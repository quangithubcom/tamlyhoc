<?php $info = json_decode($view_info['info_setup_'.$lang]); ?>
<div class="card" style="margin-top: 30px;">
   <div class="card-body">
      <div class="row">
         <div class="col-md-6">
            <h5 class="header-title mt-0">Thông tin thuế và phí</h5>
         </div>
         
      </div>
      <form action="<?= base_url('tax-update?lang='.$lang); ?>" method="post">
         <div class="row">
            <div class="col-md-4">
               <div class="mb-3">
                  <label class="form-label">Phần trăm thuế</label>
                  <div class="input-group">
                    <div class="input-group-text">%</div>
                    <input type="number" class="form-control" name="tax_user" value="<?= $info->{'tax_user'}; ?>">
                 </div>
              </div>
           </div>
           <div class="col-md-4">
            <div class="mb-3">
               <label class="form-label">Phí dịch vụ</label>
               <div class="input-group">
                 <div class="input-group-text">$</div>
                 <input type="number" class="form-control" name="tip_user" value="<?= $info->{'tip_user'}; ?>">
              </div>
           </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
               <label class="form-label">Phí giao hàng</label>
               <div class="input-group">
                 <div class="input-group-text">$</div>
                 <input type="number" class="form-control" name="ship_user" value="<?= $info->{'ship_user'}; ?>">
              </div>
              <p style="margin-top: 10px;">* Để 0 thì sẽ hiển thị miễn phí giao hàng</p>
           </div>
        </div>
            <div class="col-md-12">
               <input type="submit" class="btn btn-primary btn-sm" name="update" value="Chỉnh sửa">
            </div>
         </div>
      </form>
   </div>
</div>
