<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="<?=base_url('assets')?>/css/login-register.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<body style="background: white">
<div class="container register">
    <div class="row" style="margin-bottom: 5%">
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" value="" />
                                    <input type="submit" class="btnRegister"  value="Login"/>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>