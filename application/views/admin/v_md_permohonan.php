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
                                    <center>
                                        <a type="button" class="btn btn-outline btn-success" href="<?= base_url('admin/manageData/download_dtmhs/'.$a->id_form)?>">Download</a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('admin/manageData/view_notadinas/'.$a->id_form) ?>"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                            <?php
                                            if($a->no_nota == null) {?>
                                                <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                            <?php }?>
                                        </div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <div>
                                            <?php
                                            if($a->no_nota == null) {?>
                                                <p>Nota Dinas harus diupload terlebih dahulu</p>
                                            <?php } else { ?>
                                                <?php if($a->download == 1) {?>
                                                    <a href="<?= base_url('admin/manageData/view_sk_terima/'.$a->id_form)?>"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                                    <?php if($a->file_sk == null) {?>
                                                        <a href="<?= base_url('admin/manageData/view_uploadsk/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('admin/manageData/view_uploadsk/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                                    <?php }?>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('admin/manageData/view_sk_terima/'.$a->id_form)?>"><button type="button" class="btn btn-primary btn-block"><i class="fas fa-download"></i> Download</button></a>
                                                <?php } ?>
                                            <?php }?>
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
