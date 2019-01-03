<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="<?=base_url('assets')?>/css/login-register.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<body style="background: white">
<div class="container register">
    <div class="row" style="width: 1000px">
        <div class="col-md-3 register-left">
            <!--https://image.ibb.co/n7oTvU/logo_white.png-->
            <img style="width: 100px" src="<?= base_url('assets/img/Listrik.png') ?>" alt=""/>
            <h3 style="color: black">Selamat Datang</h3>
            <p style="color: black">Website ini untuk mempermudah para pelajar untuk mengajukan izin magang pada kantor PT PLN (PERSERO)</p>
        </div>
        
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="signup-tab" data-toggle="tab" href="<?= base_url('homeLogin') ?>" role="tab" aria-controls="signup" aria-selected="true">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="login-tab" data-toggle="tab" href="<?= base_url('homeLogin/login') ?> "role="tab" aria-controls="login" aria-selected="false">Log In</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                    <h3 class="register-heading">Sign Up</h3>
                    <form action="<?= base_url('homeRegister/aksi_register')?>" method="post">
                        <?php if(!empty(validation_errors())){ ?>
                            <div class="alert alert-warning alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nim" placeholder="NIM *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="jurusan">
                                    <option class="hidden" selected disabled>Jurusan</option>
                                    <?php foreach($jurusan as $row) { ?>
                                        <option value="<?php echo $row->id_jurusan;?>"><?php echo $row->jurusan;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="univ" placeholder="Universitas *" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat Anda *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Anda *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username Anda *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password Anda *" value="" />
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
</body>