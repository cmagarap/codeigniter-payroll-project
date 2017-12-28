                <!-- .row -->
                <?php $sys_user = $sys_user[0]; ?>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box" style = "background-color: #2f313e">
                            <div class="user-bg">
                                <img width="100%" alt="user" src="<?= $this->config->base_url(); ?>uploads/<?= $sys_user->admin_image_path?>">
                            </div>
                            <div class="user-btm-box">
                                <h4 class = "text-white">User: <b style = "color: #65aad3"><?= $sys_user->admin_username ?></b></h4>
                                <hr>
                                <form action = "<?= $this->config->base_url() ?>sys_users/upload" method = "POST">
                                    <a href="<?= site_url('sys_users/change_pass/'); ?>" class="waves-effect">Change password</a>
                                    <a href="<?= site_url('sys_users/change_pic/'); ?>" class="waves-effect"><h5>Change profile picture</a>
                                    <!-- <input type = "file" style="display: inline;"> -->
                                </form>
                            </div>
                        </div>
                    </div> random
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" action = "<?= $this->config->base_url(); ?>sys_users/edit_user_exec/<?= $this->uri->segment(3) ?>" method = "POST">
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
                                        <input type="text" name = "tf_sys_username" placeholder = "Type username here..." value = "<?= $sys_user->admin_username ?>" class="form-control form-control-line" maxlength = "25">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name <font color = "red">*</font></label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_lastname" placeholder = "Type last name here..." value = "<?= $sys_user->admin_lastname ?>" class="form-control form-control-line" maxlength = "50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">First Name <font color = "red">*</font></label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_firstname" placeholder = "Type first name here..." value = "<?= $sys_user->admin_firstname ?>"class="form-control form-control-line" maxlength = "50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email <font color = "red">*</font></label>
                                    <div class="col-md-12">
                                        <input type="email" name = "tf_sys_email" placeholder = "example@email.com" value = "<?= $sys_user->admin_email ?>"class="form-control form-control-line" name="example-email" id="example-email" maxlength = "30">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No. <font color = "red">*</font></label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_phone" placeholder = "09xxxxxxxxx" maxlength = "11" value = "<?= $sys_user->admin_contact ?>"class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">System Status <font color = "red">*</font></label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder = "1 or 0" name = "tf_sys_status" value = "<?= $sys_user->admin_status ?>" pattern = "[01]" title = "You may enter 1 or 0 only." maxlength = "1" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="btn" style = "background-color: #2f313e; color: white" type = "submit" name = "btn_update">
                                        <input class="btn btn-danger" style = "color: white" type = "reset" name = "btn_reset">
                                        <a href="<?= $this->config->base_url() ?>sys_users" class="btn" style = "background-color: #65aad3; color: white">Go back</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            