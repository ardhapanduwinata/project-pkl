<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/admdiv_update') ?>" method="post">
                    <?php foreach ($admin  as $a) ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <?php if($this->session->userdata('role') == '0') { ?>
                                    <label for="nama">Nama User</label>
                                    <input id="nama" class="form-control" name="nama" type="text" value="<?= $a->nama_user ?>" required>
                                <?php } else { ?>
                                    <label for="nama">Nama User (Sesuai Divisi)</label>
                                    <input id="nama" class="form-control" name="nama" type="text" value="<?= $a->nama_user ?>" readonly>
                                <?php } ?>
                                <label for="username">Username</label>
                                <input id="username" class="form-control" name="username" type="text" value="<?= $a->username ?>" required>
                                <label for="password">Password</label>
                                <input id="password" class="form-control" name="password" type="password" required>
                            </div>
                            <div style="float: right; padding-top: 25px">
                                <a href="<?= base_url('admin/manageData/admin')?>" class="btn btn-secondary">Cancel</a>
                                <input type="hidden" name="id" value="<?= $a->id_user ?>">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
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

