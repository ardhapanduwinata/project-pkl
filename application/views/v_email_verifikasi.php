<html>
<head>
    <title>Verifikasi Email</title>
</head>
<body>
<div class="container-fluid">
    <table>
        <tr>
            <td>
                <img src="<?= base_url('assets/img/pln.png') ?>" style="width: 80px; margin-right: 20px; margin-bottom: 20px">
            </td>
            <td>
                <p style="font-size: 20px; font-family: Arial">
                    <b>
                        PT PLN (Persero) <br>
                        KANTOR PUSAT
                    </b>
                </p>
            </td>
        </tr>
    </table>
    <table style="margin-left: 30px; font-family: Calibri">
        <tr>
            <td>
                <p>
                    Jalan Trunojoyo Blok M l/135 Kebayoran Baru - Jakarta 12160 <br>
                    Telepon: (021) 7261875, 7261122, 7262234 &emsp; Facsmile: (021) 7221330 &emsp; Website: www.pln.co.id
                </p>
            </td>
        </tr>
    </table>
</div>
<br><br>
<?php foreach($datauser as $a) {?>
<div>
    <center>
        <p style="font-family: Arial; font-size: 50px"><b>Terima kasih</b></p>
    </center>
    <p style="margin-left: 110px; font-family: Arial">Salam, <?= $a->nama_mhs?></p>
    <p style="margin-left: 110px; font-family: Arial">Berikut kami informasikan kembali data yang telah anda inputkan ke sistem kami:</p>
    <table style="margin-left: 110px; font-family: Arial">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $a->nama_mhs?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $a->nim ?></td>
        </tr>
        <tr>
            <td>Universitas</td>
            <td>:</td>
            <td><?= $a->univ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td><?= $a->jurusan?></td>
        </tr>
    </table>
    <p style="margin-left: 110px; font-family: Arial">Berikut adalah tautan agar anda segera aktif dan dapat mengajukan permohonan magang.</p>
    <br>
    <p style="margin-left: 110px; font-family: Arial"><a href="<?= $laman_login?>">Silahkan klik disini</a></p>
</div>
<?php } ?>
</body>
</html>