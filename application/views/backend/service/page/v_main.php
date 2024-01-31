<?php if(in_array(75,$this->decentralization)){ ?>
<div class="row">
   <div class="col-md-12">
      <a href="<?= base_url('page-create?lang='.$lang); ?>">
      <button type="button" class="btn btn-primary btn-sm">Thêm Page</button>
      </a>
   </div>
</div>
<?php } ?>
<div class="row mt-3">
   <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách Page</h4>
                <p class="card-title-desc">Tổng hợp danh sách các Page hệ thống.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên giao diện</th>
                            <th class="text-center">Url giao diện</th>
                            <th class="text-center">Đặt trang chủ</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_page as $key => $page): ?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= $page['name_page_vn']; ?></td>
                                <td><?= $page['url_page']; ?></td>
                                <td class="text-center">
                                    <?php if($page['setmain'] == 1){ echo '<span class="badge badge-soft-success font-size-12">Trang chủ</span>'; }else{ ?>
                                    <a href="<?= base_url('set-main/'.$page['id'].'?lang='.$lang); ?>">
                                      <button type="button" class="btn btn-primary btn-sm">Đặt trang chủ</button>
                                    </a>
                                <?php } ?>
                                </td>
                                <td class="text-center">
                                 <a href="<?= base_url('page-code-edit/'.$page['id'].'?lang=vn'); ?>" class="text-primary">
                                    <i class="fa-solid fa-code"></i>
                                 </a>
                                </td>
                                <td>
                                    <a href="<?= base_url($page['url_'.$lang]); ?>" class="px-2 text-primary">
                                        <i class="fa-brands fa-internet-explorer"></i>
                                    </a>
                                    <?php if(in_array(76,$this->decentralization)){ ?>
                                    <a href="<?= base_url('page-edit/'.$page['id'].'?lang=vn'); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <?php } ?>
                                    <?php if(in_array(77,$this->decentralization)){ ?>
                                    <a href="<?= base_url('page-delete/'.$page['id'].'?lang=vn'); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
    </div> <!-- end col -->
</div>
