
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
                            <h4>Form Pengajuan Permohonan Magang / PKL</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            echo form_open_multipart('user/magangUser/uploadPengajuan',array('class' => 'form-horizontal upload-form')); ?>
                            <div class="input_fields_wrap">
                                <button id="add_field_button" class="btn">Tambah Mahasiswa</button>
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
                                    <select id="jurusan" name="jurusan" class="custom-select" required="required" disabled>

                                        <?php foreach($jurusan as $row) {
                                            $cat = $row->id_jurusan;
                                            ?>
                                            <option <?php if($cat ==  $user[0]->id_jurusan) echo"selected"; ?> value="<?php echo $row->id_jurusan;?>"><?php echo $row->jurusan;?></option>
                                        <?php } ?>
                                    </select>
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
                                            <option value="PKL">PKL</option>
                                            <option value="Penelitian/Wawancara">Penelitian/Wawancara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tglMulai" class="col-4 col-form-label">Tanggal Mulai Magang</label>
                                <div class="col-8">
                                    <input id="tglMulai" name="tglMulai" placeholder="Tanggal Mulai Magang" class="form-control here" type="date" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tglAkhir" class="col-4 col-form-label">Tanggal Berakhir Magang</label>
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
                                <label for="perihal" class="col-4 col-form-label">Perihal</label>
                                <div class="col-8">
                                    <input id="perihal" name="perihal" placeholder="Perihal Surat" class="form-control here" type="text" required="required">
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
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn">Update Profile</button>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




