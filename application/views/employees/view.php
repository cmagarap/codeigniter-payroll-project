<!-- .row -->
<?php $employee = $employee[0]; ?>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box" style = "background-color: #2f313e">
            <div class="user-bg">
                <img width="100%" alt="user" src="<?= $this->config->base_url(); ?>uploads_employee/<?= $employee->emp_image_path?>">
            </div>
            <div class="user-btm-box">
                <h4 class = "text-white">User: <b style = "color: #65aad3"><?= $employee->emp_username ?></b></h4>
                <hr>
                <div class="form-group">
                    <div class="col-sm-12">
                        <center><a href="<?= $this->config->base_url() ?>employees" class="btn" style = "background-color: #65aad3; color: white">Go back</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material">
                <div class="form-group">
                    <label class="col-md-12">Username</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_username" value = "<?= $employee->emp_username ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Name</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_fullname" value = "<?= $employee->emp_lastname.", ".$employee->emp_firstname." ".$employee->emp_middlename ?>"class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" name = "tf_emp_email" value = "<?= $employee->emp_email ?>"class="form-control form-control-line" name="example-email" id="example-email" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone No.</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_phone" value = "<?= $employee->emp_contact ?>"class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">System Status</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_sys_status" value = "<?php if($employee->emp_sys_status == 0) echo 'Inactive'; else echo 'Active'; ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Gross Salary</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_salary" value = "<?= number_format($employee->gross_salary, 2) ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material">
                <div class="form-group">
                    <label class="col-md-12">Tin no.</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_tin_no" value = "<?= $employee->tin_num ?>"class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">SSS no.</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_sss_no" value = "<?= $employee->sss_num ?>"class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">PAGIBIG no.</label>
                    <div class="col-md-12">
                        <input type="email" name = "tf_pagibig_no" value = "<?= $employee->pagibig_num ?>"class="form-control form-control-line" name="example-email" id="example-email" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">PhilHealth No.</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_phealth_no" value = "<?= $employee->philhealth_num ?>"class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Social Status</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_social_status" value = "<?= $employee->status ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Position</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_position" value = "<?= $employee->position ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Department</label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_department" value = "<?= $employee->department ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
            