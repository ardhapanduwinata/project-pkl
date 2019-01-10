
<div class="container" style="padding-top: 20px; padding-bottom: 20px">

    <div class="row">
        <div class="col-md-3">

            <div class="list-group " style="padding-bottom: 10px">
                <a href="<?php echo base_url('user');?>/magangUser" class="list-group-item list-group-item-action active " style="background-color: #0c2e8a;border-color: #0c2e8a">Form Pengajuan</a>
                <a href="<?php echo base_url('user');?>/magangUser/konfirmasi" class="list-group-item list-group-item-action ">Konfirmasi</a>

            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Form Pengajuan Permohonan PKL</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-9 col-3" style="float: right">
                            <button id="add_field_button" class="btn btn-outline-secondary" type="button">Tambah Mahasiswa</button>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <?php
                            echo form_open_multipart('user/magangUser/uploadPengajuan',array('class' => 'form-horizontal upload-form')); ?>
                            <div class="input_fields_wrap">
                                <div class="form-group row">
                                    <label for="nim" class="col-4 col-form-label">NIM</label>
                                    <div class="col-8">
                                        <input id="nim" name="nim1" placeholder="NIM" class="form-control here"  type="text" value="<?= $user[0]->nim?>" required="required" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama1" placeholder="Nama Lengkap" value="<?= $user[0]->nama_user?>" class="form-control here" type="text" required="required" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurusan" class="col-4 col-form-label">Jurusan</label>
                                <div class="col-8">
                                    <?php foreach($jurusan as $row) {
                                        $cat = $row->id_jurusan;
                                        if($cat ==  $user[0]->id_jurusan){?>
                                            <input id="jurusan" name="jurusan" value="<?php echo $row->jurusan?>" class="form-control here" type="text" required="required" readonly>
                                        <?php }?>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="universitas" class="col-4 col-form-label">Universitas</label>
                                <div class="col-8">
                                    <input id="univ" name="univ" placeholder="Universitas Anda" value="<?= $user[0]->univ?>" class="form-control here" type="text" required="required" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-4 col-form-label">Jenis</label>
                                <div class="col-8">
                                    <select id="jenis" name="jenis" class="custom-select" required="required">
                                            <option class="hidden" selected disabled>Jenis</option>
                                            <option value="Magang">Magang</option>
                                            <option value="Penelitian/Wawancara">Penelitian/Wawancara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tglMulai" class="col-4 col-form-label">Tanggal Mulai PKL</label>
                                <div class="col-8">
                                    <input id="tglMulai" name="tglMulai" placeholder="Tanggal Mulai Magang" class="form-control here" type="date" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tglAkhir" class="col-4 col-form-label">Tanggal Berakhir PKL</label>
                                <div class="col-8">
                                    <input id="tglAkhir" name="tglAkhir" placeholder="Tanggal Berakhir Magang" class="form-control here" type="date" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="noSurat" class="col-4 col-form-label">No Permohonan Surat</label>
                                <div class="col-8">
                                    <input id="noSurat" name="noSurat" placeholder="No Permohonan Surat" class="form-control here" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tglSurat" class="col-4 col-form-label">Tanggal Permohonan Surat</label>
                                <div class="col-8">
                                    <input id="tglSurat" name="tglSurat" placeholder="Tanggal Permohonan Surat" class="form-control here" type="date" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="perihal" class="col-4 col-form-label">Judul PKL</label>
                                <div class="col-8">
                                    <input id="perihal" name="judul" placeholder="Judul PKL" class="form-control here" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-4 col-form-label">File</label>
                                <div class="col-8">
                                    <input name="file" placeholder="File" id="file" type="file" required="required">
                                </div>
                            </div>
                                    <div class="form-group row">
                                        <div id="progressbr-container">
                                            <div  id="progress-bar-status-show">	</div>
                                        </div>
                                    </div>
                            <div class="form-group row">
                                <div class="offset-8 col-4" style="float: right;">
                                    <button name="submit" type="submit" class="btn btn-outline-success">Upload Permohonan PKL</button>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


