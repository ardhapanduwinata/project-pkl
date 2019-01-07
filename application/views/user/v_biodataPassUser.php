
 <div class="container" style="padding-top: 20px; padding-bottom: 20px;">

    <div class="row">
        <div class="col-md-3">

            <div class="list-group " style="padding-bottom: 10px">
                <a href="<?php echo base_url('user');?>/homeUser/biodata" class="list-group-item list-group-item-action ">User Profile</a>
                <a href="<?php echo base_url('user');?>/homeUser/biodataPass" class="list-group-item list-group-item-action active" style="background-color: #0c2e8a;border-color: #0c2e8a">User Management</a>
            </div>
        </div>

<div class="col-md-9">
    <div class="card" style="height: 483px;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Update Management User</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <?php echo form_open_multipart('user/homeUser/updatePass/1'); ?>
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">Username</label>
                            <div class="col-8">
                                <input id="username" name="username" placeholder="Username" value="<?= $user[0]->username?>" class="form-control here" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn">Update Username</button>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <?php echo form_open_multipart('user/homeUser/updatePass/2'); ?>
                        <div class="form-group row">
                            <label for="pass" class="col-4 col-form-label">Old Password</label>
                            <div class="col-8">
                                <input id="old" name="old" placeholder="Old Password*" class="form-control here" required="required" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pass" class="col-4 col-form-label">New Password</label>
                            <div class="col-8">
                                <input id="password" name="password" placeholder="New Password*" class="form-control here" required="required" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pass" class="col-4 col-form-label">Confirm Password</label>
                            <div class="col-8">
                                <input id="confirm" name="confirm" placeholder="Confirm Password*" class="form-control here" required="required" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn">Update Password</button>
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