<?php if(in_array(103,$this->decentralization) && $lang == 'vn'){ ?>
    <div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('feedback-creat?lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm nhận xét</button>
      </a>
  </div>
</div>
<?php } ?>
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
           <div class="col-md-6">
            <h4 class="card-title">Danh sách nhận xét<?php $this->MainModel->checkLang($lang); ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách nhận xét.</p>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="feedback?lang=vn">
             <img src="public/img/flag-vn.png" alt="">
         </a>
         <a href="feedback?lang=en">
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
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Nhận xét</th>
            <th>Trạng thái</th>
            <th>Sắp xếp</th>
            <th class="text-center">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_feedback as $feedback): ?>
            <?php $info_vn = json_decode($feedback['text_feedback_vn']); ?>
            <?php $info = json_decode($feedback['text_feedback_'.$lang]); ?>
            <?php 
            if(isset($info->{'img_feedback'})){
                $img_feedback = $info->{'img_feedback'};
            }else{
                $img_feedback = 'no-image';
            } 
            ?>
            <tr>
                <td><?= $feedback['sort_order']; ?></td>
                <td><img src="<?php get_img($img_feedback); ?>" width="50px"></td>
                <td><?php if(isset($info->{'name_feedback'})){ echo $info->{'name_feedback'};}else{ echo '<spam style="color:red">'.$info_vn->{'name_feedback'}.'</span>';} ?></td>
                <td><?php if(isset($info->{'content_feedback'})){ echo $info->{'content_feedback'};}else{ echo '<spam style="color:red">'.$info_vn->{'content_feedback'}.'</span>';} ?></td>
                <td><?php $this->MainModel->checkStatus($feedback['status']); ?></td>
                <td>
                            <div class="btn-group me-1">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sắp xếp vị trí<i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <?php for ($i = 1; $i <= count($list_feedback); ++$i) { ?>
                                        <a class="dropdown-item" href="<?= base_url('feedback-sort-order/'.$feedback['id'].'/'.$feedback['sort_order'].'/'.$i.'?lang='.$lang); ?>">Vị trí số <?= $i; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                <td class="text-center">
                    <?php if($feedback['status'] == 0){ ?>
                        <a href="<?= base_url('feedback-status/'.$feedback['id'].'?lang='.$lang.'&status=1'); ?>" class="px-2 text-primary" style="font-size: 16px;" onclick="return confirm('Bạn có chắc chắn muốn Active?')">
                            <i class="far fa-play-circle"></i>
                        </a>
                    <?php }else{ ?>
                        <a href="<?= base_url('feedback-status/'.$feedback['id'].'?lang='.$lang.'&status=0'); ?>" class="px-2 text-danger" style="font-size: 16px;" onclick="return confirm('Bạn có chắc chắn muốn Pause?')">
                            <i class="far fa-pause-circle"></i>
                        </a>
                    <?php } ?>                    
                            <?php if(in_array(104,$this->decentralization)){ ?>
                                <a href="<?= base_url('feedback-edit/'.$feedback['id'].'?lang='.$lang); ?>" class="px-2 text-primary" style="font-size: 16px;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            <?php } ?>
                            <?php if($feedback['confirm_delete'] == 1){ ?>
                                <?php if(in_array(105,$this->decentralization)){ ?>
                                    <a href="<?= base_url('feedback-delete/'.$feedback['id'].'?lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" style="font-size: 16px;">
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
