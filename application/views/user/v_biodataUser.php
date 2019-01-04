<div class="container" style="padding-top: 10px;">

    <div class="row">
        <div class="col-md-3">

            <div class="list-group " style="padding-bottom: 10px">
                <a href="#" class="list-group-item list-group-item-action active">User Profile</a>
                <a href="#" class="list-group-item list-group-item-action">User Management</a>

            </div>

            <div class="card" style="padding: 10px">
                <div class="text-center">
                    <?php echo form_open_multipart('UserDetail/updatePhoto'); ?>
                    <img src="<?php echo base_url('assets');?>/img/foto_users/default.png" class="avatar img-circle" alt="avatar" width="150" height="150">
                    <h6>Upload a different photo...</h6>

                    <input type="file" class="form-control" name="pic">
                    <br>
                    <input type="submit" name="submit" class="btn btn-info" value="Update">
                    <?php echo form_close();?>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Update Profile User</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">User Name*</label>
                                    <div class="col-8">
                                        <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email*</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="Email" required="required" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">First Name</label>
                                    <div class="col-8">
                                        <input id="name" name="name" placeholder="First Name" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                    <div class="col-8">
                                        <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label">Website</label>
                                    <div class="col-8">
                                        <input id="website" name="website" placeholder="Website" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pass" class="col-4 col-form-label">Password</label>
                                    <div class="col-8">
                                        <input id="pass" name="pass" placeholder="Password" class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4">Send User Notification</label>
                                    <div class="col-8">
                                        <label class="custom-control custom-checkbox">
                                            <input name="checkbox" class="custom-control-input" value="user-notification" type="checkbox">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Send the new user an email about their account.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-4 col-form-label">Role</label>
                                    <div class="col-8">
                                        <select id="role" name="role" class="custom-select">
                                            <option value="administrator">Administrator</option>
                                            <option value="author">Author</option>
                                            <option value="editor">Editor</option>
                                            <option value="contributor">Contributor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
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