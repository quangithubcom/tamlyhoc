<?php if(in_array(48,$this->decentralization) && $lang == 'vn'){ ?>
    <div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('news-creat?category_type='.$category_type.'&type_template=posts'.'&lang='.$lang); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm bài viết</button>
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
            <a href="news?category_type=<?= $category_type; ?>&type_template=posts&lang=vn">
             <img src="public/img/flag-vn.png" alt="">
         </a>
         <a href="news?category_type=<?= $category_type; ?>&type_template=posts&lang=en">
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
            <th width="50px">STT</th>
            <th width="80px">Ảnh</th>
            <th>Tên giao diện</th>
            <th>Đường dẫn</th>
            <th class="text-center">Lượt xem</th>
            <th class="text-center">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_news as $key => $news): ?>
            <?php $view_post = $this->NewsModel->view($news['id'],$lang); ?>
            <?php $view_post_main = $this->NewsModel->view($news['id'],'vn'); ?>
            <?php 
            if(isset($view_post)){
                $seo = json_decode($view_post['seo']);
                $imgwebsite = $seo->{'imgwebsite'};
            }else{
                $imgwebsite = 'no-image';
            } 
            ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><img src="<?php get_img($imgwebsite); ?>" width="50px"></td>
                <td><?php if(isset($view_post)){ echo $view_post['name_post']; }else{ echo '<span style="color:red">'.$view_post_main['name_post'].'</span>'; } ?></td>
                <td><?php if(isset($view_post)){ echo $view_post['url_post']; }else{ echo '<span style="color:red">'.$view_post_main['url_post'].'</span>'; } ?></td>
                <td class="text-center"><?php if(isset($view_post)){ echo $view_post['view']; } ?></td>
                <td class="text-center">
                    <?php if(in_array(49,$this->decentralization)){ ?>
                        <a href="<?= base_url('news-edit/'.$news['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    <?php } ?>
                    <?php if($news['confirm_delete'] == 1){ ?>
                        <?php if(in_array(50,$this->decentralization)){ ?>
                            <a href="<?= base_url('news-delete/'.$news['id'].'?category_type='.$category_type.'&type_template='.$type_template.'&lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
