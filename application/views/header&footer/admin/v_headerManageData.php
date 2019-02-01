<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('assets') ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets') ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?= base_url('assets') ?>/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?= base_url('assets') ?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<!--    <link href=" https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" rel="stylesheet">-->



    <!-- Morris Charts CSS -->
    <link href="<?= base_url('assets') ?>/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/css/toggle.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= base_url('assets') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>

<?php $role = $this->session->userdata('role'); ?>

<div id="wrapper" class="toggled">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('admin/homeAdmin') ?>">Hello <?= $siapa ?></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="<?=  base_url('admin/homeAdmin')?>"><i class="fas fa-home"></i>Home Page</a>
            </li>
            <li>
                <a href="<?= base_url('admin/manageData/admdiv_edit/'.$this->session->userdata('id'))?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i><sup>
                        <?php if (count($notif) != 0) echo count($notif);?>
                    </sup><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <?php if(is_array($notif) && !empty($notif)){
                        foreach($notif as $key){?>
                            <li>
                                <a href="<?php echo base_url('admin/manageData/update_notif/'.$key->id_notif)?>">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-2"> <i class="fa fa-file-text fa-1x"></i></div>
                                            <div class="col-md-8"><?= $key->pesan?></div>
                                            <!--  <span class="pull-right text-muted small">4 minutes ago</span>-->
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                        <?php }}
                    else{?>
                        <li class="divider"></li>
                        <li>
                            <center><div>Tidak ada pemberitahuan</div></center>
                        </li>
                        <li class="divider"></li>
                    <?php }?>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <li>
                <a data-toggle="modal" data-target="#logout_modaladm" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
        <!-- /.navbar-top-links -->
        <div id="sidebar-wrapper">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li>
                            <span id="menu-toggle" data-toggle="button" class="btn" style="right: 0%">
                                <a><i class="fa fa-navicon fa-fw"></i></a>
                            </span>
                        </li>
                        <li class="sidebar-search">
                            <div class="masked">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                </div>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?= base_url('admin/manageData')?>"><i class="fas fa-tachometer-alt"></i> <span class="masked">Dashboard <span class="masked"></a>
                        </li>
                        <?php if($role == '0') {?>
                            <li>
                                <a href="<?= base_url('admin/manageData/admin')?>"><i class="fas fa-user-check"></i>  <span class="masked">Manage Admin Divisi</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/manageData/jurusan') ?>"><i class="fa fa-table fa-fw"></i> <span class="masked"> Jurusan</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/manageData/divisi') ?>"><i class="fas fa-chalkboard-teacher"></i>  <span class="masked">Divisi</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/manageData/kamus')?>"><i class="fa fa-book fa-fw"></i>  <span class="masked">Kamus</span></a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="<?= base_url('admin/manageData/permohonan/semua')?>"><i class="fas fa-users"></i> <span class="masked">Daftar Permohonan Magang</span></a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $page_header ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>