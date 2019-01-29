
<div class="container" style="padding-top: 20px; padding-bottom: 20px">

    <div class="row">
        <div class="col-md-3">

            <div class="list-group " style="padding-bottom: 10px">
                <a href="<?php echo base_url('user');?>/homeUser/biodata" class="list-group-item list-group-item-action active " style="background-color: #0c2e8a;border-color: #0c2e8a">User Profile</a>
                <a href="<?php echo base_url('user');?>/homeUser/biodataPass" class="list-group-item list-group-item-action ">User Management</a>

            </div>
            <br>
            <div class="card" style="padding: 15px;">
                <div class="text-center">
                    <?php echo form_open_multipart('user/homeUser/updatePhoto'); ?>
                    <img src="<?php echo base_url();?>assets/img/foto_users/<?php echo $user[0]->foto?>" style="border: groove" class="avatar img-circle" alt="avatar" width="150" height="150">
                    <br><br>
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="form-control" name="pic">
                    <br>
                    <input type="submit" name="submit" class="btn" style="background-color: #0c2e8a; color: white" value="Update">
                    <?php echo form_close();?>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card" style="height: 483px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Update Profile User</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo form_open_multipart('user/homeUser/updateBio'); ?>

                            <div class="form-group row">
                                <label for="nim" class="col-4 col-form-label">NIM</label>
                                <div class="col-8">
                                    <input id="nim" name="nim" placeholder="NIM" class="form-control here" value="<?= $user[0]->nim?>" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
                                <div class="col-8">
                                    <input id="nama" name="nama" placeholder="Nama Lengkap" class="form-control here" value="<?= $user[0]->nama_user?>" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurusan" class="col-4 col-form-label">Jurusan</label>
                                <div class="col-8">
                                    <select id="jurusan" name="jurusan" class="custom-select" required="required">
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
                                    <input id="univ" name="univ" placeholder="Universitas Anda" value="<?= $user[0]->univ?>" class="form-control here" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatUniv" class="col-4 col-form-label">Alamat Universitas</label>
                                <div class="col-8">
                                    <input id="alamat" name="alamat" placeholder="Alamat Universitas Anda" value="<?= $user[0]->alamat?>" class="form-control here" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input id="email" name="email" placeholder="Email" class="form-control here" value="<?= $user[0]->email?>" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn" style="background-color: #0c2e8a; color: white">Update Profile</button>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 ">
        </div>
    </div>
</div>