<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="<?=base_url('assets')?>/css/login-register.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<head>
    <title><?= $title ?></title>

    <!-- Favicons -->
    <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">
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
                    <a class="nav-link" id="signup-tab" data-toggle="tab" href="<?= base_url('homeRegister') ?>" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="<?= base_url('homeLogin') ?> "role="tab" aria-controls="login" aria-selected="true">Log In</a>
                </li>
            </ul>
            <?php if($div == 'myTabContent'){?>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <h3 class="register-heading">Reset your password</h3>
                    <div class="row register-form">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <p>Masukkan alamat email Anda dan kami akan mengirimkan Anda tautan untuk mereset kata sandi Anda.</p>
                            <form action="<?= base_url('homeRegister/reset_pass')?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Masukkan alamat email anda" required/>
                                </div>
                                <div class="form-group">
                                    <?php if(!empty($note)){ ?>
                                        <div class="alert alert-info" style="width: 100%">
                                            <?php echo $note; ?>
                                        </div>
                                    <?php } ?>
                                    <center>
                                        <button type="submit" class="btnReset" id="btnReset">Kirim password reset email</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else if($div == 'myTabContent2'){?>
            <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <h3 class="register-heading">Reset your password</h3>
                    <div class="row register-form">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <p align="justify">Periksa email Anda untuk tautan untuk mengatur ulang kata sandi Anda. Jika tidak muncul dalam beberapa menit, periksa folder spam Anda.</p>
                            <center> <a href="<?= base_url('homeLogin')?>"> <button type="button" class="btnReset" id="btnReset">Kembali Ke Login</button></a></center>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>