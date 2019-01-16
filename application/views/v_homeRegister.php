<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<link href="<?=base_url('assets')?>/css/login-register.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<head>
    <title><?= $title ?></title>

    <!-- Favicons -->
    <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <style type="text/css">
        .ui-autocomplete.ui-widget {
            font-family: Verdana,Arial,sans-serif;
            font-size: 12px;
        }

    </style>
</head>
<body style="background: white">
<div class="container register">
    <div class="row" style="height: 450px">
        <div class="col-md-3 register-left">
            <!--https://image.ibb.co/n7oTvU/logo_white.png-->
            <img style="width: 100px" src="<?= base_url('assets/img/Listrik.png') ?>" alt=""/>
            <h3 style="color: black">Selamat Datang</h3>
            <p style="color: black">Website ini untuk mempermudah para pelajar untuk mengajukan izin magang pada kantor PT PLN (PERSERO)</p>
        </div>

        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="signup-tab" data-toggle="tab" href="<?= base_url('homeRegister') ?>" role="tab" aria-controls="signup" aria-selected="true">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="login-tab" data-toggle="tab" href="<?= base_url('homeLogin') ?> "role="tab" aria-controls="login" aria-selected="false">Log In</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                    <h3 class="register-heading">Sign Up</h3>
                    <form action="<?= base_url('homeRegister/aksi_register')?>" method="post">
                    <div class="row register-form">
                        <?php if(!empty(validation_errors())){ ?>
                            <div class="alert alert-info alert-dismissable" style="width: 100%">
                                <a class="panel-close close" data-dismiss="alert">×</a>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nim" placeholder="NIM *" value="" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap *" value="" required/>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="jurusan">
                                    <option class="hidden" selected disabled>Jurusan</option>
                                    <?php foreach($jurusan as $row) { ?>
                                        <option value="<?= $row->id_jurusan;?>"><?= $row->jurusan;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="univ" id="univ" placeholder="Universitas *" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat Universitas Anda *" value="" required/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Anda *" value="" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username Anda *" value="" required/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password Anda *" value="" required/>
                            </div>
                            <input type="submit" class="btnRegister" name="register"  value="Register"/>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#univ").autocomplete({
            source: "<?php echo site_url('homeRegister/autocomplete_univ'); ?>",
            select: function( event, ui ) {
                event.preventDefault();
                var size = ui.size;
                $("#univ").val(ui.item.value);
            }
        });
    });

</script>
</body>

</html>