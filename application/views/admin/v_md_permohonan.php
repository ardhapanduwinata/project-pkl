<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive" style="width: 100%">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="table_permohonan" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: auto;text-align: center">No Surat</th>
                            <th style="width: auto;text-align: center">Tanggal</th>
                            <th style="width: auto;text-align: center">Download File Mhs</th>
                            <th style="width: auto;text-align: center">Download/Upload Nota Dinas</th>
                            <th style="width: auto;text-align: center">Status</th>
                            <th style="width: auto;text-align: center">Divisi</th>
                            <th style="width: auto;text-align: center">NIM</th>
                            <th style="width: auto;text-align: center">Nama Mhs</th>
                            <th style="width: auto;text-align: center">Jurusan</th>
                            <th style="width: auto;text-align: center">Universitas</th>
                            <th style="width: auto;text-align: center">Jenis PKL</th>
                            <th style="width: auto;text-align: center">Tanggal Mulai</th>
                            <th style="width: auto;text-align: center">Judul PKL</th>
                        </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($datamagang as $a) {?>
                            <tbody>
                            <tr>
                                <td style="text-align: center"><?= $no++ ?></td>
                                <td><?= $a->no_surat ?></td>
                                <td><?= $a->tgl_mohon_surat ?></td>
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
                                                <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-warning">ReUpload <i class="fas fa-upload"></i></button></a>
                                            <?php }?>
                                        </div>
                                    </center>
                                </td>
                                <td><?= $a->status?></a></td>
                                <td><?= $a->divisi?></td>
                                <td><?= $a->nim?></td>
                                <td><?= $a->nama_mhs?></td>
                                <td><?= $a->jurusan?></td>
                                <td><?= $a->univ?></td>
                                <td><?= $a->jenis?></td>
                                <td><?= $a->tgl_mulai?></td>
                                <td><?= $a->judul?></td>
                            </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<script>
    $(document).ready(function(){
        $('#uploadnd_modal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : '<?= base_url('admin/manageData/uploadnd') ?>', //Here you will fetch records
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                    $('.fetched-data').html(data);//Show fetched data from database
                }
            });
        });
    });
</script>