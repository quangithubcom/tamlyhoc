<?php if(in_array(100,$this->decentralization)){ ?>
    <div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('menus-creat?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm menu</button>
      </a>
  </div>
</div>
<?php } ?>
<div class="row mt-3">
	<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách Menu</h4>
                <p class="card-title-desc">Tổng hợp danh sách Menu.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên Menu</th>
                            <th>Giá bán</th>
                            <th>Lựa chọn</th>
                            <th>Mở rộng</th>
                            <th>Hiển thị</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_menus as $key => $menus): ?>
                            <?php $list_food = $this->MenuModel->getFood($menus['id'],$lang); ?>
                            <tr>
                                <td><img src="<?php get_img($menus['img_food']); ?>" width="50px"></td>
                                <td><?= $menus['name_food']; ?></td>
                                <td>$<?= $menus['price_food']; ?></td>
                                <td>
                                    <a href="<?= base_url('menus-creat-option/'.$menus['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm lựa chọn</button>
                                        </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('menus-creat-extras/'.$menus['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm mở rộng</button>
                                        </a>
                                </td>
                                <td><?php $this->MainModel->checkStatus($menus['status']); ?></td>
                                <td class="text-center">
                                    <?php if(in_array(100,$this->decentralization)){ ?>
                                        <a href="<?= base_url('menus-edit/'.$menus['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if(in_array(101,$this->decentralization)){ ?>
                                        <a href="<?= base_url('menus-delete/'.$menus['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php foreach ($list_food as $menus): ?>
                                 <tr>
                                <td><img src="<?php get_img($menus['img_food']); ?>" width="50px"></td>
                                <td>-------- <?= $menus['name_food']; ?></td>
                                <td>$<?= $menus['price_food']; ?></td>
                                <td></td>
                                <td></td>
                                <td><?php $this->MainModel->checkStatus($menus['status']); ?></td>
                                <td class="text-center">
                                    <?php if(in_array(100,$this->decentralization)){ ?>
                                        <a href="<?= base_url('menus-edit-option/'.$menus['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if(in_array(101,$this->decentralization)){ ?>
                                        <a href="<?= base_url('menus-delete/'.$menus['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
