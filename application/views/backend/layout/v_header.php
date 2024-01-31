<!doctype html>
<html lang="en">
<head>  
    <meta charset="utf-8">
    <title>CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('public/backend/'); ?>assets/images/favicon.ico">
    <!-- plugin css -->
    <link href="<?= base_url('public/backend/'); ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">     
    <script src="<?= base_url('public/backend/'); ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('public/backend/'); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?= base_url('public/backend/'); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?= base_url('public/backend/'); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <script src="<?= base_url('public/backend/'); ?>ckeditor/ckeditor.js"></script>
    <script src="<?= base_url('public/backend/'); ?>ckfinder/ckfinder.js"></script>
</head>

<body data-sidebar="colored">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                      <!-- LOGO -->
                      <div class="navbar-brand-box">
                        <a href="" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url('public/backend/'); ?>assets/images/logo-dark.png" alt="logo-sm-dark" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('public/backend/'); ?>assets/images/logo-sm-dark.png" alt="logo-dark" height="25">
                            </span>
                        </a>

                        <a href="" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('public/backend/'); ?>assets/images/logo-light.png" alt="logo-sm-light" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('public/backend/'); ?>assets/images/logo-sm-light.png" alt="logo-light" height="25">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                    
                    <!-- start page title -->
                    <div class="page-title-box align-self-center d-none d-md-block">
                        <h4 class="page-title mb-0 text-uppercase"><?php if(isset($title)){ echo $title; }else{ echo 'CRM'; } ?></h4>
                    </div>
                    <!-- end page title -->
                </div>

                <div class="d-flex">

                    <?php 
                    $check_notification = array(
                        'user_to' => $this->session->userdata('LoggedIn')['id'],
                        'read_notification' => 0,
                    );
                    $list_notification = $this->db->select('*')->from('tbl_notification')->where($check_notification)->get()->result_array();
                    ?>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-notification-3-line"></i>
                            <?php if(count($list_notification) > 0){ ?>
                                <span class="noti-dot"></span>
                            <?php } ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Thông báo </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> Xem tất cả thông báo</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar="" style="max-height: 230px;">
                                <?php if(count($list_notification) > 0){ ?>
                                    <?php foreach ($collection as $value): ?>
                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="fa-solid fa-circle-exclamation"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1">Bạn có 3 liên hệ mới</h6>
                                                    <div class="font-size-12">
                                                        <p class="mb-1">Khách hàng để lại liên hệ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach ?>
                                <?php }else{ ?>
                                    <div class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="fa-solid fa-circle-exclamation"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-1">Bạn không có thông báo nào!</h6>
                                                <div class="font-size-12">
                                                    <p class="mb-1">Bạn đã đọc hết các thông báo.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> Xem nhiều hơn..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

           <!-- LOGO -->
           <div class="navbar-brand-box">
            <a href="" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="<?= base_url('public/backend/'); ?>assets/images/logo-sm-dark.png" alt="logo-sm-dark" height="24">
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url('public/backend/'); ?>assets/images/logo-dark.png" alt="logo-dark" height="22">
                </span>
            </a>

            <a href="" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?= base_url('public/backend/'); ?>assets/images/logo-sm-light.png" alt="logo-sm-light" height="24">
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url('public/backend/'); ?>assets/images/logo-light.png" alt="logo-light" height="22">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn" id="vertical-menu-btn">
            <i class="ri-menu-2-line align-middle"></i>
        </button>

        <div data-simplebar="" class="vertical-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <?php $this->load->view('backend/layout/v_menu'); ?>

            </div>
            <!-- Sidebar -->
        </div>

        <div class="dropdown px-3 sidebar-user sidebar-user-info">
            <button type="button" class="btn w-100 px-0 border-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="<?= base_url('public/backend/'); ?>assets/images/bg.jpg" class="img-fluid header-profile-user rounded-circle" alt="">
                    </div>

                    <div class="flex-grow-1 ms-2 text-start">
                        <span class="ms-1 fw-medium user-name-text"><?= $this->session->userdata('LoggedIn')['name']; ?></span>
                    </div>

                    <div class="flex-shrink-0 text-end">
                        <i class="mdi mdi-dots-vertical font-size-16"></i>
                    </div>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="<?= base_url('edit-password'); ?>"><i class="fa-solid fa-lock-open" style="color: #000"></i> <span class="align-middle">Đổi mật khẩu</span></a>
                <a class="dropdown-item" href="<?= base_url('logout'); ?>"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000"></i> <span class="align-middle">Đăng xuất</span></a>
            </div>
        </div>

    </div>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                
                <?php $this->load->view('backend/layout/v_noti'); ?>
                
                