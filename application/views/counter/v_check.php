<div class="card mt-3">
	<div class="card-header">
		Thông tin bài viết
	</div>
	<div class="card-content" style="padding: 20px 20px;">
    <h5>Tiêu đề: <?= $view_post['name']; ?></h5>
		<p>Tóm tắt: <?= $view_post['description']; ?></p>
    <a href="<?= base_url('uploads/'.$view_post['fileposst']); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Tải bài</a>
	</div>

</div>
<?php 
$check_counter = array(
  'id_father_counter' => 0,
  'id_post' => $view_post['id'],
);
$list_counter = $this->db->select('*')->from('tlh_postinglist_histoty')->where($check_counter)->order_by('num','asc')->get()->result_array();

?>

<?php if($view_post['close_post'] == 0 && count($list_counter) == 0){ ?>
<div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('user-counter-status/'.$view_post['id'].'/4'); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Đồng ý đăng</button>
      </a>
      <a href="<?= base_url('counter-argument/1/'.$view_post['id']); ?>">
          <button type="button" class="btn btn-warning btn-sm waves-effect waves-light">Chỉnh sửa và gửi lại</button>
      </a>
      <a href="<?= base_url('user-counter-status/'.$view_post['id'].'/6'); ?>">
          <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Từ chối nhận</button>
      </a>
  </div>
</div>
<?php } ?>

<?php foreach ($list_counter as $value) { ?>
    <div class="card mt-3">
            <div class="card-header">
                <h4 class="card-title">Phản biện lần <?= $value['num']; ?></h4>
            </div>
            <div class="card-body">
                <?= $value['counter']; ?>
            </div>
        </div>
<?php } ?>
<?php if($view_post['close_post'] == 0 && count($list_counter) == 1 && $view_post['status'] == 5){ ?>
<div class="row mt-3">
       <div class="col-md-12">
        <a href="<?= base_url('user-counter-status/'.$view_post['id'].'/4'); ?>">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Đồng ý đăng</button>
      </a>
      <a href="<?= base_url('counter-argument-edit/1/'.$view_post['id']); ?>">
          <button type="button" class="btn btn-warning btn-sm waves-effect waves-light">Chỉnh sửa phản biện lần 1</button>
      </a>
      <a href="<?= base_url('user-counter-status/'.$view_post['id'].'/6'); ?>">
          <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Từ chối nhận</button>
      </a>
  </div>
</div>
<?php } ?>