 <html>
    <head>
        <title><?= $title ?></title>
        <link href="<?=base_url('assets')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
        <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
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
    <div style="padding-top: 20px; padding-right: 80px">
        <button onclick="Export2Doc('isi_data','<?= $a['nama_mhs']?>')" style="float: right" class="btn btn-success">Download as Word</button>
    </div>
    <div id="isi_data">
        <p style="padding-left: 80px">PT PLN (Persero) <br>
            <u>KANTOR PUSAT</u></p>
        <br><br><br>
        <center>
            <u>NOTA DINAS</u> <br>
            Nomor:&emsp;&emsp;&emsp;&emsp;&emsp;/SDM.04.06/VPHRBHPHO/2019
        </center>
        <br><br><br>
        <p style="padding-left: 80px">
            Kepada&emsp;&emsp;: <?= $a['divisi'] ?> <br>
            Dari&emsp;&emsp;&emsp;&ensp;: VPHRBHO <br>
            Tanggal&emsp;&emsp;: <?= tgl_indo(date('Y-m-d')) ?> <br>
            Sifat&emsp;&emsp;&emsp;&ensp;: Biasa <br>
            Lampiran&ensp;&emsp;: 1 (satu) Set <br>
            Perihal&emsp;&ensp;&emsp;: Permohonan Bantuan Memfasilitasi Pelaksanaan Magang/Wawancara/Penelitian Mahasiswa <br>
        </p>
        <br><br>
        <p style="padding-left: 160px; padding-right: 160px">
            Menunjuk Surat <?= $a['univ'] ?> Nomor <?= $a['no_surat'] ?>, tanggal <?= tgl_indo($source) ?>, perihal Permohonan Praktek Kerja Lapangan;
        </p> <br><br>

        <div style="padding-left: 160px; padding-right: 160px">
            <table width="100%" border="5" align="center">
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
        </div>
        <br><br>

        <p style="padding-left: 160px; padding-right: 160px">Mohon kesediaannya untuk dapat memfasilitasi Pelaksanaan Magang/Wawancara/Penelitian.</p>
        <p style="padding-left: 160px; padding-right: 160px">Demikian disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
        <br><br><br><br><br>
        <p style="padding-right: 160px; text-align: right">
            <b>PRASETYORINI</b>
        </p>
    </div>
<?php } ?>