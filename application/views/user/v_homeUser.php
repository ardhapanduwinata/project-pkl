<!--==========================
  Intro Section
============================-->
<section id="intro">
    <div>
        <div id="intro-carousel" class="owl-carousel" >
            <?php foreach ($intro as $a) {?>
                <div class="item" style="background-image: url('<?= base_url('assets/img/home_content/intro/').$a->image ?>');"></div>
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
                <h2>User Guide</h2>
                <p> magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>
            <div class="row">
                <?php
                $no=0;
                $jumlah = count($uguide);
                foreach($uguide as $a) {
                    $no++;
                    if($no == $jumlah && $no %2 != 0){?>
                        <div class="col-lg-12">
                            <div class="box wow fadeInLeft row">
                                <div class="col-lg-5">
                                    <img src="<?= base_url('assets/img/home_content/userguide/'.$a->image) ?>" style="height: 200px" alt="">
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
                                <div class="icon"><img src="<?= base_url('assets/img/home_content/userguide/'.$a->image) ?>"
                                                       style="height: 200px" alt=""><br><br></div>
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
                <?php foreach($contact as $a) {?>
                <h2>Contact Us</h2>
                <p></p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address><?= $a->alamat ?></address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
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