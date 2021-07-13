<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>MyQuest</title>
<link rel="icon" href="/ui/img/favicon.ico">

<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Font Awesome -->
<link rel="stylesheet" href="/ui/font-awesome/css/all.min.css">

<!-- jQuery UI 1.11.4 -->
<script src="/ui/plugins/jquery/jquery.min.js"></script>
<script src="/ui/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/ui/plugins/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<!-- Tempusdominus Bbootstrap 4 -->
<script src="/ui/plugins/moment/moment.min.js"></script>
<link rel="stylesheet" href="/ui/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<script src="/ui/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- overlayScrollbars -->
<link rel="stylesheet" href="/ui/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<script src="/ui/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- jQuery confirm -->
<link rel="stylesheet" href="/ui/plugins/jquery-confirm/3.3.0/jquery-confirm.min.css">

<link rel="stylesheet" href="/ui/js/plugins/clockpicker/bootstrap-clockpicker.min.css">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="/ui/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<!-- data tables css adminlte -->
<link rel="stylesheet" href="/ui/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="/ui/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/ui/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="/ui/plugins/toastr/toastr.min.css">
<script src="/ui/plugins/toastr/toastr.min.js"></script>

<!-- daterange picker -->
<link rel="stylesheet" href="/ui/plugins/daterangepicker/daterangepicker.css">
<script src="/ui/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Ion Slider -->
<link rel="stylesheet" href="/ui/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<script src="/ui/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="/ui/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Select2-->
<link rel="stylesheet" href="/ui/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/ui/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="/ui/plugins/select2/js/select2.full.min.js"></script>

<!-- custom style -->
<link rel="stylesheet" href="/ui/css/adminlte.css">
<script src="/ui/js/adminlte.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="/ui/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- CSS alters -->
<link rel="stylesheet" href="/ui/css/admin.css">

<script src="/ui/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

</head>
<body class="sidebar-mini layout-fixed control-sidebar-open text-sm">

<div class="wrapper">

    <!-- navbar -->
    <nav class="main-header navbar navbar-expand navbar bg-gradient-primary sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="/"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="/coins"><h5><i class="fas fa-coins"></i> <?=$this->mod->user->getById($this->lib->extern->session->user['id'])['coins']?></h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/support">Support</a>
            </li>
            <!-- user dropdown menu -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    <i class="far fa-user fa-fw"></i> <span class="d-none d-sm-inline-block"><?=$this->mod->user->getNameById($this->lib->extern->session->user['id'])?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="row">
                        <div class="col-12 p-3 text-center">
                            <?=$this->mod->user->getNameById($this->lib->extern->session->user['id'])?>
                            <br />
                            <?php
                            $user = $this->mod->user->getById($this->lib->extern->session->user['id']);
                            ?>
                            <span class="text-muted">(<?=$user['username']?>)</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-12 p-3 text-center">
                            <a href="/logout" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-fw"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- /.user dropdown menu -->
        </ul>
    </nav>
    <!-- /.navbar -->

    <aside class="main-sidebar elevation-1 sidebar-light-primary">
        <!-- brand Logo -->
        <a href="/" class="brand-link navbar bg-gradient-primary">
            <img src="/ui/img/favicon.ico" alt="myQuestImage" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text text-bold text-light">MyQuest</span>
        </a>
        <!-- /.brand logo -->

        <!-- sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="/" class="nav-link<?=( ( @$argv['menu'] == 'dashboard' ) ? ' active' : '' )?>">
                            <i class="nav-icon fas fa-scroll fa-fw"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <?php
                    $menus = $this->mod->menu->getMenu($this->lib->extern->session->user['id']);
                    foreach ( $menus as $menu ){
                        if ( $this->mod->master->module($menu['module']) ) {
                            ?>
                            <li class="nav-item">
                                <a href="<?=$menu['link']?>" class="nav-link<?=( ( @$argv['menu'] == $menu['module'] ) ? ' active' : '' )?>">
                                    <i class="nav-icon <?=$menu['icon']?>"></i>
                                    <p><?=$menu['name']?></p>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


