<div class="row">
    <div class="col-12 mb-3">
        <a href="<?= base_url('user-creat'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Thêm người dùng</a>
        <a href="<?= base_url('decentralization-group'); ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-plus"></i> Group phân quyền</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách người dùng</h4>
                <p class="card-title-desc">Tổng hợp danh sách người dùng và phân quyền.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên người dùng</th>
                            <th class="text-center">Tên đăng nhập</th>
                            <th class="text-center">Phân quyền</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $key => $user): ?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('decentralization/'.$user['id']); ?>">
                                    <i class="fa-solid fa-users-gear"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('user-edit/'.$user['id']); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('user-delete/'.$user['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
