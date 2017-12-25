<!-- .row -->
<?php $employees = $employees[0]; ?>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box" style = "background-color: #2f313e">
            <div class="user-bg">
                <img width="100%" alt="employee" src="<?= $this->config->base_url(); ?>uploads_employee/<?= $employees->emp_image_path ?>">
            </div>
            <div class="user-btm-box">
                <h4 class = "text-white">User: <b style = "color: #65aad3"><?= $employees->emp_username ?></b></h4>
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
                <a href="<?= site_url('employees/edit_payroll_info/'); ?>" class="waves-effect">Edit payroll info</a>
                <hr>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php
                        $time = date('H:i:s');
                        $date = date('Y/m/d');
                        $attendance = $this->item_model->fetch("attendance", array('username' => $this->session->userdata('username'), 'emp_id' => $this->session->userdata('id'), 'date' => $date));
                        $attendance = $attendance[0];

                        if($attendance) {
                            # SHOULD UPDATE OTHER DEDUCTIONS/INCOME BASED ON THE TIME CHECKED IN and OUT
                            if($attendance->time_out != NULL && $attendance->time_in != NULL) {
                                echo "<center><h4 class = 'text-white'>You have already checked out!</h4></center>";
                            } else { # TO CHECK OUT
                                echo "<center>
                                    <form method = 'POST' action = ''>
                                        <input type = 'submit' name = 'out' value = 'Check out' class = 'btn' style = 'background-color: #65aad3; color: white'>
                                    </form>
                                </center>";

                                if(isset($_POST['out'])) {
                                    if($time > 19 AND $attendance->status != "Late") {
                                        $status = "Overtime";
                                        $this->item_model->updatedata("attendance", array('time_out' => $time, 'status' => $status), array('emp_id' => $this->session->userdata("id"), 'date' => $date));
                                    } else {
                                        $this->item_model->updatedata("attendance", array('time_out' => $time), array('emp_id' => $this->session->userdata("id"), 'date' => $date));
                                        $this->item_model->updatedata("tbl_payroll", array("other_deduction" => 0), array("emp_username" => $this->session->userdata("username")));
                                    }
                                    $for_log = array(
                                        'username' => $this->session->userdata('username'),
                                        'action' => "Check out",
                                        'user_type' => $this->session->userdata('type'),
                                        'time_and_date' => time()
                                    );
                                    $this->item_model->insertData("user_log", $for_log);
                                    $deduction = $this->item_model->getValue("other_deduction", $this->session->userdata("username"));
                                    $wtax = $this->item_model->getValue("wtax", $this->session->userdata("username"));
                                    $pagibig = $this->item_model->getValue("pagibig", $this->session->userdata("username"));
                                    $philhealth = $this->item_model->getValue("philhealth", $this->session->userdata("username"));
                                    $sss = $this->item_model->getValue("sss", $this->session->userdata("username"));
                                    $gsalary = $this->item_model->getValue("gross_salary", $this->session->userdata("username"));
                                    $temp_net = $gsalary - $philhealth - $wtax - $sss - $pagibig - $deduction;

                                    $this->item_model->updatedata("tbl_payroll", array("net_pay" => $temp_net), array("emp_username" => $this->session->userdata("username")));
                                    redirect('employees/profile_emp');
                                }
                            }
                        } else { # TO CHECK IN
                            echo "<center>
                                <form method = 'POST' action = ''>
                                    <input type = 'submit' name = 'in' value = 'Check in' class = 'btn' style = 'background-color: #65aad3; color: white'>
                                </form>
                            </center>";
                            if(isset($_POST['in'])) {
                                if($time > 8) {
                                    $status = "Late";
                                    $attendance_data = array(
                                        "username" => $this->session->userdata("username"),
                                        "lastname" => $this->session->userdata("lastname"),
                                        "firstname" => $this->session->userdata("firstname"),
                                        "emp_id" => $this->session->userdata("id"),
                                        "time_in" => $time,
                                        "status" => $status,
                                        "date" => $date
                                    );
                                    $this->item_model->updatedata("tbl_payroll", array("other_deduction" => 200), array("emp_username" => $this->session->userdata("username")));
                                } elseif($time <= 8) {
                                    $status = "On time";
                                    $attendance_data = array(
                                        "username" => $this->session->userdata("username"),
                                        "lastname" => $this->session->userdata("lastname"),
                                        "firstname" => $this->session->userdata("firstname"),
                                        "emp_id" => $this->session->userdata("id"),
                                        "time_in" => $time,
                                        "status" => $status,
                                        "date" => $date
                                    );
                                    $this->item_model->updatedata("tbl_payroll", array("other_deduction" => 100), array("emp_username" => $this->session->userdata("username")));
                                }
                                $for_log = array(
                                    'username' => $this->session->userdata('username'),
                                    'action' => "Check in (" . $status . ")",
                                    'user_type' => $this->session->userdata('type'),
                                    'time_and_date' => time()
                                );
                                $this->item_model->insertData("user_log", $for_log);
                                $this->item_model->insertData("attendance", $attendance_data);

                                $deduction = $this->item_model->getValue("other_deduction", $this->session->userdata("username"));
                                $wtax = $this->item_model->getValue("wtax", $this->session->userdata("username"));
                                $pagibig = $this->item_model->getValue("pagibig", $this->session->userdata("username"));
                                $philhealth = $this->item_model->getValue("philhealth", $this->session->userdata("username"));
                                $sss = $this->item_model->getValue("sss", $this->session->userdata("username"));
                                $gsalary = $this->item_model->getValue("gross_salary", $this->session->userdata("username"));
                                $temp_net = $gsalary - $philhealth - $wtax - $sss - $pagibig - $deduction;

                                $this->item_model->updatedata("tbl_payroll", array("net_pay" => $temp_net), array("emp_username" => $this->session->userdata("username")));
                                redirect('employees/profile_emp');
                                #echo "deduction: $deduction<br>Wtax: $wtax<br>PAGIBIG: $pagibig<br>PH: $philhealth<br>SSS: $sss<br>Gsalary: $gsalary<br>Net pay: $temp_net";
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material" method = "POST" action = "<?= $this->config->base_url() ?>employees/update_profile" enctype="multipart/form-data">
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
                    <label class="col-md-12">Last Name <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type your last name here..." class="form-control form-control-line" name = "tf_emp_lastname" value = "<?= $employees->emp_lastname ?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">First Name <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type your first name here..." class="form-control form-control-line" name = "tf_emp_firstname" value = "<?= $employees->emp_firstname ?>"> </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type your email address here..." class="form-control form-control-line" name = "tf_emp_email" value = "<?= $employees->emp_email ?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone No. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" placeholder="09xxxxxxxxx" class="form-control form-control-line" name = "tf_emp_phone_no" value = "<?= $employees->emp_contact ?>">
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
        </div> <!-- white box -->
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
            