<div class="row mt-3">
	<div class="col-md-12">
		<a href="<?= base_url('all-post'); ?>">
			<button type="button" class="btn btn-dark btn-sm"><i class="fa-solid fa-arrow-left"></i> Danh sách bài</button>
		</a>
		<?php if($view_post['status'] == 2){ ?>
			<a href="<?= base_url('all-post-status/'.$view_post['id'].'/3'); ?>">
				<button type="button" class="btn btn-primary btn-sm">Duyệt bài</button>
			</a>
		<?php } ?>
		<?php if($view_post['status'] == 3){ ?>
			<a href="<?= base_url('all-post-status/'.$view_post['id'].'/2'); ?>">
				<button type="button" class="btn btn-danger btn-sm">Hủy duyệt bài</button>
			</a>
			<div class="btn-group">
				<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Chọn người phản biện <i class="mdi mdi-chevron-down"></i>
				</button>
				<div class="dropdown-menu" style="">
					<?php foreach ($list_counter as $value): ?>
						<a class="dropdown-item" href="<?= base_url('all-post-counter/'.$view_post['id'].'/'.$value['id']); ?>"><?= $value['name']; ?></a>
					<?php endforeach ?>
				</div>
			</div>
			<a href="<?= base_url('all-post-status/'.$view_post['id'].'/2'); ?>">
				<button type="button" class="btn btn-danger btn-sm">Đóng bài viết</button>
			</a>
		<?php } ?>
	</div>
</div>
<div class="card mt-3">
	<div class="card-header">
		Thông tin bài viết
	</div>
	<div class="card-content" style="padding: 20px 20px;">
		<h5><?= $view_post['name']; ?></h5>
		<h6>Người phản biện: <?= $this->MainModel->counter($view_post['id_counter']); ?></h6>
		<p>Tóm tắt: <?= $view_post['description']; ?></p>
		<a href="<?= base_url('uploads/'.$view_post['fileposst']); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Tải file bài viết</a>
	</div>
</div>