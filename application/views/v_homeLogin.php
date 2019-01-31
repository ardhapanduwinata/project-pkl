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
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <h3 class="register-heading">Login</h3>
                        <div class="row register-form">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form action="<?= base_url('homeLogin/aksi_login')?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                </div>
                                    <div class="form-group">
                                        <?php if(!empty($note)){ ?>
                                            <div class="alert alert-info" style="width: 100%">
                                                <?php echo $note; ?>
                                            </div>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-4" style="margin-top: 4%; padding: 8px;">
                                                <a  href="<?= base_url('homeRegister/reset') ?>"><button type="button" class="btn" style="background: #0062cc;color: #fff;border-radius: 1.5rem;">Forgot Password?</button></a>
                                            </div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btnLogin">Login</button>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
