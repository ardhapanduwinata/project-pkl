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
    <script src="<?=base_url('assets')?>/lib/jquery/jquery.min.js"></script>

    <!-- Main Stylesheet File -->
    <link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">
<!--    <link href="--><?php //echo base_url('assets'); ?><!--/dropzone/dropzone.css" type="text/css" rel="stylesheet" />-->


    <!-- =======================================================
      Theme Name: Reveal
      Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
    <style type="text/css">
        .nav-pills .nav-link.active,.nav-pills .show>.nav-link{color:#fff;background-color:#0c2e8a}
        a {
            color: #000;
            transition: 0.5s;
        }
        a:hover,
        a:active,
        a:focus {
            color: darkgrey;
            outline: none;
            text-decoration: none;
        }
    </style>
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
            <table>
                <tr>
                    <td><img src="<?= base_url('assets/img/pln.png') ?>" style="width: 40px"></td>
                    <td>
                        <h1><a href="<?= base_url('user/homeUser') ?>" class="scrollto">&ensp;PT<span style="color: #ED3237"> PLN</span></a></h1>
                    </td>
                </tr>
            </table>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="<?= base_url('user/homeUser') ?>">Beranda</a></li>
                <li class="menu-has-children"><a href=""><i class="fa fa-bell"></i><sup>
                            <?php if (count($notif) != 0) echo count($notif);?>
                        </sup></a>
                    <ul>
                        <?php if(is_array($notif) && !empty($notif)){
                            foreach($notif as $key){?>
                                <li><a href="<?= base_url('user/magangUser/update_notif/'.$key->id_notif);?>"><?= $key->pesan?></a></li>
                            <?php }}else{ ?>
                            <li><a href="#">Tidak ada pemberitahuan</a></li>
                        <?php }?>
                    </ul>
                </li>
                <li><a href="<?= base_url('user/magangUser') ?>">Pengajuan Form Magang</a></li>
                <li><a class="nav-link" href="<?= base_url('user/homeUser/biodata') ?>">Ubah Profil</a></li>
                <li><a class="nav-link" data-toggle="modal" data-target="#logout_modal" href="">Log Out</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
