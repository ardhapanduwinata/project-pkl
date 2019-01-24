<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
                <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 15px" data-toggle="modal" data-target="#addAdmin_modal">Tambah Data</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="display table table-striped table-bordered table-hover" id="table_jurusan">
                    <thead>
                    <tr>
                        <th style="width: 10%">No</th>
                        <th style="width: 35%">Nama Admin (Sesuai Divisi)</th>
                        <th style="width: 35%">Username Admin</th>
                        <td style="width: 20%; ">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($admin as $a) {?>
                        <tr>
                            <td style="text-align: center"><?= $no++ ?></td>
                            <td><?= $a->nama_user ?></td>
                            <td><?= $a->username ?></td>
                            <td>
                                <center>
                                    <a class="btn btn-success" href="<?= base_url('admin/manageData/edt_admin/'.$a->id_user) ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')" href="<?= base_url('admin/manageData/del_admin/'.$a->id_user)?>">Delete</a>
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
