<div class="row mt-3">
   <div class="col-md-12">
    <a href="<?= base_url('posting-creat'); ?>">
      <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm bài viết</button>
  </a>
</div>
</div>
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
           <div class="col-md-6">
            <h4 class="card-title">Danh sách chuyên mục</h4>
            <p class="card-title-desc">Tổng hợp danh sách chuyên mục.</p>
        </div>
    </div>
</div>
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="50px">STT</th>
            <th>Tên</th>
            <th>Người phản biện</th>
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
                <td class="text-center">
                    <a href="<?= base_url('posting-view/'.$post['id']); ?>">
                        <button class="btn btn-primary btn-sm">Xem chi tiết</button>
                    </a>
                </td>
                <td></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
