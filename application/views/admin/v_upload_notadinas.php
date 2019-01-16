<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/uploadnd') ?>" method="post">
                    <?php foreach ($datamagang  as $a) ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>NIM</label>
                                <input id="nip" class="form-control here" name="nim" type="text" placeholder="NIM Mahasiswa" value="<?= $a->nim ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Mahasiswa</label>
                                <input id="mhs" class="form-control here" name="mhs" type="text" placeholder="Nama Mahasiswa" value="<?= $a->nama_mhs ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Jurusan</label>
                                <input id="jurusan" class="form-control here" name="jurusan" type="text" placeholder="Jurusan" value="<?= $a->jurusan ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Divisi</label>
                                <input id="divisi" class="form-control here" name="divisi" type="text" placeholder="Divisi" value="<?= $a->divisi ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Nomor Nota Dinas</label>
                                <input id="nond" class="form-control here" name="nond" type="text" placeholder="Nomor Nota Dinas" value="<?= $a->no_nota?>" required>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Status Mahasiswa</label><br>
                                <button class="btn btn-danger" name="status" value="Ditolak">Ditolak</button>
                                <button class="btn btn-success" name="status" value="Diterima">Diterima</button>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>File Nota Dinas</label>
                                <?php if($a->no_nota != null) {?>
                                    <br>
                                    <a class="btn btn-primary" href="<?= base_url('admin/manageData/download_uploaded_nd/'.$a->id_nota) ?>">Download Nota Dinas</a>
                                    <br><p>*nota dinas yang telah ter-upload sebelumnya</p>
                                <?php } ?>
                            </div>
                            <div>
                                <div style="float: right; padding-top: 25px">
                                    <a href="<?= base_url('admin/manageData/permohonan')?>" class="btn btn-secondary">Cancel</a>
                                    <input type="hidden" name="id" value="<?= $a->id_form ?>">
                                    <?php if($a->no_nota == null) {?>
                                        <button class="btn btn-primary" type="submit">Upload</button>
                                    <?php } else { ?>
                                        <button class="btn btn-danger" type="submit">Re-Upload</button>
                                    <?php }?>
                                </div>
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