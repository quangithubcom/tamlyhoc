<?php if(in_array(52,$this->decentralization)){ ?>
<div class="row">
	<div class="col-md-12">
        <a href="<?= base_url('language-creat?lang='.$lang); ?>">
		<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm ngôn ngữ</button>
        </a>
	</div>
</div>
<?php } ?>
<div class="row mt-3">
	<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách ngôn ngữ hệ thống</h4>
                <p class="card-title-desc">Tổng hợp danh sách ngôn ngữ hệ thống.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">ID</th>
                            <th class="text-center">Ngôn ngữ Tiếng Việt</th>
                            <th class="text-center">Ngôn ngữ Tiếng Anh</th>
                            <th class="text-center">Shortcode</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_language as $language): ?>
                            <tr>
                                <td><?= $language['id']; ?></td>
                                <td><?= $language['text_vn']; ?></td>
                                <td><?= $language['text_en']; ?></td>
                                <td><input type="text" class="form-control" value="&lt;?= $this-&gt;FronModel-&gt;getLanguage(<?= $language['id']; ?>,$lang); ?&gt;"></td>
                                <td class="text-center">
                                    <?php if(in_array(53,$this->decentralization)){ ?>
                                    <a href="<?= base_url('language-edit/'.$language['id'].'?lang='.$lang); ?>" class="px-2 text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <?php } ?>
                                    <?php if($language['confirm_delete'] == 1){ ?>
                                    <?php if(in_array(54,$this->decentralization)){ ?>
                                    <a href="<?= base_url('language-delete/'.$language['id'].'?lang='.$lang); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
    </div> <!-- end col -->
</div>
