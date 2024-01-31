
<?php $list_menu = $this->UserModel->getFatherMenu(0); ?>
<style type="text/css">
 #test{
   border:1px solid #ccc;
   padding: 10px 20px 0px 30px;
   width:100%;
   height:600px;
   overflow-x:auto;
   overflow-y:auto;
   background: #fff;
}
.form-check{
   margin-bottom: 8px;
}
</style>
<div class="row">
    <div class="col-12 mb-3">
        <a href="<?= base_url('user'); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Danh sách thành viên</a>
    </div>
 </div>
<h5>Thành viên: <?= $view_id_user['name']; ?></h5>
<form action="<?= base_url('decentralization-update'); ?>" method="post">
   <input type="hidden" name="id_user" value="<?= $id_user; ?>">
   <div class="mb-3">
      <div id="test">
         <label class="form-label">Danh mục Menu</label>
         <?php foreach ($list_menu as $menu): ?>
            <?php $list_menu_1 = $this->UserModel->getFatherMenu($menu['id']); ?>
            <div class="form-check">
               <input class="form-check-input" type="checkbox" name="decentralization[]" value="<?= $menu['id']; ?>" id="formCheck<?= $menu['id']; ?>"<?php if(in_array($menu['id'],$decentralization_user)){ echo ' checked'; } ?>>
               <label class="form-check-label" for="formCheck<?= $menu['id']; ?>">
                  <?= ' '.$menu['name_menu']; ?>
               </label>
            </div>
            <?php foreach ($list_menu_1 as $menu_1): ?>
               <?php $list_menu_2 = $this->UserModel->getFatherMenu($menu_1['id']); ?>
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="decentralization[]" value="<?= $menu_1['id']; ?>" id="formCheck<?= $menu_1['id']; ?>"<?php if(in_array($menu_1['id'],$decentralization_user)){ echo ' checked'; } ?>>
                  <label class="form-check-label" for="formCheck<?= $menu_1['id']; ?>">
                     --------- <?= $menu_1['name_menu']; ?>
                  </label>
               </div>
               <?php foreach ($list_menu_2 as $menu_2): ?>
                  <?php $list_menu_3 = $this->UserModel->getFatherMenu($menu_2['id']); ?>
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" name="decentralization[]" value="<?= $menu_2['id']; ?>" id="formCheck<?= $menu_2['id']; ?>"<?php if(in_array($menu_2['id'],$decentralization_user)){ echo ' checked'; } ?>>
                     <label class="form-check-label" for="formCheck<?= $menu_2['id']; ?>">
                        ------------------ <?= $menu_2['name_menu']; ?>
                     </label>
                  </div>
                  <?php foreach ($list_menu_3 as $menu_3): ?>
                     <?php $list_menu_4 = $this->UserModel->getFatherMenu($menu_3['id']); ?>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="decentralization[]" value="<?= $menu_3['id']; ?>" id="formCheck<?= $menu_3['id']; ?>"<?php if(in_array($menu_3['id'],$decentralization_user)){ echo ' checked'; } ?>>
                        <label class="form-check-label" for="formCheck<?= $menu_3['id']; ?>">
                           --------------------------- <?= $menu_3['name_menu']; ?>
                        </label>
                     </div>
                     <?php foreach ($list_menu_4 as $menu_4): ?>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="decentralization[]" value="<?= $menu_4['id']; ?>" id="formCheck<?= $menu_4['id']; ?>"<?php if(in_array($menu_4['id'],$decentralization_user)){ echo ' checked'; } ?>>
                           <label class="form-check-label" for="formCheck<?= $menu_4['id']; ?>">
                              --------------------------- <?= $menu_4['name_menu']; ?>
                           </label>
                        </div>
                     <?php endforeach ?>
                  <?php endforeach ?>
               <?php endforeach ?>
            <?php endforeach ?>
         <?php endforeach ?>
      </div>
   </div>
   <div class="mb-3">
     <button class="btn btn-sm btn-primary" type="submit" name="update" value="decentralization"><i class="fa-solid fa-floppy-disk"></i> Lưu cài đặt</button>
  </div>
</form>