<!--==========================
  Intro Section
============================-->
<section id="intro">
<div>
    <div style="z-index: 10;position: absolute; width: 100%">
        <a class="nav-link" data-toggle="modal" data-target="#addIntro_modal" href="" style="float: right">
            <button style="background-color: rgba(0,0,0,.5); border-radius: 50%" class="btn btn-default">
                <i class="fas fa-plus-circle" style="color: white;"></i>
            </button>
        </a>
        <a class="nav-link" href="<?= base_url('admin/homeAdmin/edit_intro') ?>" style="float: right; padding-right: 0.1px">
            <button style="background-color: rgba(0,0,0,.5); border-radius: 50%" class="btn btn-default">
                <i class="fas fa-edit" style="color: white"></i>
            </button>
        </a>
    </div>
    <div id="intro-carousel" class="owl-carousel" >
        <?php foreach ($intro as $a) {?>
            <div class="item" style="background-image: url('<?= base_url('assets/img/home_content/intro/').$a->gambar_konten ?>');"></div>
        <?php } ?>
    </div>
</div>

</section><!-- #intro -->

<main id="main">
    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container">
            <div class="section-header">
                <div style="z-index: 10;position: absolute; width: 96%">
                    <a class="nav-link" data-toggle="modal" data-target="#addKonten_modal" href="" style="float: right">
                        <button style="background-color: rgba(0,0,0,.5); border-radius: 50%" class="btn btn-default">
                            <i class="fas fa-plus-circle" style="color: white;"></i>
                        </button>
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/homeAdmin/edit_konten') ?>" style="float: right; padding-right: 0.1px">
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
                        <div class="col-lg-12">
                            <div class="box wow fadeInLeft row">
                                <div class="col-lg-5">
                                    <img src="<?= base_url('assets/img/home_content/userguide/'.$a->gambar_konten) ?>" style="height: 200px" alt="">
                                </div>
                                <div class="col-lg-7" style="margin-top: 10px">
                                    <h4><a href=""><b><?= $a->judul_konten ?></b></a></h4>
                                    <p><?= $a->isi_konten ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-6">
                            <div class="box wow fadeInLeft">
                                <div class="icon"><img src="<?= base_url('assets/img/home_content/userguide/'.$a->gambar_konten) ?>" style="height: 250px" width="100%" alt=""><br><br></div>
                                <h4><a href=""><b><?= $a->judul_konten ?></b></a></h4>
                                <p><?= $a->isi_konten ?></p>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <div style="z-index: 10;position: absolute; width: 96%">
                    <a class="nav-link" data-toggle="modal" data-target="#editKontak_modal" href="" style="float: right">
                        <button style="background-color: rgba(0,0,0,.5); border-radius: 50%" class="btn btn-default">
                            <i class="fas fa-edit" style="color: white"></i>
                        </button>
                    </a>
                </div>
                <?php foreach($kontak as $a) {?>
                <h2>Hubungi Kami</h2>
                <p></p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Alamat</h3>
                        <address><?= $a->alamat ?></address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>No Telepon</h3>
                        <p><a href="tel:<?= $a->notelp ?>"><?= $a->notelp ?></a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:<?= $a->email ?>"><?= $a->email ?></a></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="container mb-4">
            <iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Jalan%20Trunojoyo%20Blok%20M-I%20No.135%2C%20RT.6%2FRW.2%2C%20Melawai%2C%20Kby.%20Baru%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012160+(Title)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section><!-- #contact -->

</main>

<!--==========================
  Footer
============================-->