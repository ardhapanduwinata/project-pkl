<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
                <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 15px" data-toggle="modal" data-target="#addKamus_modal">Tambah Data</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: auto;text-align: center">No Surat</th>
                        <th style="width: auto;text-align: center">Tanggal</th>
                        <th style="width: auto;text-align: center">Perihal</th>
                        <th style="width: auto;text-align: center">NIM</th>
                        <th style="width: auto;text-align: center">Nama Mhs</th>
                        <th style="width: auto;text-align: center">Jurusan</th>
                        <th style="width: auto;text-align: center">Jenis PKL</th>
                        <th style="width: auto;text-align: center">Tanggal Mulai</th>
                        <th style="width: auto;text-align: center">Judul PKL</th>
                        <th style="width: auto;text-align: center">Universitas</th>
                        <th style="width: auto;text-align: center">Divisi</th>
                        <th style="width: auto;text-align: center">Download File Mhs</th>
                        <th>Download Nota Dinas</th>
                        <th>Upload Nota Dinas</th>
                        <th>Status</th>
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
                            <td><?= $a->perihal?></td>
                            <td><?= $a->nim?></td>
                            <td><?= $a->nama_mhs?></td>
                            <td><?= $a->jurusan?></td>
                            <td><?= $a->jenis?></td>
                            <td><?= $a->tgl_mulai?></td>
                            <td></td>
                            <td><?= $a->univ?></td>
                            <td><?= $a->divisi?></td>
                            <td><a class="btn btn-outline-success" href="">Download Surat Permohonan Mahasiswa</a></td>
                            <td><a class="btn btn-outline-success" href="">Download Surat Dinas</a></td>
                            <td><a class="btn btn-outline-success" href="">Upload Surat Dinas</a></td>
                            <td>$a->status</a></td>
                        </tr>
                        </tbody>
                    <?php } ?>
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

