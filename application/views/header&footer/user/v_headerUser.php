<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?=base_url('assets')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?=base_url('assets')?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Reveal
      Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body id="body">

<!--==========================
  Top Bar
============================-->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-user-circle"></i> Welcome <?= $siapa ?>
        </div>
        <div class="contact-info float-right">
            <?php foreach ($mhs as $a) { ?>
                <a href="mailto:<?= $a->email?>"><?= $a->email?> </a><i class="fa fa-envelope-o"></i>
            <?php } ?>
        </div>
    </div>
</section>

<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <h1><a class="scrollto" href="<?=site_url('user/homeUser')?>">Reve<span>al</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a class="nav-link" href="<?=base_url('user/homeUser/pengajuan') ?>">Pengajuan Permohonan Magang</a></li>
                <li><a class="nav-link" href="<?=site_url('user/homeUser/biodata')?>">Manage Biodata</a></li>
                <li><a class="nav-link" data-toggle="modal" data-target="#logout_modal" href="">Log Out</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
