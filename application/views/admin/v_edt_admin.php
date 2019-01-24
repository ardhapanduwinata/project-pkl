<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
                <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 15px" data-toggle="modal" data-target="#addJurusan_modal">Tambah Data</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/update_admin') ?>" method="post">
                    <?php foreach ($admin  as $a) ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="nama">Nama User (Sesuai Divisi)</label>
                                <?php $divisi=$this->db->select('*')->from('divisi')->join('users','divisi.divisi = users.nama_user','left')->where('id_user',null)->or_where('users.nama_user', $a->nama_user)->get(); ?>
                                <select id="nama" class="form-control" name="divisi" required>
                                    <?php foreach($divisi->result() as $key) {
                                        $cat = $key->divisi?>
                                        <option <?php if($cat == $a->nama_user) echo "selected"?>
                                                value="<?= $key->divisi ?>"><?= $key->divisi ?></option>
                                    <?php } ?>
                                </select>
                                <label for="username">Username</label>
                                <input id="username" class="form-control" name="username" type="text" value="<?= $a->username ?>" required>
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

