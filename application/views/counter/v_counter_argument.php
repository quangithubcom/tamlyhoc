<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nhập nội dung phản biện</h4>
                <p class="card-title-desc">Nhập nội dung phản biện</p>
                <form method="post" action="<?= base_url('user-counter-add/1/'.$id_post) ?>">
                    <textarea id="textarea" class="form-control" name="counter_info"></textarea>
                  <script>
                     CKEDITOR.replace('counter_info');
                  </script>
                  <button class="btn btn-primary mt-3 btn-sm" type="submit" name="counter">Phản biện</button>
                </form>
            </div>
        </div>
    </div>
</div>
