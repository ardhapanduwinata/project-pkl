<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
                <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 15px" data-toggle="modal" data-target="#addKamus_modal">Tambah Data</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th style="width: 10%">No</th>
                        <th style="width: 35%">Nama Jurusan</th>
                        <th style="width: 35%">Nama Divisi</th>
                        <td style="width: 20%">Action</td>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($kamus as $a) {?>
                        <tbody>
                        <tr>
                            <td style="text-align: center"><?= $no++ ?></td>
                            <td><?= $a->jurusan ?></td>
                            <td><?= $a->divisi ?></td>
                            <td>
                                <center>
                                    <a class="btn btn-success" href="<?= base_url('admin/manageData/edt_kamus/'.$a->id_kamus) ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')" href="<?= base_url('admin/manageData/del_kamus/'.$a->id_kamus)?>">Delete</a>
                                </center>
                            </td>
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
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

