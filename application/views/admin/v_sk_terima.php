<html>
<head>
    <title><?= $title ?></title>
    <link href="<?=base_url('assets')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://unpkg.com/docx@4.0.0/build/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
    <script src="<?= base_url('assets') ?>/FileServer.js/dist/FileServer.js"></script>
    <script src="<?= base_url('assets') ?>/FileServer.js/src/FileServer.js"></script>
</head>

<script>
    function Export2Doc(element, filename = ''){
        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml+document.getElementById(element).innerHTML+postHtml;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        // Specify link url
        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

        // Specify file name
        filename = filename?filename+'.doc':'document.doc';

        // Create download link element
        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob ){
            navigator.msSaveOrOpenBlob(blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = url;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }

        document.body.removeChild(downloadLink);
    }
</script>
<?php
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
</html>

<br><br>


<?php foreach ($datamagang as $a)
    $no = 1;
$source = $a['tgl_mohon_surat'];
{ ?>
    <div style="padding-top: 20px; padding-left: 80px">
        <table>
            <tr>
                <td>
                    <a href="<?= base_url('admin/manageData/view_sk_terima/').$a['id_form'] ?>">
                        <button class="btn btn-success">Diterima</button>
                    </a>
                </td>
                <td>
                    <a href="<?= base_url('admin/manageData/view_sk_tolak/').$a['id_form'] ?>">
                        <button class="btn btn-danger">Ditolak</button>
                    </a>
                </td>
                <td style="width: 59%"></td>
                <td style="padding-left: 10px">
                    <a style="float: right; margin-right: 80px" href="<?= base_url('admin/manageData/permohonan')?>"><button type="button" class="btn btn-danger">X</button></a>
                    <button style="float: right; margin-right: 5px" onclick="Export2Doc('isi_data','SL-<?= date("Y") ?>.PermohonanMagang.<?= $a['nim']?>.<?= $a['nama_mhs']?>')" class="btn btn-primary">Download as Word</button>
                </td>
            </tr>
        </table>
    </div>
    <div id="isi_data" style="padding-top: 100px;">
        <div style="padding-left: 80px">
            <table width="100%">
                <tr>
                    <td style="width: 10%">Nomor</td>
                    <td>:</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;/SDM.04.06/DIVTLN/<?= date('Y')?></td>
                    <td style="text-align: right; padding-right: 40px"><?= tgl_indo(date('Y-m- ')) ?>&emsp;&emsp;&emsp;</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1 (satu) Set</td>
                </tr>
                <tr>
                    <td>Sifat</td>
                    <td>:</td>
                    <td>Biasa</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td><?= $perihal ?></td>
                    <td>Kepada</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>Yth. Rektor <?= $a['univ'] ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> <?= $a['alamat'] ?></td>
                </tr>
            </table>
        </div>
        <br><br>

        <div style="margin-left: 80px; margin-right: 80px; padding-left: 160px; padding-right: 160px">

            <table>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: justify">
                        Menunjuk Surat <?= $a['univ'] ?> Nomor <?= $a['no_surat'] ?>, tanggal <?= tgl_indo($source) ?>, perihal Permohonan Kerja Praktek Magang/Wawancara/Penelitian , atas nama Mahasiswa :
                    </td>
                </tr>
                <tr>
                    <td>&emsp;</td>
                    <td>&emsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="1" align="center">
                            <tr style="text-align: center">
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                            </tr>
                            <tr>
                                <td style="text-align: center"><?= $no++ ?></td>
                                <td>&emsp; <?= $a['nim'] ?></td>
                                <td>&emsp; <?= $a['nama_mhs']?></td>
                                <td>&emsp; <?= $a['jurusan']?></td>
                            </tr>
                            <?php for($i=2;$i<=5;$i++) {
                                if(!empty($a['nim_mhs'.$i])){?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td>&emsp; <?= $a['nim_mhs'.$i] ?></td>
                                        <td>&emsp; <?= $a['nama_mhs'.$i]?></td>
                                        <td>&emsp; <?= $a['jurusan']?></td>
                                    </tr>
                                <?php } ?>
                            <?php }?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&emsp;</td>
                </tr>
                <tr>
                    <td style="text-align: justify">
                        Dengan ini disampaikan bahwa pengajuan magang/PKL Mahasiswa tersebut dapat kami fasilitasi.
                    </td>
                </tr>
                <tr>
                    <td>&emsp;</td>
                </tr>
                <tr style="text-align: justify">
                    <td>Untuk kelengkapan administrasi, agar mahasiswa yang bersangkutan dapat mengembalikan Surat Pernyataan Magang ke Divisi Pengembangan Talenta pada saat hari pertama melaksanakan Magang/Wawancara/Penelitian.</td>
                </tr>
                <tr>
                    <td>&emsp;</td>
                </tr>
                <tr>
                    <td style="text-align: justify">
                        Demikian disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
                    </td>
                </tr>
            </table>
        </div>
        <br><br>

        <div style="margin-left: 200px">
            <br><br>
            <center>
                <p>
                    <b>VICE PRESIDENT HUMAN RESOURCES BUSSINESS</b><br>
                    <b>PARTNER OF HEAD OFFICE</b>

                    <br><br><br><br><br>
                    <b>PRASETYORINI</b>
                </p>
            </center>
        </div>
        <div style="padding-left: 160px;margin-left: 80px">
            <p>Tembusan <br>
                &emsp;-&emsp;<?= $a['divisi']?></p>
        </div>
    </div>
<?php } ?>