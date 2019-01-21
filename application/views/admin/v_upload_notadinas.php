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
                                <input id="nip" class="form-control" name="nim" type="text" placeholder="NIM Mahasiswa" value="<?= $a->nim ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Mahasiswa</label>
                                <input id="mhs" class="form-control" name="mhs" type="text" placeholder="Nama Mahasiswa" value="<?= $a->nama_mhs ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Jurusan</label>
                                <input id="jurusan" class="form-control" name="jurusan" type="text" placeholder="Jurusan" value="<?= $a->jurusan ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Divisi</label>
                                <input id="divisi" class="form-control" name="divisi" type="text" placeholder="Divisi" value="<?= $a->divisi ?>" required="required" readonly>
                            </div>
                            <div class="col-md-6" style="padding-top: 20px">
                                <label>Nomor Nota Dinas</label>
                                <input id="nond" class="form-control here" name="nond" type="text" placeholder="Nomor Nota Dinas" value="<?= $a->no_nota?>" required>
                            </div>
                            <?php if($a->no_nota != null) {?>
                                <div class="col-md-6" style="padding-top: 20px">
                                    <label for="">Upload Nota Dinas <b style="color: red">Baru</b></label>
                                    <input type="file" name="file_nond" accept="application/pdf,.doc, .docx" class="form-control" required>
                                </div>
                            <?php } else {?>
                                <div class="col-md-6" style="padding-top: 20px">
                                    <label>File Nota Dinas</label>
                                    <input type="file" name="file_nond" class="form-control" required>
                                </div>
                            <?php } ?>
                        </div>
                        <div>
                            <div style="float: right; padding-top: 50px; padding-right: 15px">
                                <a href="<?= base_url('admin/manageData/permohonan')?>" class="btn btn-secondary">Cancel</a>
                                <input type="hidden" name="id" value="<?= $a->id_form ?>">
                                <?php if($a->no_nota == null) {?>
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                <?php } else { ?>
                                    <button class="btn btn-warning" type="submit">Re-Upload</button>
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
<script>
    $("button").click(function(){
        $("button").removeClass("active");
        $(this).addClass("active");
    });
</script>
<style>
    .active {
        background-color: #aeaeae !important;
    }
</style>