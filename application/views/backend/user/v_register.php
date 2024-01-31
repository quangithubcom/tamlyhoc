
<!doctype html>
<html lang="en">
<head> 
    <meta charset="utf-8" />
    <title>Hội Tâm Lý Học Việt Nam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?= base_url('public/backend/'); ?>assets/images/favicon.ico">
    <script src="<?= base_url('public/backend/'); ?>assets/js/layout.js"></script>
    <link href="<?= base_url('public/backend/'); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/backend/'); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/backend/'); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-maintenance d-flex align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100 py-0 py-xl-3">
                                <div class="text-center mb-4">
                                    <a href="index.html" class="">
                                        <img src="<?= base_url('public/backend/'); ?>assets/images/logo-dark.png" alt="" height="22" class="auth-logo logo-dark mx-auto">
                                        <img src="<?= base_url('public/backend/'); ?>assets/images/logo-light.png" alt="" height="22" class="auth-logo logo-light mx-auto">
                                    </a>
                                    <p class="mt-2">User Experience & Interface Design Strategy Saas Solution</p>
                                </div>
                                
                                <div class="card my-auto overflow-hidden" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                    <div class="row g-0">
                                        <div class="col-lg-6">
                                            <div class="bg-overlay bg-primary"></div>
                                            <div class="h-100 bg-auth align-items-end">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="p-lg-5 p-4">
                                                <div>
                                                    <div class="text-center mt-1">
                                                        <h4 class="font-size-18">Đăng Kí Tài Khoản</h4>
                                                        <p>Hội Tâm Lý Học Việt Nam</p>
                                                    </div>
                                                    <?php if($this->session->flashdata('success')){ ?>
                                                       <div class="alert alert-success"><?= $this->session->flashdata('messenger') ?></div>
                                                   <?php } ?>
                                                   <?php if($this->session->flashdata('error')){ ?>
                                                       <div class="alert alert-danger"><?= $this->session->flashdata('messenger') ?></div>
                                                   <?php } ?>  
                                                   <form action="<?= base_url('register-check'); ?>" method="post" class="auth-input">
                                                    <div class="mb-2">
                                                        <label for="useremail" class="form-label">Tên đầy đủ</label>
                                                        <input type="text" class="form-control" placeholder="Tên đầy đủ của bạn" name="fullname" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="useremail" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email đăng nhập" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">Mật khẩu</label>
                                                        <input type="password" class="form-control" name="password" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">Nhập lại mật khẩu</label>
                                                        <input type="password" class="form-control" name="repassword" required>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button class="btn btn-primary w-100" type="submit" name="register" value="check">Register</button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Bạn đã có tài khoản rồi? <a href="login" class="fw-medium text-primary"> Đăng nhập</a> </p>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="<?= base_url('public/backend/'); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/node-waves/waves.min.js"></script>

<!-- Icon -->
<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<script src="<?= base_url('public/backend/'); ?>assets/js/app.js"></script>

</body>
</html>
