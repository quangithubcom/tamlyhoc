<div class="card mt-3">
	<div class="card-header">
		Thông tin bài viết
	</div>
	<div class="card-content" style="padding: 20px 20px;">
		<h5><?= $view_post['name']; ?></h5>
        <p>Tóm tắt: <?= $view_post['description']; ?></p>
        <a href="<?= base_url('uploads/'.$view_post['fileposst']); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Tải file bài viết</a>
    </div>
</div>
<style>
        .breathe {
          font-weight: 700;
          animation: breathe 3s infinite ease-in-out;
      }
      @keyframes breathe {
          50% {
            letter-spacing: 2em;
        }
    }
</style>

<!-- Hiển thị trạng thái kiểm duyệt -->
<?php if($view_post['status'] == 2){ ?>
<div class="breathe text-center">Đang kiểm duyệt ... </div>
<?php } ?>
<?php if($view_post['status'] == 3){ ?>
<div class="breathe text-center">Đã kiểm duyệt ... </div>
<?php } ?>



<?php 
$check_counter = array(
  'id_father_counter' => 0,
  'id_post' => $view_post['id'],
);
$list_counter = $this->db->select('*')->from('tlh_postinglist_histoty')->where($check_counter)->order_by('num','asc')->get()->result_array();
?>
<?php foreach ($list_counter as $value) { ?>
    <?php $check_repaste = array(
        'id_post' => $view_post['id'],
        'id_user' => $this->session->userdata('LoggedIn')['id'],
        'id_father_counter' => $value['id'],
    ); ?>
    <?php $view_repaste = $this->db->select('*')->from('tlh_postinglist_histoty')->where($check_repaste)->get()->row_array(); ?>
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="card-title">Phản biện lần <?= $value['num']; ?></h4>
        </div>
        <div class="card-body">
            <?= $value['counter']; ?>
            <a href="<?= base_url('uploads/'.$view_post['fileposst']); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Tải bài</a>
        </div>
    </div>
    <?php if(isset($view_repaste)){ ?>
        <div class="card mt-3">
            <div class="card-header">
                <h4 class="card-title"><?= $this->MainModel->setupSatus($view_repaste['num']); ?></h4>
            </div>
            <div class="card-body">
                <h5>Tiêu đề: <?= $view_repaste['name']; ?></h5>
                <p>Tóm tắt: <?= $view_repaste['description']; ?></p>
                <a href="<?= base_url('uploads/'.$view_repaste['linkfile']); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Tải bài</a>
            </div>
        </div>
    <?php } ?>

    <?php if($view_post['close_post'] == 0 && $view_post['status'] == 7){ ?>
        <div class="row mt-3">
         <div class="col-md-12">
          <a href="<?= base_url('posting-repaste/7/'.$view_post['id'].'/'.$value['id']); ?>">
            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Gửi lại bài viết</button>
        </a>
    </div>
</div>
<?php } ?>
<?php if($view_post['close_post'] == 0 && $view_post['status'] == 9){ ?>
    <div class="row mt-3">
     <div class="col-md-12">
      <a href="<?= base_url('posting-repaste/9/'.$view_post['id'].'/'.$value['id']); ?>">
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Gửi lại bài viết</button>
    </a>
</div>
</div>
<?php } ?>
<?php if($view_post['status'] == 2){ ?>
    <div class="row mt-3">
     <div class="col-md-12 text-center">
        Đang chờ kiểm duyệt! Vui lòng đợi.
    </div>
</div>
<?php } ?>
<?php if($view_post['status'] == 8 || $view_post['status'] == 10 || $view_post['status'] == 3){ ?>
    <div class="row mt-3">
     <div class="col-md-12 text-center">
        Đang phản biện ...
    </div>
</div>
<?php } ?>
<?php } ?>
