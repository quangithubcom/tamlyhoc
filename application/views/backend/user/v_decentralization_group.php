<div class="row">
    <div class="col-12 mb-3">
        <a href="<?= base_url('user'); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Danh sách thành viên</a>
        <a href="<?= base_url('decentralization-group-creat'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Thêm nhóm người dùng</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách quyền nhóm người dùng</h4>
                <p class="card-title-desc">Tổng hợp danh sách quyền nhóm người dùng và phân quyền.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Nhóm người dùng</th>
                            <th class="text-center">Phân quyền</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $key => $decentralization): ?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= $decentralization['name_decentralization']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('decentralization-group-setting/'.$decentralization['id']); ?>">
                                    <i class="fa-solid fa-users-gear"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('decentralization-group-edit/'.$decentralization['id']); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('decentralization-group-delete/'.$decentralization['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
