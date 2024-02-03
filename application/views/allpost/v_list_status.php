<div class="row mt-3">
    <div class="col-md-12">
        <a href="<?= base_url('all-list-status/2'); ?>" title="Các bài cần được duyệt đăng và chọn người phản biện">
            Cần kiểm duyệt (<?= count($list_post); ?>)
        </a> | 
        <a href="all-list-status/2" title="Danh sách các bài viết đã được phản biện đồng ý đăng. Cần đăng lên trang và đóng quá trình phản biện.">
            Cần duyệt đăng (<?= count($list_post); ?>)
        </a> | 
        <a href="all-list-status/2">
            Cần đóng bài viết (<?= count($list_post); ?>)
        </a> | 
        <a href="all-list-status/2">
            Đã đăng (<?= count($list_post); ?>)
        </a> | 
        <a href="all-list-status/2">
            Từ chối nhận (<?= count($list_post); ?>)
        </a>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body">
        <div class="row mb-3">
         <div class="col-md-6">
            <h4 class="card-title">Danh sách bài viết <?= $title; ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách các bài viết đã gửi.</p>
        </div>
    </div>
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th width="50px">STT</th>
                <th>Ngày đăng</th>
                <th>Tên</th>
                <th>Người phản biện</th>
                <th>Phản biện</th>
                <th>Trạng thái</th>
                <th class="text-center">Xem chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_post as $key => $post): ?>
                <tr>
                    <td class="text-center"><?= $key + 1; ?></td>
                    <td>
                        <p style="margin-bottom: 0;"><?php echo date('d-m-Y', $post['date_creat']) ?></p>
                        <p style="margin-bottom: 0;font-size: 11px;">Lúc: <?php echo date('H:i:s', $post['date_creat']) ?></p>
                    </td>
                    <td><?= $post['name']; ?></td>
                    <td><?= $this->MainModel->counter($post['id_counter']); ?></td>
                    <td></td>
                    <td class="text-center"><?= $this->MainModel->checkSetupExtendInfo($post['status']); ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('all-post-edit/'.$post['id']); ?>">
                            <button class="btn btn-primary btn-sm">Xem chi tiết</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</div>
</div>
