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
                <form action="<?= base_url('homeLogin/logout') ?>" method="post">
                    <input type="hidden" name="status" value="logout">
                    <a href=""><button class="btn btn-primary">Logout</button></a>
                </form>
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
                        <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
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
                        <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
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
                        <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade-in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center<h3 class="modal-title"> <b>Apakah Status Permohonan Pengajuan PKL ini :</b></h3><center>
            </div>
            <?php echo form_open_multipart('admin/manageData/change_view_sk'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <input type="hidden" id="id" name="id">
                        <input type="submit" class="btn btn-success" id="btn" name="btn" value="Diterima">
                        <input type="submit" class="btn btn-danger" id="pict" name="btn" value="Ditolak">
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
            <br><br>
        </div>
    </div>
</div>

<div class="modal fade" id="addIntro_modal" tabindex="-1" role="dialog" aria-labelledby="addIntro_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Gambar Intro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form enctype="multipart/form-data" action="<?= base_url('admin/homeAdmin/add_intro')?>"  method="post">
                        <div class="form-group">
                            <label for="nama">Judul Konten</label>
                            <input class="form-control" name="konten" type="text" placeholder="Intro" value="intro" readonly>
                            <br>
                            <label for="nama">Gambar Konten</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" name="gambar" id="gambar" required>
                                <label for="nama" class="custom-file-label">Pilih File anda</label>
                            </div>
                        </div>
                        <div style="float: right;">
                            <a class="btn btn-secondary" data-dismiss="modal" style="color: white">Cancel</a>
                            <button class="btn btn-primary" type="submit">Tambah Gambar</button>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addKonten_modal" tabindex="-1" role="dialog" aria-labelledby="addKonten_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Konten</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/homeAdmin/add_konten')?>"  method="post">
                    <div class="form-group">
                        <label for="nama">Judul Konten</label>
                        <input type="text" class="form-control" name="judul_konten" id="judul_konten" placeholder="Judul Konten Ini" required>
                        <label style="margin-top: 15px" for="nama">Isi Konten</label>
                        <textarea type="text" class="form-control" name="isi_konten" id="isi_konten" placeholder="Isi Atau Deskripsi Singkat Konten Ini. Max 1000 huruf." rows="3" required></textarea>
                        <label style="margin-top: 15px" for="nama">Gambar Konten</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" name="gambar" id="gambar" required>
                            <label for="nama" class="custom-file-label">Pastikan Ukuran Foto 16:9 dan Lanscape</label>
                        </div>
                    </div>
                    <div style="float: right; margin-top: 5px">
                        <a class="btn btn-secondary" data-dismiss="modal" style="color: white">Cancel</a>
                        <button class="btn btn-primary" type="submit">Tambah Konten</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editKonten_modal" tabindex="-1" role="dialog" aria-labelledby="editKonten_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Header</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form enctype="multipart/form-data" action="<?= base_url('admin/homeAdmin/edit_header')?>"  method="post">
                        <div class="form-group">
                            <?php
                            $where = array('id_header' => '2');
                            $header = $this->db->get_where('header_home', $where)->result();
                            foreach ($header as $a) {
                                if ($a->header == null || $a->deskripsi == null) { ?>
                                    <h2>Untitled</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <label for="nama">Judul Konten</label>
                                    <input class="form-control" name="judul" type="text" placeholder="Judul pada konten ini" required>
                                    <br>
                                    <label for="nama">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" type="text" placeholder="Berikan Deskripsi yang menarik untuk konten ini" rows="3" required></textarea>
                                <?php } else { ?>
                                    <label for="nama">Judul Konten</label>
                                    <input class="form-control" name="judul" type="text" placeholder="Judul pada konten ini" value="<?= $a->header ?>" required>
                                    <br>
                                    <label for="nama">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" type="text" placeholder=" " rows="5" required><?= $a->deskripsi ?></textarea>
                                <?php }
                            }?>
                        </div>
                        <div style="float: right;">
                            <a class="btn btn-secondary" data-dismiss="modal" style="color: white">Cancel</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editKontak_modal" tabindex="-1" role="dialog" aria-labelledby="editKontak_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kontak</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form enctype="multipart/form-data" action="<?= base_url('admin/homeAdmin/edit_kontak')?>"  method="post">
                        <div class="form-group">
                            <?php
                            $kontak = $this->db->get('kontak')->result();
                            foreach ($kontak as $a) { ?>
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" type="text" placeholder=" " rows="3" required><?= $a->alamat ?></textarea>
                                <label for="notelp" style="margin-top: 10px">No Telpon</label>
                                <input class="form-control" name="notelp" id="notelp" type="text" value="<?= $a->notelp ?>" required>
                                <label for="email" style="margin-top: 10px">Email</label>
                                <input class="form-control" name="email" id="email" type="text" value="<?= $a->email ?>" required>
                            <?php } ?>
                        </div>
                        <div style="float: right;">
                            <a class="btn btn-secondary" data-dismiss="modal" style="color: white">Cancel</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>