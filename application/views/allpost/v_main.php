<div class="card mt-3">
    <div class="card-body">
        <div class="row">
         <div class="col-md-6">
            <h4 class="card-title">Danh sách bài</h4>
            <p class="card-title-desc">Tổng hợp danh sách bài phản biện.</p>
        </div>
    </div>
</div>
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="50px">STT</th>
            <th>Tên</th>
            <th>Người phản biện</th>
            <th>Phản biện</th>
            <th class="text-center">Xem chi tiết</th>
            <th class="text-center">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_post as $key => $post): ?>
            <tr>
                <td class="text-center"><?= $key + 1; ?></td>
                <td><?= $post['name']; ?></td>
                <td><?= $this->MainModel->counter($post['id_counter']); ?></td>
                <td></td>
                <td class="text-center">
                    <a href="<?= base_url('all-post-view/'.$post['id']); ?>">
                        <button class="btn btn-primary btn-sm">Xem chi tiết</button>
                    </a>
                </td>
                <td class="text-center">
                    <a href="<?= base_url('all-post-edit/'.$post['id']); ?>" class="px-2 text-primary">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <?php if($post['status'] == 0){ ?>
                    <a href="<?= base_url('all-post-delete/'.$post['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                <?php } ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
</div>
