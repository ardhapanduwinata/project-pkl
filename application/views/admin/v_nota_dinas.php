 <html>
    <head>
        <title><?= $title ?></title>
        <link href="<?=base_url('assets')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?=base_url('assets')?>/img/favicon.ico" rel="shortcut icon">
        <link href="<?=base_url('assets')?>/img/apple-icon-180x180.png" rel="apple-touch-icon">
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

<!--    <script>-->
<!--        function exportdocx(data, namafile='') {-->
<!--            let docx = require("docx");-->
<!--            import * as docx from "docx";-->
<!---->
<!--            import { saveAs } from 'file-saver';-->
<!--            var fs = require("fs");-->
<!--            var docx = require("docx");-->
<!---->
<!--            // Create document-->
<!--            var doc = new docx.Document();-->
<!---->
<!--            // Add some content in the document-->
<!--            var paragraph = new docx.Paragraph(data);-->
<!--            // Add more text into the paragraph if you wish-->
<!--//            paragraph.addRun(new docx.TextRun());-->
<!--//            doc.addParagraph(paragraph);-->
<!--            var judul = namafile;-->
<!--            // Used to export the file into a .docx file-->
<!--            var packer = new docx.Packer();-->
<!--            packer.toBuffer(doc).then((buffer) => {fs.writeFileSync(judul".docx", buffer);});-->
<!--        }-->
<!--    </script>-->
</html>

<br><br>

<?php foreach ($datamagang as $a)
$no = 1;
$source = $a['tgl_mohon_surat'];
{ ?>
    <div style="padding-top: 20px; padding-right: 80px; float: right">
        <button onclick="Export2Doc('isi_data','NL-<?= date("Y") ?>.PermohonanMagang.<?= $a['nim']?>.<?= $a['nama_mhs']?>')" class="btn btn-success">Download as Word</button>
        <a href="<?= base_url('admin/manageData/permohonan/semua')?>"><button type="button" class="btn btn-danger">Kembali</button></a>
    </div>
    <div id="isi_data">
        <p style="padding-left: 80px">PT PLN (Persero) <br>
            <u>KANTOR PUSAT</u></p>
        <br><br>
        <center>
            <u>NOTA DINAS</u> <br>
            Nomor:&emsp;&emsp;&emsp;&emsp;&emsp;/SDM.04.06/VPHRBPHO/<?= date('Y')?>
        </center>
        <br><br><br>
        <div style="padding-left: 80px">
            <table>
                <tr>
                    <td style="width: 13%">Kepada</td>
                    <td>:</td>
                    <td><?= $a['divisi'] ?></td>
                </tr>
                <tr>
                    <td>Dari</td>
                    <td>:</td>
                    <td>VPHRBPHO</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= tgl_indo(date('Y-m-d')) ?></td>
                </tr>
                <tr>
                    <td>Sifat</td>
                    <td>:</td>
                    <td>Biasa</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1 (satu) Set</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td><?= $perihal ?></td>
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
                    <td>
                        Menunjuk Surat <?= $a['univ'] ?> Nomor <?= $a['no_surat'] ?>, tanggal <?= tgl_indo($source) ?>, perihal Permohonan Praktek Kerja Lapangan;
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
                    <td>
                        Mohon kesediaannya untuk dapat memfasilitasi Pelaksanaan Magang/Wawancara/Penelitian.
                    </td>
                </tr>
                <tr>
                    <td>&emsp;</td>
                </tr>
                <tr>
                    <td>
                        Demikian disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
                    </td>
                </tr>
            </table>
        </div>
        <br><br>

        <br><br><br><br><br>
        <p style="padding-right: 160px; text-align: right">
            <b>PRASETYORINI</b>
        </p>
    </div>
<?php } ?>