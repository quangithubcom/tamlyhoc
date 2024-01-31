<?php if(in_array(72,$this->decentralization)){ ?>
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Thêm giao diện chuyên mục</button>
	</div>
</div>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myExtraLargeModalLabel">Thêm giao diện chuyên mục</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('template-category-create'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" method="post">
					<div class="mb-3">
						<label class="form-label">Tên giao diện chuyên mục</label>
						<input type="text" class="form-control" name="name_template" required>
					</div>
					<div class="mb-3">
						<button class="btn btn-sm btn-primary" type="submit" name="add"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>
<div class="row mt-3">
	<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách giao diện</h4>
                <p class="card-title-desc">Tổng hợp danh sách giao diện.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên giao diện</th>
                            <th>Giao diện chính</th>
                            <th class="text-center">Url giao diện</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_template as $key => $template): ?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= $template['name_template']; ?></td>
                                <td><?= $template['url_template']; ?></td>
                                <td class="text-center">
                                     <?php if($template['keyselect'] == 1){ echo '<span class="badge badge-soft-success font-size-12">Giao diện chính</span>'; }else{ ?>
                                    <a href="<?= base_url('template-key-select/'.$template['id'].'?category_template='.$category_template.'&type_template='.$type_template); ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Đặt làm giao diện chính</button>
                                    </a>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                	<a href="<?= base_url('template-code/'.$template['id'].'?category_template='.$category_template.'&type_template='.$type_template); ?>" class="text-primary">
                                		<i class="fa-solid fa-code"></i>
                                	</a>
                                </td>
                                <td>
                                    <?php if(in_array(64,$this->decentralization)){ ?>
                                    <a href="<?= base_url('template-category-edit/'.$template['id'].'?category_template='.$category_template.'&type_template='.$type_template); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <?php } ?>
                                    <?php if(in_array(65,$this->decentralization)){ ?>
                                    <a href="<?= base_url('template-delete/'.$template['id'].'?category_template='.$category_template.'&type_template='.$type_template); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="far fa-trash-alt"></i>
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
