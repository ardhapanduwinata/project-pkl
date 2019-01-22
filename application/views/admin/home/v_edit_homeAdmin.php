<div style="margin: 30px;">
    <h1><?= $judul ?></h1>
</div>

<?php
if($param == "intro") {
    foreach ($intro as $a) {?>
        <div style="margin: 30px">
            <div style="z-index: 10; position: absolute; float: right;width: 95%; text-align: right; padding-top: 10px">
                <a style="margin-right: 15px" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')" href="<?= base_url('admin/homeAdmin/del_intro/'.$a->id_home) ?>">
                    <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                        <i class="fas fa-trash-alt" style="color: white"></i>
                    </button>
                </a>
            </div>
            <img width="100%" src="<?= base_url('assets/img/home_content/intro/').$a->image ?>"><br>
        </div>
    <?php }
} elseif ($param == "part2") {?>
    <div style="margin: 30px">
        <section id="services">
            <div class="row">
                <?php
                $no=0;
                $jumlah = count($uguide);
                foreach($uguide as $a) {
                    $no++;
                    if($no == $jumlah && $no %2 != 0){?>
                        <div id="services">
                            <div class="box col-lg-12">
                                <div style="z-index: 10; position: absolute; float: right;width: 95%; text-align: right; padding-top: -5px" class="wow fadeInLeft">
                                    <a style="margin-right: 15px" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')"
                                       href="<?= base_url('admin/homeAdmin/del_service/'.$a->id_home ) ?>">
                                        <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                                            <i class="fas fa-trash-alt" style="color: white"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="wow fadeInLeft row">
                                    <div class="col-lg-5">
                                        <img src="<?= base_url('assets/img/home_content/userguide/'.$a->image) ?>" style="height: 200px" alt="">
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
                                   href="<?= base_url('admin/homeAdmin/del_service/'.$a->id_home ) ?>">
                                    <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                                        <i class="fas fa-trash-alt" style="color: white"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="box wow fadeInLeft">
                                <div class="icon"><img src="<?= base_url('assets/img/home_content/userguide/'.$a->image) ?>"
                                                       style="height: 200px" alt=""><br><br></div>
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
