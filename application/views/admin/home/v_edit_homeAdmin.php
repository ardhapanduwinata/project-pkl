<div style="margin: 30px;">
    <h1><?= $judul ?></h1>
</div>

<?php
if($param == "intro") {
    foreach ($intro as $a) {?>
        <div style="margin: 30px">
            <div style="z-index: 10; position: absolute; float: right;width: 95%; text-align: right; padding-top: 10px">
                <a style="margin-right: 15px" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')" href="<?= base_url('admin/homeAdmin/del_intro/'.$a->id_konten) ?>">
                    <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                        <i class="fas fa-trash-alt" style="color: white"></i>
                    </button>
                </a>
            </div>
            <img width="100%" src="<?= base_url('assets/img/home_content/intro/').$a->gambar_konten ?>"><br>
        </div>
    <?php }
} elseif ($param == "part2") {?>
    <div style="margin: 30px">
        <section id="services">
            <div class="section-header">
                <div style="z-index: 10;position: absolute; width: 96%">
                    <a class="nav-link" data-toggle="modal" data-target="#editKonten_modal" href="" style="float: right">
                        <button style="background-color: rgba(0,0,0,.5); border-radius: 50%" class="btn btn-default">
                            <i class="fas fa-edit" style="color: white"></i>
                        </button>
                    </a>
                </div>
                <?php
                $where = array('id_header' => '2');
                $header = $this->db->get_where('header_home', $where)->result();
                foreach ($header as $a) {
                    if ($a->header == null || $a->deskripsi == null) { ?>
                        <h2>Untitled</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <?php } else { ?>
                        <h2><?= $a->header ?></h2>
                        <p><?= $a->deskripsi ?></p>
                    <?php }
                }?>
            </div>
            <div class="row">
                <?php
                $no=0;
                $jumlah = count($konten);
                foreach($konten as $a) {
                    $no++;
                    if($no == $jumlah && $no %2 != 0){?>
                        <div id="services">
                            <div class="box col-lg-12">
                                <div style="z-index: 10; position: absolute; float: right;width: 95%; text-align: right; padding-top: -5px" class="wow fadeInLeft">
                                    <a style="margin-right: 15px" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')"
                                       href="<?= base_url('admin/homeAdmin/del_konten/'.$a->id_konten ) ?>">
                                        <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                                            <i class="fas fa-trash-alt" style="color: white"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="wow fadeInLeft row">
                                    <div class="col-lg-5">
                                        <img src="<?= base_url('assets/img/home_content/userguide/'.$a->gambar_konten) ?>" style="height: 200px" alt="">
                                    </div>
                                    <div class="col-lg-7" style="margin-top: 10px">
                                        <h4><a href=""><b><?= $a->judul_konten ?></b></a></h4>
                                        <p><?= $a->isi_konten ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-6">
                            <div style="z-index: 10; position: absolute; float: right;width: 95%; text-align: right; padding-top: 10px" class="wow fadeInLeft">
                                <a style="margin-right: 15px" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')"
                                   href="<?= base_url('admin/homeAdmin/del_konten/'.$a->id_konten ) ?>">
                                    <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                                        <i class="fas fa-trash-alt" style="color: white"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="box wow fadeInLeft">
                                <div class="icon"><img src="<?= base_url('assets/img/home_content/userguide/'.$a->gambar_konten) ?>"
                                                       style="height: 250px" width="100%" alt=""><br><br></div>
                                <h4><a href=""><b><?= $a->judul_konten ?></b></a></h4>
                                <p><?= $a->isi_konten ?></p>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </section>
    </div>
<?php } ?>
