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

    <!-- Morris Charts CSS -->
    <link href="<?= base_url('assets') ?>/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>

<div id="wrapper">

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
                <a href="admin/homeAdmin"><i class="fas fa-home"></i>Home Page</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li>
                <a data-toggle="modal" data-target="#logout_modal" href=""><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?= base_url('admin/manageData')?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/manageData/jurusan') ?>"><i class="fa fa-table fa-fw"></i> Jurusan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/manageData/divisi') ?>"><i class="fas fa-chalkboard-teacher"></i> Divisi</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/manageData/kamus')?>"><i class="fa fa-book fa-fw"></i> Kamus</a>
                    </li>
                    <li>
                        <a href=""><i class="fas fa-users"></i> Daftar Permohonan Magang<span style="padding-top: 3px" class="fa arrow"></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?= base_url('admin/manageData/permohonan/semua')?>">Seluruh Data Permohonan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/manageData/permohonan/diproses')?>">Diproses</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/manageData/permohonan/diterima')?>">Diterima</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/manageData/permohonan/ditolak')?>">Ditolak</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $page_header ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>