<div class="row">
	<div class="col-md-12 mb-3">
		<a href="<?= base_url('template-category'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách giao diện</a>
	</div>
</div>
<h5><?= $view_template['name_template']; ?></h5>
<form action="<?= base_url('template-code-update'.'?category_template='.$category_template.'&type_template='.$type_template); ?>" method="post">
  <input type="hidden" name="id_template" value="<?= $view_template['id']; ?>">
 <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                CodeMirror
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
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
        </div>
        <!-- /.col-->
      </div>
    </form>
