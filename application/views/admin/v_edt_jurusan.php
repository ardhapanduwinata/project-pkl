<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 55px" >
                <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 15px" data-toggle="modal" data-target="#addJurusan_modal">Tambah Data</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/update_jurusan') ?>" method="post">
                    <?php foreach ($jurusan  as $a) ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="jurusan">Nama Jurusan</label>
                                <input class="form-control" name="jurusan" type="text" value="<?= $a->jurusan ?>">
                            </div>
                            <div style="float: right; padding-top: 25px">
                                <a href="<?= base_url('admin/manageData/jurusan')?>" class="btn btn-secondary">Cancel</a>
                                <input type="hidden" name="id" value="<?= $a->id_jurusan ?>">
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

