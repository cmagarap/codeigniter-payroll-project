<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <center>
                <br>
                <h3 class="box-title">EMPLOYEES</h3>
                <form role="search" class="app-search m-r-10" action = "" method = "POST">
                    <input type="text" placeholder="Enter username..." name = "tf_search_emp" class="form-control" required>
                    <button type = "submit" name = "btn_search"><i class="fa fa-search"></i></button><br><br>
                </form>
                <form action = "" method = "POST" style = "display: inline;">
                    <button type = "submit" name = "btn_all" class = "small button">View Active Users</button>
                </form>
                <form action = "<?= $this->config->base_url(); ?>employees/add_emp" method = "POST" style = "display: inline;">
                    <button type = "submit" class = "small button">Add User</button>
                </form>
                <form action = "" method = "POST" style = "display: inline;">
                    <button type = "submit" name = "btn_inactive" class = "small button">Inactive Users</button>
                </form>
                <br><hr>
            </center>
            <br>
            <?php
            if(isset($_POST['btn_search'])) {
                $this->db->order_by('emp_lastname', 'ASC');
                $search_result = $this->item_model->search("employees", 'emp_username', $this->input->post('tf_search_emp'));
                if (!$search_result): ?>
                    <br>
                    <center><h3>NO USERS FOUND</h3><br></center>
                <?php else:
                    $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Search for employee data",
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                    );
                    $this->item_model->insertData("user_log", $for_log);
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <h4>SEARCH RESULTS</h4>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Gross Income</th>
                                <th>Phone number</th>
                                <th>Email Address</th>
                                <th>System Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($search_result as $search_result): ?>
                                <tr>
                                    <td><?= $line++;?></td>

                                    <td><?= $search_result->emp_username ?></td>
                                    <td><?= $search_result->emp_lastname . ", " . $search_result->emp_firstname . " ". $search_result->emp_middlename ?></td>
                                    <td><?= number_format($search_result->gross_salary, 2) ?></td>
                                    <td><?= $search_result->emp_contact ?></td>
                                    <td><?= $search_result->emp_email ?></td>
                                    <td><?php
                                        if($search_result->emp_sys_status == 1) { echo 'Active'; }
                                        else { echo 'Inactive'; }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" style = "background-color: #2f313e; color: white; border-color: #2f313e;" href="<?= $this->config->base_url() ?>employees/view_employee/<?= $search_result->emp_id ?>" title = "View User" alt = "View User">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-warning" style = "background-color: #65aad3; color: white; border-color: #65aad3;" href="<?= $this->config->base_url() ?>employees/edit_employee/<?= $search_result->emp_id ?>" title = "Edit User" alt = "Edit User">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            <?php }
            elseif(isset($_POST['btn_all'])) {
                if (!$active_emp): ?>
                    <br>
                    <center><h3>THERE ARE NO ACTIVE USERS</h3><br></center>
                <?php else:
                    $for_log = array(
                        'username' => $this->session->userdata('username'),
                        'action' => "View active employees",
                        'user_type' => $this->session->userdata('type'),
                        'time_and_date' => time()
                    );
                    $this->item_model->insertData("user_log", $for_log);
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <h4>ACTIVE USERS</h4>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Gross Income</th>
                                <th>Phone number</th>
                                <th>Email Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($active_emp as $active): ?>
                                <tr>
                                    <td><?= $line++;?></td>

                                    <td><?= $active->emp_username ?></td>
                                    <td><?= $active->emp_lastname . ", " . $active->emp_firstname . " " . $active->emp_middlename?></td>
                                    <td><?= number_format($active->gross_salary, 2) ?></td>
                                    <td><?= $active->emp_contact ?></td>
                                    <td><?= $active->emp_email ?></td>
                                    <td>
                                        <a class="btn btn-success" style = "background-color: #2f313e; color: white; border-color: #2f313e;" href="<?= $this->config->base_url() ?>employees/view_employee/<?= $active->emp_id ?>" title = "View User" alt = "View User">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-warning" style = "background-color: #65aad3; color: white; border-color: #65aad3;" href="<?= $this->config->base_url() ?>employees/edit_employee/<?= $active->emp_id ?>" title = "Edit User" alt = "Edit User">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?= $active->emp_id ?>" title = "Delete User" alt = "Delete User">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            <?php }
            elseif(isset($_POST['btn_inactive'])) {
                if (!$inactive_emp): ?>
                    <center><h3>THERE ARE NO INACTIVE USERS</h3><br></center>
                <?php else:
                    $for_log = array(
                        'username' => $this->session->userdata('username'),
                        'action' => "View inactive employees",
                        'user_type' => $this->session->userdata('type'),
                        'time_and_date' => time()
                    );
                    $this->item_model->insertData("user_log", $for_log);
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Gross Income</th>
                                <th>Phone number</th>
                                <th>Email Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($inactive_emp as $inactive_emp): ?>
                                <tr>
                                    <td><?= $line++;?></td>
                                    <td><?= $inactive_emp->emp_username ?></td>
                                    <td><?= $inactive_emp->emp_lastname . ", " . $inactive_emp->emp_firstname . " " . $inactive_emp->emp_middlename?></td>
                                    <td><?= number_format($inactive_emp->gross_salary, 2) ?></td>
                                    <td><?= $inactive_emp->emp_contact ?></td>
                                    <td><?= $inactive_emp->emp_email ?></td>
                                    <td>
                                        <a class="btn btn-success" style = "background-color: #2f313e; color: white; border-color: #2f313e;" href="<?= $this->config->base_url() ?>employees/view_employee/<?= $inactive_emp->emp_id ?>" title = "View User" alt = "View User">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-warning" style = "background-color: #65aad3; color: white; border-color:#65aad3;" href="<?= $this->config->base_url() ?>employees/edit_employee/<?= $inactive_emp->emp_id ?>" title = "Edit User" alt = "Edit User">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <!-- RESTORE DAPAT ITO, HINDI DELETE -->
                                        <a class="btn btn-success" href="<?= $this->config->base_url() ?>employees/restore_employee/<?= $inactive_emp->emp_id ?>" data-id="<?= $inactive_emp->emp_id ?>" style = "padding-right: 5px" title = "Restore User" alt = "Restore User">
                                            <i class="fa fa-undo fa-fw"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.row -->
<script>
    $(".delete").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to deactivate this employee?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "<?= $this->config->base_url() ?>employees/delete_employee/" + id;
            } else {
                swal("The user is safe!");
    }
    });

    });
</script>
           