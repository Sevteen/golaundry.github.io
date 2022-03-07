    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title['header'];?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/toastr/toastr.min.css">
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url();?>assets/css/print.min.css">
    <script src="<?= base_url();?>assets/bower_components/angular/angular.min.js"></script>

    <style>
        textarea{
            resize: none;
            min-height: 8rem;
        }
    </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <?php
    if(!$this->session->userdata('jenis') || $this->session->userdata('jenis')!='Admin'){
        $this->session->sess_destroy();
        redirect('authorization');
    }
    ?>
    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url('assets/')?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('authorization/logout')?>" role="button">
                <b>LOGOUT</b>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="<?= base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama_pegawai');?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>
        <?php 
        $hal = $this->uri->segment(1);
        $hal2 = $this->uri->segment(2);
        ?> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?=base_url('dashboard')?>" class="nav-link <?=($hal=='dashboard')?'active':''?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('profile')?>" class="nav-link <?=($hal=='profile')?'active':''?>">
                    <i class="nav-icon fas fa-house-user"></i>
                    <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('pegawai')?>" class="nav-link <?=($hal=='pegawai')?'active':''?>">
                    <i class="nav-icon fas fa-id-badge"></i>
                    <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('pelanggan')?>" class="nav-link <?=($hal=='pelanggan')?'active':''?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('daftarharga')?>" class="nav-link <?=($hal=='daftarharga')?'active':''?>">
                    <i class="nav-icon fas fa-list"></i>
                    <p>List Harga</p>
                    </a>
                </li>
                <li class="nav-item <?=($hal=='transaksi')?'menu-open':''?>">
                    <a href="#" class="nav-link <?=($hal=='transaksi')?'active':''?>">
                    <i class="nav-icon fas fa-shopping-basket"></i>
                    <p>Transaksi</p>
                    <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview rounded" style="background-color: #27272a">
                        <li class="nav-item">
                            <a href="<?=base_url('transaksi/pemesanan')?>" class="nav-link <?=($hal2=='pemesanan')?'active':''?>">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('transaksi/pembayaran')?>" class="nav-link <?=($hal2=='pembayaran')?'active':''?>">
                            <i class="fas fa-money-check-alt nav-icon"></i>
                            <p>Pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('transaksi/riwayat')?>" class="nav-link <?=($hal2=='riwayat')?'active':''?>">
                            <i class="fas fa-history nav-icon"></i>
                            <p>Riwayat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('laporan')?>" class="nav-link <?=($hal=='laporan')?'active':''?>">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?=$title['header'];?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?=$title['header'];?></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->