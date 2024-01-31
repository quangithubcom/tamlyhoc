<?php if(in_array(52,$this->decentralization) && $lang == 'vn'){ ?>
    <div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('category-creat?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm chuyên mục</button>
      </a>
  </div>
</div>
<?php } ?>
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
           <div class="col-md-6">
            <h4 class="card-title">Danh sách chuyên mục<?php $this->MainModel->checkLang($lang); ?></h4>
            <p class="card-title-desc">Tổng hợp danh sách chuyên mục.</p>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="category?category_type=<?= $category_type; ?>&type_template=category&lang=vn">
             <img src="public/img/flag-vn.png" alt="">
         </a>
         <a href="category?category_type=<?= $category_type; ?>&type_template=category&lang=en">
             <img src="public/img/flag-en.png" alt="">
         </a>
     </div>
     <?php if($lang != 'vn'){ ?>
         <div class="col-md-12">
             <p style="color:red;">(*) Chữ màu đỏ là chưa nhập dữ liệu đang lấy mãu từ dữ liệu tiếng việt</p>
         </div>
     <?php } ?>
 </div>
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th width="80px">Ảnh</th>
                    <th>Tên giao diện</th>
                    <th>Đường dẫn</th>
                    <th class="text-center">Lượt xem</th>
                    <th class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_category as $category): ?>
                    <?php $list_category1 = $this->CategoryModel->getFatherType($category['id'],$_GET['category_type']); ?>
                    <?php $view_category = $this->CategoryModel->view($category['id'],$lang); ?>
                    <?php 
                        if(isset($view_category)){
                            $seo = json_decode($view_category['seo']);
                            $imgwebsite = $seo->{'imgwebsite'};
                        }else{
                            $imgwebsite = 'no-image';
                        } 
                    ?>
                    <tr>
                        <td><img src="<?php get_img($imgwebsite); ?>" width="50px"></td>
                        <td><?php if(isset($view_category['name_category'])){ echo $view_category['name_category'];}else{ echo '<span style="color:red">'.$this->CategoryModel->getLang('name_category',$category['id'],'vn').'</span>';} ?></td>
                        <td><?php if(isset($view_category['url_category'])){ echo $view_category['url_category'];}else{ echo '<span style="color:red">'.$this->CategoryModel->getLang('url_category',$category['id'],'vn').'</span>';} ?></td>
                        <td class="text-center"><?php if(isset($view_category['view'])){ echo $view_category['view']; }else{ echo '0'; } ?></td>
                        <td class="text-center">
                            <?php if(in_array(53,$this->decentralization)){ ?>
                                <a href="<?= base_url('category-edit/'.$category['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            <?php } ?>
                            <?php if($category['confirm_delete'] == 1){ ?>
                                <?php if(in_array(54,$this->decentralization)){ ?>
                                    <a href="<?= base_url('category-delete/'.$category['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php foreach ($list_category1 as $category): ?>
                    <?php $view_category = $this->CategoryModel->view($category['id'],$lang); ?>
                    <?php 
                        if(isset($view_category)){
                            $seo = json_decode($view_category['seo']);
                            $imgwebsite = $seo->{'imgwebsite'};
                        }else{
                            $imgwebsite = 'no-image';
                        } 
                    ?>
                    <tr>
                        <td><img src="<?php get_img($imgwebsite); ?>" width="50px"></td>
                        <td>-------- <?php if(isset($view_category['name_category'])){ echo $view_category['name_category'];}else{ echo '<span style="color:red">'.$this->CategoryModel->getLang('name_category',$category['id'],'vn').'</span>';} ?></td>
                        <td><?php if(isset($view_category['url_category'])){ echo $view_category['url_category'];}else{ echo '<span style="color:red">'.$this->CategoryModel->getLang('url_category',$category['id'],'vn').'</span>';} ?></td>
                        <td class="text-center"><?php if(isset($view_category['view'])){ echo $view_category['view']; }else{ echo '0'; } ?></td>
                        <td class="text-center">
                            <?php if(in_array(53,$this->decentralization)){ ?>
                                <a href="<?= base_url('category-edit/'.$category['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            <?php } ?>
                            <?php if($category['confirm_delete'] == 1){ ?>
                                <?php if(in_array(54,$this->decentralization)){ ?>
                                    <a href="<?= base_url('category-delete/'.$category['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>