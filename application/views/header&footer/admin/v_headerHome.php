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
    <script src="<?=base_url('assets')?>/lib/bootstrap/js/bootstrap.min.js"></script>

    <!-- Libraries CSS Files -->
    <link href="<?=base_url('assets')?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="<?=base_url('assets')?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets')?>semantic/dist/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="<?= base_url('assets')?>semantic/dist/semantic.min.js"></script>

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
    </div>
</section>
<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <table>
                <tr>
                    <td><img src="<?= base_url('assets/img/pln.png') ?>" style="width: 40px"></td>
                    <td>
                        <h1><a href="#body" style="color: #02ADF2" class="scrollto">&ensp;PLN</a></h1>
                    </td>
                </tr>
            </table>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="<?= base_url('admin/homeAdmin') ?>">Home Page</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/manageData') ?>">Manage Data</a></li>
                <li><a class="nav-link" data-toggle="modal" data-target="#logout_modal" href="">Log Out</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->