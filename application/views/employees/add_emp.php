<!-- .row -->
<?php if(validation_errors()): ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo validation_errors(); ?>
    </div>
<?php endif?>
<div class="row">
    <div class="col-md-8 col-xs-10">
        <div class="white-box">
            <form class="form-horizontal form-material" action = "<?= $this->config->base_url(); ?>employees/add_emp_exec/<?= $this->uri->segment(3) ?>" method = "POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-md-12">Last Name <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_lastname" placeholder = "Your last name here..." class="form-control form-control-line" maxlength = "50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">First Name <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_firstname" placeholder = "Your first name here..." class="form-control form-control-line" maxlength = "50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Middle Name </label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_middlename" placeholder = "Your first name here..." class="form-control form-control-line" maxlength = "50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Username <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_username" placeholder = "Your username here..." class="form-control form-control-line" maxlength = "25">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Password <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="password" name = "pf_emp_password" placeholder = "Enter password" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Confirm Password <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="password" name = "pf_emp_conf_password" placeholder = "Match password above" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_email" placeholder = "example@email.com" class="form-control form-control-line" name="example-email" id="example-email" maxlength = "30">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone No. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_phone" placeholder = "09xxxxxxxxx" class="form-control form-control-line" maxlength = "11">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Tin no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_tin" placeholder = "xxx-xxx-xxx" class="form-control form-control-line" maxlength = "11">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">SSS no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_sss" placeholder = "xx-xxxxxxx-x" class="form-control form-control-line" maxlength = "12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">PAGIBIG no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_pagibig" placeholder = "xxxx-xxxx-xxxx" class="form-control form-control-line" maxlength = "14">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">PhilHealth no. <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_phealth" placeholder = "xxxx-xxxx-xxxx-xx" class="form-control form-control-line" maxlength = "17">
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
                <div class="form-group">
                    <label class="col-md-12">Gross salary <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="number" name = "tf_emp_gsalary" class="form-control form-control-line" max = "99999" maxlength="5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Position <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_position" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Department <font color = "red">*</font></label>
                    <div class="col-md-12">
                        <input type="text" name = "tf_emp_dept" class="form-control form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Upload Profile Picture</label>
                    <div class="col-md-12">
                        <input type="file" name = "f_emp_profile_pic" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Recaptcha <font color = "red">*</font></label>
                    <div class="g-recaptcha" data-sitekey="6LfuAzkUAAAAANp8G3aAozm0CKgQaG7I7S0bR2iP" >
                    </div>
                </div>
                <!--<div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LfuAzkUAAAAANp8G3aAozm0CKgQaG7I7S0bR2iP"></div>
                </div>-->
                <font color = "red">
                    <?php
                    if ($this->session->flashdata('error') != '') {
                        echo $this->session->flashdata('error') . '<br><br>';
                    }
                    ?></font>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="btn" style = "background-color: #2f313e; color: white" type = "submit" name = "btn_update">
                        <input class="btn btn-danger" style = "color: white" type = "reset" name = "btn_reset">
                        <a href="<?= $this->config->base_url() ?>employees" class="btn" style = "background-color: #65aad3; color: white">Go back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
            