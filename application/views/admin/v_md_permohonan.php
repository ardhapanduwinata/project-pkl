<!-- /.row -->
<?php
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 55px" >
                    <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/permohonan/') ?>" method="post">
                        <div class="form-group">
                            <div class="col-7">
                                <select class="form-control" name="filter" onchange="this.form.submit()" style="width:120px">
                                    <option value="Semua" <?php if($filter=='Semua' || empty($filter)) echo 'Selected';?>>Semua</option>
                                    <option value="Diterima" <?php if($filter=='Diterima') echo 'Selected';?>>Diterima</option>
                                    <option value="Ditolak" <?php if($filter=='Ditolak') echo 'Selected';?>>Ditolak</option>
                                    <option value="Diproses" <?php if($filter=='Diproses') echo 'Selected';?>>Diproses</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="display table table-striped table-bordered table-hover dt-responsive" id="table_permohonan" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="width: auto">No</th>
                            <th style="width: auto;text-align: center">Nama Mhs</th>
                            <th style="width: auto;text-align: center">Jurusan</th>
                            <th style="width: 40%;text-align: center">Universitas</th>
                            <th style="width: auto;text-align: center">Divisi</th>
                            <th style="width: auto;text-align: center">Status</th>
                            <th style="width: auto;text-align: center">Tanggal Pengajuan</th>
                            <th style="width: auto;text-align: center">Jenis PKL</th>
                            <th style="width: auto;text-align: center">Tanggal Mulai PKL</th>
                            <th style="width: auto;text-align: center">Tanggal Selesai PKL</th>
                            <th style="width: auto;text-align: center">Judul PKL</th>
                            <th style="width: auto;text-align: center">No Surat</th>
                            <th style="width: auto;text-align: center">Download File Mhs</th>
                            <th style="width: auto;text-align: center">Download/Upload Nota Dinas</th>
                            <th style="width: auto;text-align: center">Download/Upload Surat Konfirm</th>
                            <th style="width: auto;text-align: center">Download/Upload Surat Keterangan Selesai Magang</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($datamagang as $a) {?>
                            <tr>
                                <td style="text-align: center"><?= $no++ ?></td>
                                <td><?= $a->nama_mhs?></td>
                                <td><?= $a->jurusan?>
                                    <input type="hidden" value="<?php echo $a->id_jurusan?>" id="idJurusan" name="idJurusan">
                                </td>
                                <td><?= $a->univ?></td>
                                <td>

                                    <?php  if($role == 0){
                                        if (empty($a->id_kamus)){?>
                                            <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/updateDivisi/'.$a->id_form) ?>" method="post">
                                                <select class="form-control" name="divisi" onchange="this.form.submit()">
                                                    <option class="hidden" selected disabled>-Pilih Divisi-</option>
                                                    <?php $where = array('id_jurusan' => $a->id_jurusan);
                                                    $divisi = $this->db->select('*')->from('kamus')->join('divisi', 'kamus.id_divisi=divisi.id_divisi')->where($where)->get()->result();
                                                    foreach($divisi as $row) { ?>
                                                        <option value="<?= $row->id_kamus;?>"><?= $row->divisi;?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="nama" id="nama" value="<?= $a->nama_mhs?>">
                                                <input type="hidden" name="jenis" id="jenis" value="<?= $a->jenis?>">
                                            </form>
                                        <?php }else{?>
                                            <form enctype="multipart/form-data" action="<?= base_url('admin/manageData/updateDivisi/'.$a->id_form) ?>" method="post">
                                                <select class="form-control" name="divisi" onchange="this.form.submit()">
                                                    <option class="hidden" selected disabled>Divisi</option>
                                                    <?php $where = array('id_jurusan' => $a->id_jurusan);
                                                    $divisi = $this->db->select('*')->from('kamus')->join('divisi', 'kamus.id_divisi=divisi.id_divisi')->where($where)->get()->result();
                                                    foreach($divisi as $row) {
                                                        $cat = $row->id_kamus;?>
                                                        <option value="<?= $row->id_kamus;?>" <?php if($cat == $a->id_kamus) echo "selected";?> ><?= $row->divisi;?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="nama" id="nama" value="<?= $a->nama_mhs?>">
                                                <input type="hidden" name="jenis" id="jenis" value="<?= $a->jenis?>">
                                            </form>
                                        <?php } ?>
                                    <?php }else{?>
                                        <?php echo $a->divisi ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($a->status == "Diterima"){?>
                                        <p style="color: green"><?= $a->status?></p>
                                    <?php } elseif($a->status == "Ditolak") { ?>
                                        <p style="color: red"><?= $a->status?></p>
                                    <?php } else { ?>
                                        <p style="color: black"><?= $a->status?></p>
                                    <?php } ?>
                                </td>
                                <?php
                                $tglPengajuanForm = $a->tgl_pengajuan_form;
                                $tglMulai = $a->tgl_mulai;
                                $tglSelesai = $a->tgl_selesai;
                                ?>
                                <td><?= tgl_indo($tglPengajuanForm); ?></td>
                                <td><?= $a->jenis?></td>
                                <td><?= tgl_indo($tglMulai) ?></td>
                                <td><?= tgl_indo($tglSelesai) ?></td>
                                <td><?= $a->judul?></td>
                                <td><?= $a->no_surat ?></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px">
                                                <center>
                                                    <a type="button" class="btn btn-outline btn-success" href="<?= base_url('admin/manageData/download_dtmhs/'.$a->id_form)?>">Download</a>
                                                </center>
                                            </td>
                                            <td style="padding-left: 10px">
                                                klik tombol berikut untuk mendownload file yang diupload oleh mahasiswa
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px; padding-right: 5px">
                                                <?php if($a->id_kamus != null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_notadinas/'.$a->id_form)?>"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i><?php if($a->download_nd == '0' && $a->id_kamus != null){echo "Download";} ?></button></a>
                                                <?php }else if($a->id_kamus == null){?>
                                                    <p style="color: red">Divisi Mahasiswa Harus Terlebih Dahulu Diisi</p>
                                                <?php } ?>
                                            <td style="padding-left 10px;padding-top: 10px">
                                                <?php if($a->no_nota == null && $a->download_nd == '1' && $a->id_kamus != null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } elseif($a->download_nd == '1' && $a->no_nota != null && $a->id_kamus != null) { ?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadnd/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                                <?php }?>
                                            </td>
                                            <td style="padding-left: 80px; padding-top: 10px">
                                                <?php if($a->no_nota != null && $a->file_nd != null  && $a->id_kamus != null) {?>
                                                    <a class="btn btn-outline btn-danger" href="<?= base_url('admin/manageData/download_uploaded_nd/'.$a->id_nota) ?>">Download ND Terupload</a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <?php if($a->no_nota != null && $a->file_nd  && $a->id_kamus != null) {?>
                                                    Nomor Nota Dinas: <b><?= $a->no_nota?></b>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px; padding-right: 5px">
                                                <?php
                                                if($a->no_nota == null) {?>
                                                    <p style="color: red">Nota Dinas harus diupload terlebih dahulu</p>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0);" data-id="<?php echo $a->id_form ; ?>" data-toggle="modal" data-target="#edit-data">
                                                        <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-primary">
                                                            <i class="fas fa-download"></i>
                                                            <?php if($a->download_sk != 1) echo ' Download'; ?>
                                                        </button>
                                                    </a>
                                                <?php }?>
                                            </td>
                                            <td style="padding-top: 10px">
                                                <?php if($a->file_nd != null && $a->no_nota != null && $a->download_sk == '1' && $a->no_konfirm == null && $a->file_sk == null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadsk/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } ?>
                                                <?php if($a->no_konfirm != null && $a->file_sk != null && $a->download_sk == '1' && $a->no_nota != null && $a->file_nd != null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadsk/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 80px; padding-top: 10px">
                                                <?php if($a->no_konfirm != null && $a->file_sk != null && $a->download_sk == '1' && $a->no_nota != null && $a->file_nd != null) {?>
                                                    <a class="btn btn-outline btn-danger" href="<?= base_url('admin/manageData/download_uploaded_sk/'.$a->id_srtkonfirm) ?>">Download SK Terupload</a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <?php if($a->no_konfirm != null && $a->file_sk != null && $a->download_sk == '1' && $a->no_nota != null && $a->file_nd != null) {?>
                                                    Nomor Surat Konfirmasi: <b><?= $a->no_konfirm?></b>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding-top: 10px; padding-right: 5px">
                                                <?php
                                                if($a->no_konfirm == null) {?>
                                                    <p style="color: red">Surat Konfirmasi harus diupload terlebih dahulu</p>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('admin/manageData/view_sksm/'.$a->id_form) ?>">
                                                        <button class="btn btn-primary">
                                                            <i class="fas fa-download"></i>
                                                            <?php if($a->download_sksm != 1) echo ' Download'; ?>
                                                        </button>
                                                    </a>
                                                <?php }?>
                                            </td>
                                            <td style="padding-top: 10px">
                                                <?php if($a->file_sk != null && $a->no_konfirm != null && $a->download_sksm == '1' && $a->no_sksm == null && $a->file_sksm == null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadsksm/'.$a->id_form)?>"><button type="button" class="btn btn-info">Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } ?>
                                                <?php if($a->file_sk != null && $a->no_konfirm != null && $a->download_sksm == '1' && $a->no_sksm != null && $a->file_sksm != null) {?>
                                                    <a href="<?= base_url('admin/manageData/view_uploadsksm/'.$a->id_form)?>"><button type="button" class="btn btn-warning">Re-Upload <i class="fas fa-upload"></i></button></a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 80px; padding-top: 10px">
                                                <?php if($a->no_sksm != null && $a->file_sksm != null && $a->download_sksm == '1') {?>
                                                    <a class="btn btn-outline btn-danger" href="<?= base_url('admin/manageData/download_uploaded_sksm/'.$a->id_sksm) ?>">Download SKSM Terupload</a>
                                                <?php } ?>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <?php if($a->no_sksm != null && $a->file_sksm != null && $a->download_sksm == '1') {?>
                                                    Nomor SKSM: <b><?= $a->no_sksm?></b>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
