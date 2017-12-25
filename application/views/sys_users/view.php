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
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <center><a href="<?= $this->config->base_url() ?>sys_users" class="btn" style = "background-color: #65aad3; color: white">Go back</a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Admin ID</label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_id" value = "<?= $sys_user->admin_id ?>" class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_username" value = "<?= $sys_user->admin_username ?>" class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_lastname" value = "<?= $sys_user->admin_lastname ?>"class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_firstname" value = "<?= $sys_user->admin_firstname ?>"class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name = "tf_sys_email" value = "<?= $sys_user->admin_email ?>"class="form-control form-control-line" name="example-email" id="example-email" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No.</label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_phone" value = "<?= $sys_user->admin_contact ?>"class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">System Status</label>
                                    <div class="col-md-12">
                                        <input type="text" name = "tf_sys_status" value = "<?php if($sys_user->admin_status == 0) echo "Inactive"; else echo 'Active'; ?>" class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            