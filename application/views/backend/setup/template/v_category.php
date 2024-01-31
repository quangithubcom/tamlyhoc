<div class="row">
    <div class="col-xl-3">
        <div class="card filemanager-sidebar">
            <div class="card-body">
                <div class="d-flex flex-column h-100">
                    <div>
                        <?php if(in_array(72,$this->decentralization)){ ?>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Thêm giao diện</button>
                            </div>
                            <!--  Modal content for the above example -->
                            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Thêm giao diện</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('template-main-create'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Tên giao diện</label>
                                                    <input type="text" class="form-control" name="name_template" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Url giao diện</label>
                                                    <input type="text" class="form-control" name="url_template" required>
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
                        <ul class="list-unstyled categories-list">
                            <?php foreach ($list_template as $key => $template): ?>
                            <li>
                                <a href="<?= base_url('template-main/?category_template=main&type_template=category&id_template='.$template['id']); ?>" class="text-body d-flex align-items-center">
                                    <i class="fa-regular fa-file-code"></i>  &nbsp;&nbsp;&nbsp;<span class="me-auto"> <?= $template['name_template']; ?></span>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-9">
        <form action="<?= base_url('template-main-update'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" method="post">
  <input type="hidden" name="id_template" value="<?= $view_template['id']; ?>">
        <div class="card">
            <div class="card-header">
                <h5><?= $view_template['name_template']; ?></h5>
            </div>
            <div class="card-body">
<textarea id="codeMirrorDemo" class="p-3" name="codefile">
<?php
    $read = file('application/views/'.$view_template['url_template']);
    foreach ($read as $line) {
    echo $line;
    }
?></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" name="update"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
            </div>
    </div>
</form>
</div>
</div>
