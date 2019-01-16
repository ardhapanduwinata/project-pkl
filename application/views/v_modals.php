<div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="logout_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Siap untuk pergi?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika anda ingin mengkahiri session anda</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('homeLogin/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addJurusan_modal" tabindex="-1" role="dialog" aria-labelledby="addJurusan_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title">Tambah Jurusan Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/manageData/add_jurusan') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Jurusan</label>
                        <input class="form-control here" name="jurusan" type="text" placeholder="Masukkan Jurusan" required>
                    </div>
                    <div style="float: right;">
                        <a class="btn btn-secondary" href="<?= base_url('admin/manageData/jurusan') ?>">Cancel</a>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
            <br><br>
        </div>
    </div>
</div>

<div class="modal fade" id="addDivisi_modal" tabindex="-1" role="dialog" aria-labelledby="addDivisi_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title">Tambah Divisi</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/manageData/add_divisi') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Divisi</label>
                        <input class="form-control here" name="divisi" type="text" placeholder="Masukkan Divisi" required>
                    </div>
                    <div style="float: right;">
                        <a class="btn btn-secondary" href="<?= base_url('admin/manageData/divisi') ?>">Cancel</a>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
            <br><br>
        </div>
    </div>
</div>

<div class="modal fade" id="addKamus_modal" tabindex="-1" role="dialog" aria-labelledby="addKamus_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/add_kamus') ?>" method="post">
                    <label>Jurusan</label>
                    <div class="form-group">
                        <?php $jurusan=$this->db->get('jurusan') ?>
                        <select class="form-control" name="jurusan" required>
                            <?php foreach($jurusan->result() as $a) {?>
                                <option value="<?= $a->id_jurusan ?>"><?= $a->jurusan ?></option>
                            <?php } ?>
                        </select>

                        <label for="kategori">Divisi</label>
                        <?php $divisi=$this->db->get('divisi') ?>
                        <select class="form-control" name="divisi" required>
                            <?php foreach($divisi->result() as $key) {?>
                                <option value="<?= $key->id_divisi ?>"><?= $key->divisi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="float: right;">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>