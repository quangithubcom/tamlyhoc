<form action="<?= base_url('template-category-update'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" method="post">
	<input type="hidden" name="id_template" value="<?= $view_template['id']; ?>">
	<div class="row">
		<div class="col-md-12 mb-3">
			<a href="<?= base_url('template-category'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách giao diện</a>
		</div>
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">Thông tin giao diện</h6>
					<div class="mb-3">
						<label class="form-label">Tên giao diện chuyên mục</label>
						<input type="text" class="form-control" name="name_template" value="<?= $view_template['name_template']; ?>" required>
					</div>
					<div class="mb-3">
						<button class="btn btn-sm btn-primary" type="submit" name="update"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>