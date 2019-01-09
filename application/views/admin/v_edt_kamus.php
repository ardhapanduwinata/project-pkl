<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
                <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 15px" data-toggle="modal" data-target="#addKamus_modal">Tambah Data</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/update_kamus') ?>" method="post">
                    <?php foreach ($kamus  as $a) ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Jurusan</label>
                                <?php $jurusan=$this->db->get('jurusan') ?>
                                <select class="form-control" name="jurusan" required>
                                    <?php foreach($jurusan->result() as $key) {
                                        $cat = $key->id_jurusan?>
                                        <option <?php if($cat == $a->id_jurusan) echo "selected"?>
                                                value="<?= $key->id_jurusan ?>"><?= $key->jurusan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Divisi</label>
                                <?php $divisi=$this->db->get('divisi') ?>
                                <select class="form-control" name="divisi" required>
                                    <?php foreach($divisi->result() as $key) {
                                        $cat = $key->id_jurusan?>
                                        <option <?php if($cat == $a->id_divisi) echo "selected"?>
                                                value="<?= $key->id_divisi ?>"><?= $key->divisi ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div style="float: right; padding-top: 25px">
                                <a href="<?= base_url('admin/manageData/kamus')?>" class="btn btn-secondary">Cancel</a>
                                <input type="hidden" name="id" value="<?= $a->id_kamus ?>">
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

