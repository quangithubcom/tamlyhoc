<?php if($view_post['status'] == 0){ ?>
	<div class="row mt-3">
		<div class="col-md-12">
			<a href="<?= base_url('all-post'); ?>">
				<button type="button" class="btn btn-dark btn-sm"><i class="fa-solid fa-arrow-left"></i> Danh sách bài</button>
			</a>
			<a href="<?= base_url('all-post-status/'.$view_post['id'].'/1'); ?>">
				<button type="button" class="btn btn-primary btn-sm">Duyệt bài</button>
			</a>
		</div>
	</div>
<?php }else{ ?>
	<div class="row mt-3">
		<div class="col-md-12">
			<a href="<?= base_url('all-post'); ?>">
				<button type="button" class="btn btn-dark btn-sm"><i class="fa-solid fa-arrow-left"></i> Danh sách bài</button>
			</a>
			<a href="<?= base_url('all-post-status/'.$view_post['id'].'/0'); ?>">
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
		</div>
	</div>
<?php } ?>
<div class="card mt-3">
	<div class="card-header">
		Thông tin bài viết
	</div>
	<div class="card-content" style="padding: 20px 20px;">
		<h5><?= $view_post['name']; ?></h5>
		<h6>Người phản biện: <?= $this->MainModel->counter($view_post['id_counter']); ?></h6>
		
	</div>
</div>