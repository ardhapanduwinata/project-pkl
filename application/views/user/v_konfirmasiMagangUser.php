
<div class="container" style="padding-top: 20px; padding-bottom: 20px">

    <div class="row">
        <div class="col-md-3">

            <div class="list-group " style="padding-bottom: 10px">
                <a href="<?php echo base_url('user');?>/magangUser" class="list-group-item list-group-item-action ">Form Pengajuan</a>
                <a href="<?php echo base_url('user');?>/magangUser/konfirmasi" class="list-group-item list-group-item-action active" style="background-color: #0c2e8a;border-color: #0c2e8a">Konfirmasi</a>

            </div>
        </div>
        <?php
        $sar;
        $far;?>
        <div class="col-md-9">
            <div class="card" style="height: 483px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Konfirmasi PKL</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills nav-justified col-8 offset-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-magang-tab" data-toggle="pill" href="#pills-magang" role="tab" aria-controls="pills-magang" aria-selected="true">Magang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-wawancara-tab" data-toggle="pill" href="#pills-wawancara" role="tab" aria-controls="pills-wawancara" aria-selected="false">Penelitian/Wawancara</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-magang" role="tabpanel" aria-labelledby="pills-magang-tab">
                                    <center>
                                        <div class="card" style="margin-top: 20px">
                                            <div class="card-body">
                                                <?php
                                                if(!empty($status)) {
                                                    if (count($status) > 1) {
                                                        //var_dump(count($status));
                                                        foreach ($status as $row) {
                                                            if($row->jenis == 'Magang'){
                                                                if(empty($row->file_sk)){
                                                                    if($row->status == 'Diproses'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }else if($row->status == 'Ditolak'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }else if($row->status == 'Diterima'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }
                                                                }else if (!empty($row->file_sk)){
                                                                    if($row->status == 'Diproses'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }else if($row->status == 'Ditolak'){
                                                                        echo 'Mohon Maaf Permohonan Magang Anda Tidak Dapat Kami Akomodir';?>
                                                                        <br><br>
                                                                        <a class="btn btn-outline-danger" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                        <?php
                                                                    }else if($row->status == 'Diterima'){
                                                                        $sar = $row->status;
                                                                        echo 'Permohonan Magang Anda Telah Disetujui';
                                                                        ?>
                                                                        <br><br>
                                                                        <a class="btn btn-outline-success" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }else if (count($status) == 1) {
                                                        //var_dump(count($status));
                                                        foreach ($status as $row) {
                                                            if($row->jenis == 'Magang'){
                                                                if(empty($row->file_sk)){
                                                                    if($row->status == 'Diproses'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }else if($row->status == 'Ditolak'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }else if($row->status == 'Diterima'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }
                                                                }else if (!empty($row->file_sk)){
                                                                    if($row->status == 'Diproses'){
                                                                        echo 'Mohon Menunggu Permohonan Magang Anda Sedang Kami Proses';
                                                                    }else if($row->status == 'Ditolak'){
                                                                        echo 'Mohon Maaf Permohonan Magang Anda Tidak Dapat Kami Akomodir';?>
                                                                        <br><br>
                                                                        <a class="btn btn-outline-danger" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                        <?php
                                                                    }else if($row->status == 'Diterima'){
                                                                        $sar = $row->status;
                                                                        echo 'Permohonan Magang Anda Telah Disetujui';
                                                                        ?>
                                                                        <br><br>
                                                                        <a class="btn btn-outline-success" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }else{
                                                    echo 'Anda Belum Mengajukan Form Pengajuan Magang';
                                                }?>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <div class="tab-pane fade" id="pills-wawancara" role="tabpanel" aria-labelledby="pills-wawancara-tab">
                                    <center>
                                        <div class="card" style="margin-top: 20px">
                                            <div class="card-body">
                                                <?php
                                                if(!empty($status)) {
                                                    if (count($status) > 1) {
                                                        foreach ($status as $row) {
                                                            if($row->jenis == 'Penelitian/Wawancara') {
                                                                if ($row->status == 'Diproses') {
                                                                    echo 'Mohon Menunggu Permohonan Penelitian/Wawancara Anda Sedang Kami Proses';
                                                                }else if($row->status == 'Ditolak' && empty($row->file_sk)){
                                                                    echo 'Mohon Menunggu Permohonan Penelitian/Wawancara Anda Sedang Kami Proses';
                                                                }else if($row->status == 'Ditolak' && !empty($row->file_sk) ){
                                                                    echo 'Mohon Maaf Permohonan Penelitian/Wawancara Anda Tidak Dapat Kami Akomodir';?>
                                                                    <br><br>
                                                                    <a class="btn btn-outline-danger" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                    <?php
                                                                }else if($row->status == 'Diterima' && !empty($row->file_sk)){
                                                                    $far = $row->status;
                                                                    echo 'Permohonan Penelitian/Wawancara Anda Telah Disetujui';?>
                                                                    <br><br>
                                                                    <a class="btn btn-outline-success" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                    <?php
                                                                }else if($row->status == 'Diterima' && empty($row->file_sk)){
                                                                    echo 'Mohon Menunggu Permohonan Penelitian/Wawancara Anda Sedang Kami Proses';
                                                                }
                                                            }
                                                        }
                                                    }else if(count($status) == 1){
                                                        foreach ($status as $row) {
                                                            if($row->jenis == 'Penelitian/Wawancara') {
                                                                if ($row->status == 'Diproses') {
                                                                    echo 'Mohon Menunggu Permohonan Penelitian/Wawancara Anda Sedang Kami Proses';
                                                                }else if($row->status == 'Ditolak' && empty($row->file_sk)){
                                                                    echo 'Mohon Menunggu Permohonan Penelitian/Wawancara Anda Sedang Kami Proses';
                                                                }else if($row->status == 'Ditolak' && !empty($row->file_sk) ){
                                                                    echo 'Mohon Maaf Permohonan Penelitian/Wawancara Anda Tidak Dapat Kami Akomodir';?>
                                                                    <br><br>
                                                                    <a class="btn btn-outline-danger" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                    <?php
                                                                }else if($row->status == 'Diterima' && !empty($row->file_sk)){
                                                                    $far = $row->status;
                                                                    echo 'Permohonan Penelitian/Wawancara Anda Telah Disetujui';?>
                                                                    <br><br>
                                                                    <a class="btn btn-outline-success" href="<?= base_url('user/magangUser/download_uploaded_sk/'.$row->id_srtkonfirm) ?>">Silahkan Download Surat Konfirmasi Anda Disini</a>
                                                                    <?php
                                                                }else if($row->status == 'Diterima' && empty($row->file_sk)){
                                                                    echo 'Mohon Menunggu Permohonan Penelitian/Wawancara Anda Sedang Kami Proses';
                                                                }
                                                            }else{
                                                                echo 'Anda Belum Mengajukan Form Pengajuan Penelitian/Wawancara';
                                                            }
                                                        }
                                                    }
                                                }else{
                                                    echo 'Anda Belum Mengajukan Form Pengajuan Penelitian/Wawancara';
                                                }?>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="magang">
                        <?php
                        foreach ($status as $row) {
                            if($row->jenis == 'Magang'&& $row->status == 'Diterima' && !empty($row->file_sk) && empty($row->file_sksm)){ ?>
                                <div style="width: 100%;padding-top: 15%">
                                    <a class="btn btn-outline-info" style="float: right" href="<?= base_url('user/magangUser/download_uploaded_sp/') ?>">Download Surat Pernyataan PKL </a><br>
                                </div>
                                <div style="width: 100%;padding-top: 2%">
                                    <p style="color: red; float: right">*Surat Pernyataan wajib dibawa pada saat hari pertama PKL.</p>
                                </div>
                            <?php }else if($row->jenis == 'Magang'&& $row->status == 'Diterima' &&  !empty($row->file_sk) && !empty($row->file_sksm)){?>
                                <div style="width: 100%;padding-top: 15%">
                                    <a class="btn btn-outline-info" style="float: right" href="<?= base_url('user/magangUser/download_uploaded_ss/'.$row->id_sksm) ?>">Download Surat Keterangan Selesai PKL </a><br>
                                </div>
                                <div style="width: 100%;padding-top: 2%">
                                    <p style="color: red; float: right">*Jika pihak kampus membutuhkan.</p>
                                </div>
                            <?php }}?>
                    </div>
                    <div id="wawancara" style="visibility: hidden">
                        <?php
                        foreach ($status as $row) {
                            if($row->jenis == 'Penelitian/Wawancara'&& $row->status == 'Diterima' &&  !empty($row->file_sk) && empty($row->file_sksm)){ ?>
                                <div style="width: 100%;padding-top: 15%">
                                    <a class="btn btn-outline-info" style="float: right" href="<?= base_url('user/magangUser/download_uploaded_sp/') ?>">Download Surat Pernyataan PKL </a><br>
                                </div>
                                <div style="width: 100%;padding-top: 2%">
                                    <p style="color: red; float: right">*Surat Pernyataan wajib dibawa pada saat hari pertama PKL.</p>
                                </div>
                            <?php }else if($row->jenis == 'Penelitian/Wawancara'&& $row->status == 'Diterima' &&  !empty($row->file_sk) && !empty($row->file_sksm)){?>
                                <div style="width: 100%;padding-top: 15%">
                                    <a class="btn btn-outline-info" style="float: right" href="<?= base_url('user/magangUser/download_uploaded_ss/'.$row->id_sksm) ?>">Download Surat Keterangan Selesai PKL </a><br>
                                </div>
                                <div style="width: 100%;padding-top: 2%">
                                    <p style="color: red; float: right">*Jika pihak kampus membutuhkan.</p>
                                </div>
                            <?php }}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myList a:last-child').tab('show');
        $('#magang').show();
        $('#pills-wawancara-tab').click(function () {
            document.getElementById("wawancara").style.visibility="visible";
            $('#magang').hide();
        });
        $('#pills-magang-tab').click(function () {
            $('#magang').show();
            document.getElementById("wawancara").style.visibility="hidden";
        });
    });
</script>