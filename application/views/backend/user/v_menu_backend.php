<div class="row">
    <div class="col-12 mb-3">
        <a href="<?= base_url('menu-backend-creat'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Thêm Menu</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách Menu</h4>
                <p class="card-title-desc">Tổng hợp danh sách người dùng và phân quyền.</p>
                <table class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">ID</th>
                            <th>Icon Menu</th>
                            <th class="text-center">Tên Menu</th>
                            <th class="text-center">Link Menu</th>
                            <th class="text-center">Sắp xếp</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_menu as $key => $menu): ?>
                            <?php $list_menu_sub_1 = $this->MenuBackendModel->getFather($menu['id']) ?>
                            <tr>
                                <td><?= $menu['id']; ?></td>
                                <td><i class="<?= $menu['icon_font']; ?>"></td>
                                <td><?= $menu['name_menu']; ?></td>
                                <td><?= $menu['link_menu']; ?></td>
                                <td></td>
                                <td>
                                    <a href="<?= base_url('menu-backend-edit/'.$menu['id']); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('menu-backend-delete/'.$menu['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php foreach ($list_menu_sub_1 as $key => $menu_sub_1): ?>
                            <?php $list_menu_sub_2 = $this->MenuBackendModel->getFather($menu_sub_1['id']) ?>
                            <tr>
                                <td><?= $menu_sub_1['id']; ?></td>
                                <td><i class="<?= $menu_sub_1['icon_font']; ?>"></td>
                                <td>-------- <?= $menu_sub_1['name_menu']; ?></td>
                                <td><?= $menu_sub_1['link_menu']; ?></td>
                                <td></td>
                                <td>
                                    <a href="<?= base_url('menu-backend-edit/'.$menu_sub_1['id']); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('menu-backend-delete/'.$menu_sub_1['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php foreach ($list_menu_sub_2 as $key => $menu_sub_2): ?>
                            <?php $list_menu_sub_3 = $this->MenuBackendModel->getFather($menu_sub_2['id']) ?>
                            <tr>
                                <td><?= $menu_sub_2['id']; ?></td>
                                <td><i class="<?= $menu_sub_2['icon_font']; ?>"></td>
                                <td>---------------- <?= $menu_sub_2['name_menu']; ?></td>
                                <td><?= $menu_sub_2['link_menu']; ?></td>
                                <td></td>
                                <td>
                                    <a href="<?= base_url('menu-backend-edit/'.$menu_sub_2['id']); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('menu-backend-delete/'.$menu_sub_2['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php foreach ($list_menu_sub_3 as $key => $menu_sub_3): ?>
                            <tr>
                                <td><?= $menu_sub_3['id']; ?></td>
                                <td><i class="<?= $menu_sub_3['icon_font']; ?>"></td>
                                <td>------------------------ <?= $menu_sub_3['name_menu']; ?></td>
                                <td><?= $menu_sub_3['link_menu']; ?></td>
                                <td></td>
                                <td>
                                    <a href="<?= base_url('menu-backend-edit/'.$menu_sub_3['id']); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('menu-backend-delete/'.$menu_sub_3['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php endforeach ?>
                        <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->