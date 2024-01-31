<?php if(in_array(103,$this->decentralization) && $lang == 'vn'){ ?>
    <div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('location-creat?lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm địa chỉ</button>
      </a>
  </div>
</div>
<?php } ?>
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
           <div class="col-md-6">
            <h4 class="card-title">Danh sách địa chỉ<?php $this->MainModel->checkLang($lang); ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách địa chỉ.</p>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="location?lang=vn">
             <img src="public/img/flag-vn.png" alt="">
         </a>
         <a href="location?lang=en">
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
            <th>Tên địa chỉ</th>
            <th>Địa chỉ chi tiết</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Sắp xếp</th>
            <th class="text-center">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_location as $location): ?>
            <?php $info_vn = json_decode($location['text_location_vn']); ?>
            <?php $info = json_decode($location['text_location_'.$lang]); ?>
            <tr>
                <td><?= $location['sort_order']; ?></td>
                <td><a href="<?php if(isset($info->{'link_map_location'})){ echo $info->{'link_map_location'};}else{ echo $info_vn->{'link_map_location'};} ?>" target="_blank"><?php if(isset($info->{'name_location'})){ echo $info->{'name_location'};}else{ echo '<spam style="color:red">'.$info_vn->{'name_location'}.'</span>';} ?></a></td>
                <td><?php if(isset($info->{'name_detail_location'})){ echo $info->{'name_detail_location'};}else{ echo '<spam style="color:red">'.$info_vn->{'name_detail_location'}.'</span>';} ?></td>
                <td><?php if(isset($info->{'email_location'})){ echo $info->{'email_location'};}else{ echo '<spam style="color:red">'.$info_vn->{'email_location'}.'</span>';} ?></td>
                <td><?php if(isset($info->{'phone_location'})){ echo $info->{'phone_location'};}else{ echo '<spam style="color:red">'.$info_vn->{'phone_location'}.'</span>';} ?></td>
                <td>
                    <div class="btn-group me-1">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sắp xếp vị trí<i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <?php for ($i = 1; $i <= count($list_location); ++$i) { ?>
                                <a class="dropdown-item" href="<?= base_url('location-sort-order/'.$location['id'].'/'.$location['sort_order'].'/'.$i.'?lang='.$lang); ?>">Vị trí số <?= $i; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                                    <?php if(in_array(104,$this->decentralization)){ ?>
                                        <a href="<?= base_url('location-edit/'.$location['id'].'?lang='.$lang); ?>" class="px-2 text-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($location['confirm_delete'] == 1){ ?>
                                        <?php if(in_array(105,$this->decentralization)){ ?>
                                            <a href="<?= base_url('location-delete/'.$location['id'].'?lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
