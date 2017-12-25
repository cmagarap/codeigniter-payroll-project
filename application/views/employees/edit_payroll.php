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
                <div class="form-group">
                    <div class="col-sm-12">
                        <center><a href="<?= $this->config->base_url() ?>employees/profile_emp" class="btn" style = "background-color: #65aad3; color: white">Go back</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material" method = "POST" action = "<?= $this->config->base_url() ?>employees/update_payroll_info">
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
                    <label class="col-md-12">Tin no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_tin" placeholder = "xxx-xxx-xxx" class="form-control form-control-line" value = "<?= $employees->tin_num ?>" maxlength = "11">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">SSS no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_sss" placeholder = "xx-xxxxxxx-x" class="form-control form-control-line" value = "<?= $employees->sss_num ?>" maxlength = "12" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">PAGIBIG no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_pagibig" placeholder = "xxxx-xxxx-xxxx" class="form-control form-control-line" value = "<?= $employees->pagibig_num ?>" maxlength = "14">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">PhilHealth no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_phealth" placeholder = "xxxx-xxxx-xxxx-xx" class="form-control form-control-line" value = "<?= $employees->philhealth_num ?>" maxlength = "14">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Social Status <font color = "red">*</font></label>
                    <div class="col-md-4">
                        <select name = "s_status" size = "1" style = "width: 100%; height: 35px; border: 1px solid #ccc;">
                            <option value = "Single">Single</option>
                            <option value = "Married">Married</option>
                            <option value = "Separated">Separated</option>
                            <option value = "Divorced">Divorced</option>
                            <option value = "Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="col-md-12">Gross salary <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="number" name = "tf_emp_gsalary" class="form-control form-control-line" max = "99999" value="<?= $employees->gross_salary ?>" maxlength="5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Position <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_position" class="form-control form-control-line"  value="<?= $employees->position ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Department <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_dept" class="form-control form-control-line" value="<?= $employees->department ?>">
                    </div>
                </div>-->
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
