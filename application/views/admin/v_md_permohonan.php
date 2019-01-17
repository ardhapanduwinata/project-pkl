<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <table class="display table table-striped table-bordered table-hover " id="table_permohonan" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: auto;text-align: center">Tanggal</th>
                            <th style="width: auto;text-align: center">Nama Mhs</th>
                            <th style="width: auto;text-align: center">Jurusan</th>
                            <th style="width: auto;text-align: center">Universitas</th>
                            <th style="width: auto;text-align: center">Divisi</th>
                            <th style="width: auto;text-align: center">Status</th>
                            <th style="width: auto;text-align: center">Jenis PKL</th>
                            <th style="width: auto;text-align: center">Tanggal Mulai</th>
                            <th style="width: auto;text-align: center">Judul PKL</th>
                            <th style="width: auto;text-align: center">No Surat</th>
                            <th style="width: auto;text-align: center">Download File Mhs</th>
                            <th style="width: auto;text-align: center">Download/Upload Nota Dinas</th>
                            <th style="width: auto;text-align: center">Download/Upload Surat Konfirm</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($datamagang as $a) {?>
                            <tr>
                                <td style="text-align: center"><?= $no++ ?></td>
                                <td><?= $a->tgl_mohon_surat ?></td>
                                <td><?= $a->nama_mhs?></td>
                                <td><?= $a->jurusan?></td>
                                <td><?= $a->univ?></td>
                                <td><?= $a->divisi?></td>
                                <td>
                                    <?php if($a->status == "Diterima"){?>
                                        <p style="color: green"><?= $a->status?></p>
                                    <?php } elseif($a->status == "Ditolak") { ?>
                                        <p style="color: red"><?= $a->status?></p>
                                    <?php } else { ?>
                                        <p style="color: black"><?= $a->status?></p>
                                    <?php } ?>
                                </td>
                                <td><?= $a->jenis?></td>
                                <td><?= $a->tgl_mulai?></td>
                                <td><?= $a->judul?></td>
                                <td><?= $a->no_surat ?></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px">
                                                <center>
                                                    <a type="button" class="btn btn-outline btn-success" href="<?= base_url('admin/manageData/download_dtmhs/'.$a->id_form)?>">Download</a>
                                                </center>
                                            </td>
                                            <td style="padding-left: 10px">
                                                klik tombol berikut untuk mendownload file yang diupload oleh mahasiswa
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px; padding-right: 5px">
                                                <a href="<?= base_url('admin/manageData/view_notadinas/'.$a->id_form)?>"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                            </td>
                                            <td style="padding-left 10px;padding-top: 10px">
                                                <?php if($a->no_nota == null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                                <?php }?>
                                            </td>
                                            <td style="padding-left: 80px; padding-top: 10px">
                                                <?php if($a->no_nota != null && $a->file_nd != null) {?>
                                                    <a class="btn btn-outline btn-danger" href="<?= base_url('admin/manageData/download_uploaded_nd/'.$a->id_nota) ?>">Download ND Terupload</a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <?php if($a->no_nota != null && $a->file_nd) {?>
                                                    Nomor Nota Dinas: <b><?= $a->no_nota?></b>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px; padding-right: 5px">
                                                <?php
                                                if($a->no_nota == null) {?>
                                                    <p>Nota Dinas harus diupload terlebih dahulu</p>
                                                <?php } else { ?>
                                                <a href="javascript:void(0);" data-id="<?php echo $a->id_form ; ?>" data-toggle="modal" data-target="#edit-data">
                                                    <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-primary <?php if($a->download != 1) echo 'btn-block'; ?>"><i class="fas fa-download"></i><?php if($a->download != 1) echo ' Download'; ?></button></a>
                                                <?php if($a->download == 1){?>
                                            </td>
                                            <td style="padding-top: 10px">
                                                <?php if($a->file_sk == null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadsk/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadsk/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                                <?php }?>
                                                       <?php }?>
                                                    <?php }?>
                                            </td>
                                            <td style="padding-left: 80px; padding-top: 10px">
                                                <?php if($a->no_konfirm != null && $a->file_sk != null && $a->no_nota != null && $a->download == '1') {?>
                                                    <a class="btn btn-outline btn-danger" href="<?= base_url('admin/manageData/download_uploaded_sk/'.$a->id_srtkonfirm) ?>">Download SK Terupload</a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <?php if($a->no_konfirm != null && $a->file_sk != null && $a->no_nota != null && $a->download == '1') {?>
                                                    Nomor Surat Konfirmasi: <b><?= $a->no_konfirm?></b>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <center>
                                        <div>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
