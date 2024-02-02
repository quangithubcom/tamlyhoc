<div class="row mt-3">
 <div class="col-md-12">
    <a href="<?= base_url('posting-creat'); ?>">
      <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm bài viết</button>
  </a>
</div>
</div>
<div class="card mt-3">
    <div class="card-body">
        <div class="row mb-3">
         <div class="col-md-6">
            <h4 class="card-title">Danh sách bài viết</h4>
            <p class="card-title-desc">Tổng hợp danh sách các bài viết đã gửi.</p>
        </div>
    </div>
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th width="50px">STT</th>
                <th>Ngày đăng</th>
                <th>Tên</th>
                <th class="text-center">Tình trạng</th>
                <th class="text-center">Xem chi tiết</th>
                <th class="text-center">Hành Động</th>
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
                    <td class="text-center"><?= $this->MainModel->checkSetupExtendInfo($post['status']); ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('posting-view/'.$post['id']); ?>">
                            <button class="btn btn-primary btn-sm">Xem chi tiết</button>
                        </a>
                    </td>
                    <td class="text-center">
                        <?php if($post['status'] == 2){ ?>
                            <a href="<?= base_url('posting-delete/'.$post['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
