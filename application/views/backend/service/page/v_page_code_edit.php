<div class="row">
	<div class="col-md-12 mb-3">
		<a href="<?= base_url('page?lang='.$lang); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách giao diện</a>
	</div>
</div>
<h5><?= $view_page['name_page_'.$lang]; ?></h5>
<form action="<?= base_url('page-code-update?lang='.$lang); ?>" method="post">
  <input type="hidden" name="id_page" value="<?= $view_page['id']; ?>">
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
    $read = file('application/views/'.$view_page['url_page']);
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
