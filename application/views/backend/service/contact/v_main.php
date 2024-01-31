<div class="card mt-3">
    <div class="card-body">
        <div class="row">
         <div class="col-md-12">
            <h4 class="card-title">Danh sách nhận xét<?php $this->MainModel->checkLang($lang); ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách nhận xét.</p>
        </div>
    </div>
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th width="50px">STT</th>
                <th>Ngày Tạo</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Công Ty</th>
                <th>Lời nhắn</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_contact as $key => $contact): ?>
                <tr>
                    <td class="text-center"><?= $key + 1; ?></td>
                    <td><?= date("d-m-Y H:i:s",$contact['date_creat']); ?></td>
                    <td><?= $contact['full_name'] ?></td>
                    <td><?= $contact['email'] ?></td>
                    <td><?= $contact['phone'] ?></td>
                    <td><?= $contact['company'] ?></td>
                    <td><?= $contact['messenger'] ?></td>
                    <td>
                        <?php
                        if($contact['status'] == 1){
                            echo '<span class="badge badge-soft-success p-2">Đã Xem</span>';

                        }else{
                            echo '<span class="badge badge-soft-danger p-2">Chưa xem</span>';
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php if($contact['status'] == 0){ ?>
                            <a href="<?= base_url('contact-backend-status/'.$contact['id'].'?lang='.$lang.'&status=1'); ?>" class="px-2 text-primary" style="font-size: 16px;" onclick="return confirm('Xác nhận đã đọc liên hệ?')">
                                <i class="far fa-play-circle"></i>
                            </a>
                        <?php } ?>
                        <a href="<?= base_url('contact-backend-delete/'.$contact['id'].'?lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" style="font-size: 16px;">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
