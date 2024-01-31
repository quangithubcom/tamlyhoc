<div class="row mt-3">
   <div class="col-xl-12">
    <div class="card">
        <div class="card-header border-0 align-items-center d-flex pb-0">
            <h4 class="card-title mb-0 flex-grow-1">Thông báo mới</h4>
        </div>
        <div class="card-body pt-2">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Ngày</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($list_notification) == 0){ ?>
                            <tr>
                                <td colspan="4" class="text-center" style="padding-top: 120px;padding-bottom: 120px;">Không có thông báo mới</td>
                            </tr>
                        <?php }else{ ?>
                        <?php foreach ($list_notification as $value): ?>
                            <tr>
                            <td><?= $value['code']; ?></td>
                            <td>
                                <p style="margin-bottom: 0px"><?= date('d-m-Y', $value['date_creat']); ?></p>
                                <p style="margin-bottom: 0px;font-size: 11px;">Lúc: <?= date('H:i:s', $value['date_creat']); ?></p>
                        </td>
                            <td><?= $value['mess_notification']; ?></td>
                            <td>
                                <?php if($value['read_notification'] == 0){ ?>
                                    <span class="badge rounded badge-soft-danger font-size-12">Chưa đọc</span>
                                <?php }else{ ?>
                                    <span class="badge rounded badge-soft-success font-size-12">Đã đọc</span>
                                    <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url($value['link_check']); ?>">
                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Xem</button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>
</div>
                         <!-- END ROW -->