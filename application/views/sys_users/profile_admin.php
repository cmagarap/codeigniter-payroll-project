<!-- .row -->
<?php $account = $account[0]; ?>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box" style = "background-color: #2f313e">
            <div class="user-bg">
                <img width="100%" alt="user" src="<?= $this->config->base_url(); ?>uploads/<?= $account->admin_image_path?>">
            </div>
            <div class="user-btm-box">
                <h4 class = "text-white">User: <b style = "color: #65aad3"><?= $account->admin_username ?></b></h4>
                <hr>
                <a href="#" class="waves-effect" id="myBtn">Change password</a><br>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h1>Change your Password</h1><br><br>
                        <form class="form-horizontal form-material" action = "<?= $this->config->base_url(); ?>payroll/change_pass" method = "POST">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for = "new_pass">New Password: </label>
                                    <input type = "password" placeholder = "Enter your new password" name = "new_pass" class = "form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[a-Z]).{3,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
			                        if(this.checkValidity()) form.conf_pass.pattern = this.value;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for = "conf_pass">Confirm Password: </label>
                                    <input type = "password" title="Please enter the same Password as above" placeholder = "Match the password above" name = "conf_pass" class = "form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[a-Z]).{3,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" required>
                                </div>
                            </div>

                            <div class="form-group" align = "center">
                                <div class="col-sm-12">
                                    <input type = "submit" value = "Enter" class="btn" style = "background-color: #2f313e; color: white;">
                                    <input type = "reset" value = "Reset" class="btn btn-danger" style = "color: white">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material" method = "POST" action = "<?= $this->config->base_url() ?>profile/update_profile_admin" enctype="multipart/form-data">
                <?php if(validation_errors()) { ?>
                    <div class="form-group">
                        <div class="col-md-12">
                            <hr>
                            <font color="red"><?php echo validation_errors(); ?></font>
                            <hr>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-md-12">Username <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type username here..." class="form-control form-control-line" name = "tf_admin_username" value = "<?= $account->admin_username ?>"></div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Last Name <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type your last name here..." class="form-control form-control-line" name = "tf_admin_lastname" value = "<?= $account->admin_lastname ?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">First Name <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type your first name here..." class="form-control form-control-line" name = "tf_admin_firstname" value = "<?= $account->admin_firstname ?>"> </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="type" placeholder="Type your email address here..." class="form-control form-control-line" name = "tf_admin_email" value = "<?= $account->admin_email ?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone No. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="09xxxxxxxxx" class="form-control form-control-line" name = "tf_admin_phone_no" value = "<?= $account->admin_contact ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Profile Picture</label>
                    <div class="col-md-12">
                        <input type="file" class="form-control form-control-line" name = "profile_pic">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="btn" style = "background-color: #2f313e; color: white" type = "submit" name = "btn_update" value = "Update Profile">
                        <input class="btn btn-danger" style = "color: white" type = "reset" name = "btn_reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
            