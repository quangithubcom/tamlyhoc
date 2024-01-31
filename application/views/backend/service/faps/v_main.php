<?php if(in_array(103,$this->decentralization) && $lang == 'vn'){ ?>
    <div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('faps-creat?lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm Faps</button>
      </a>
  </div>
</div>
<?php } ?>
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
           <div class="col-md-6">
            <h4 class="card-title">Danh sách Faps<?php $this->MainModel->checkLang($lang); ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách Faps.</p>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="faps?lang=vn">
             <img src="public/img/flag-vn.png" alt="">
         </a>
         <a href="faps?lang=en">
             <img src="public/img/flag-en.png" alt="">
         </a>
     </div>
     <?php if($lang != 'vn'){ ?>
         <div class="col-md-12">
             <p>(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mãu từ dữ liệu tiếng việt</p>
         </div>
     <?php } ?>
 </div>
 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="50px">ID</th>
            <th>Câu hỏi</th>
            <th>Trả lời</th>
            <th>Sắp xếp</th>
            <th class="text-center">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_faps as $faps): ?>
            <?php $info_vn = json_decode($faps['text_faps_vn']); ?>
            <?php $info = json_decode($faps['text_faps_'.$lang]); ?>
            <tr>
                <td><?= $faps['sort_order']; ?></td>
                <td><?php if(isset($info->{'question_faps'})){ echo $info->{'question_faps'};}else{ echo '<spam style="color:red">'.$info_vn->{'question_faps'}.'</span>';} ?></td>
                <td><?php if(isset($info->{'answer_faps'})){ echo $info->{'answer_faps'};}else{ echo '<spam style="color:red">'.$info_vn->{'answer_faps'}.'</span>';} ?></td>
                <td>
                    <div class="btn-group me-1">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sắp xếp vị trí<i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <?php for ($i = 1; $i <= count($list_faps); ++$i) { ?>
                                <a class="dropdown-item" href="<?= base_url('faps-sort-order/'.$faps['id'].'/'.$faps['sort_order'].'/'.$i.'?lang='.$lang); ?>">Vị trí số <?= $i; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                                    <?php if(in_array(104,$this->decentralization)){ ?>
                                        <a href="<?= base_url('faps-edit/'.$faps['id'].'?lang='.$lang); ?>" class="px-2 text-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($faps['confirm_delete'] == 1){ ?>
                                        <?php if(in_array(105,$this->decentralization)){ ?>
                                            <a href="<?= base_url('faps-delete/'.$faps['id'].'?lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
