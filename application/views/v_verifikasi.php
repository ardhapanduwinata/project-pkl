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
                        <h3 class="register-heading">Send Verification</h3>
                        <div class="row register-form">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form action="<?= base_url('homeRegister/verification_again/').$id?>" method="post">
                                <p align="justify">Kami telah mengirimkan tautan untuk mengaktifkan akun anda, Silahkan cek email. Jika tidak muncul kirim ulang verifikasi</p>
                                    <center> <div id="countdown" style="color: #c9c9c9;"></div><button type="submit" class="btnReset" id="btnReset" style="visibility: hidden">Kirim Ulang Verifikasi </button></a></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
       // $("#btnReset").hide();
        function countDown(sec, elem) {
            var intervalId = undefined;
            var intervalId = setInterval(function () {
                var element = document.getElementById(elem);
                element.innerHTML = "00:" + sec;
                if (sec < 10 && sec >=1) {
                    element.innerHTML = "00:0" + sec;
                }else if (sec < 1) {
                    clearInterval(intervalId);
                    element.innerHTML = null;
                    $("#btnReset").show();
//                    element.innerHTML.style.display = "none";
                   document.getElementById("btnReset").style.visibility = "visible"; // ← Uncomment this line!
                }
                sec--;
            }, 1000);
        }

        countDown(10, "countdown");
    });
</script>

