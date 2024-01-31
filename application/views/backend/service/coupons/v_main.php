<?php if(in_array(136,$this->decentralization) && $lang == 'vn'){ ?>
    <div class="row mt-3">
     <div class="col-md-12">
        <a href="<?= base_url('coupons-creat?lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm khuyến mãi</button>
      </a>
  </div>
</div>
<?php } ?>
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
         <div class="col-md-6">
            <h4 class="card-title">Danh sách khuyễn mãi<?php $this->MainModel->checkLang($lang); ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách khuyễn mãi.</p>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="coupons?lang=vn">
               <img src="public/img/flag-vn.png" alt="">
           </a>
           <a href="coupons?lang=en">
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
            <th width="300px">Tên chương trình</th>
            <th>Mã khuyến mãi</th>
            <th>Khuyến mãi</th>
            <th>Số lượng</th>
            <th>Sử dụng</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Trạng thái</th>
            <th class="text-center">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php $to_day = strtotime(date('d-m-Y')); ?>
        <?php foreach ($list_coupons as $key => $coupons): ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $coupons['name_coupons']; ?></td>
                <td><?= $coupons['code_coupons']; ?></td>
                <td><?php if($coupons['discount_coupons_vnd'] > 0){ echo number_format($coupons['discount_coupons_vnd']).' đ'; }else{ echo number_format($coupons['discount_coupons_percent']).' %'; } ?></td>
                <td><?= $coupons['num_coupons']; ?></td>
                <td><?= $coupons['num_use']; ?></td>
                <td><?= date("d-m-Y",$coupons['time_start']); ?></td>
                <td><?= date("d-m-Y",$coupons['time_end']); ?></td>
                <td>
                    <?php 
                    if($coupons['status'] == 1){
                        echo '<span class="badge rounded badge-soft-success font-size-12">Hoạt động</span>';
                        if($coupons['time_start'] <= $to_day && $to_day <= $coupons['time_end']){
                            echo '<span class="badge badge-soft-warning font-size-12">Đang diễn ra</span>';
                        }else{
                            echo '<span class="badge badge-soft-danger font-size-12">Chưa diễn ra</span>';
                        }
                    }else{
                        echo '<span class="badge badge-soft-danger font-size-12">Kết thúc</span>';
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?php if(in_array(104,$this->decentralization)){ ?>
                        <a href="<?= base_url('coupons-edit/'.$coupons['id'].'?lang='.$lang); ?>" class="px-2 text-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    <?php } ?>
                    <?php if(in_array(105,$this->decentralization)){ ?>
                        <?php if($coupons['time_start'] <= $to_day && $to_day <= $coupons['time_end']){ ?>
                        <?php }else{ ?>
                            <a href="<?= base_url('coupons-delete/'.$coupons['id'].'?lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
