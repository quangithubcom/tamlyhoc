<?php $food_extras = json_decode($view_menu['food_extras']) ?>
<form action="<?= base_url('menus-add-extras?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" method="post">
    <input type="hidden" name="id_menu_food" value="<?= $id_menu_food; ?>">
<div class="row mt-3">
	<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách món mở rộng</h4>
                <p class="card-title-desc">Tổng hợp danh sách món mở rộng.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Ảnh</th>
                            <th>Tên Menu</th>
                            <th>Giá bán</th>
                            <th>Hiển thị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_extras as $key => $menus): ?>
                            <tr>
                                <td><input type="checkbox" name="food_extras[]" value="<?= $menus['id'] ?>"<?php if(in_array($menus['id'],$food_extras)){ echo ' checked'; } ?>></td>
                                <td><img src="<?php get_img($menus['img_food']); ?>" width="50px"></td>
                                <td><?= $menus['name_food']; ?></td>
                                <td>$<?= $menus['price_food']; ?></td>
                                <td><?php $this->MainModel->checkStatus($menus['status']); ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<button class="btn btn-primary btn-sm mb-3" type="submit" name="add">Thêm menu mở rộng</button>
</form>
