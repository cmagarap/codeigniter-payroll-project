<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <center>
                <br>
                <h3 class="box-title">ADMINISTRATORS</h3>
                <form role="search" class="app-search m-r-10" action = "" method = "POST">
                    <input type="text" placeholder="Enter username..." name = "tf_search_user" class="form-control" required>
                    <button type = "submit" name = "btn_search"><i class="fa fa-search"></i></button><br><br>
                </form>
                <form action = "" method = "POST" style = "display: inline;">
                    <button type = "submit" name = "btn_all" class = "small button">View Active Users</button>
                </form>
                <form action = "<?= $this->config->base_url(); ?>sys_users/add_sys_user" method = "POST" style = "display: inline;">
                    <button type = "submit" class = "small button">Add User</button>
                </form>
                <form action = "" method = "POST" style = "display: inline;">
                    <button type = "submit" name = "btn_inactive" class = "small button">Inactive Users</button>
                </form>
                <br><hr>
            </center>
            <br>
            <?php
            if (isset($_POST['btn_search'])) {
                $search_result = $this->item_model->search("sub_admin", 'admin_username', $this->input->post('tf_search_user'));
                if (!$search_result):
                    ?>
                    <br>
                    <center><h3>NO USERS FOUND</h3><br></center>
                    <?php
                else:
                    $for_log = array(
                        'username' => $this->session->userdata('username'),
                        'action' => "Search for an admin",
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
                                <th>Phone number</th>
                                <th>Email Address</th>
                                <th>System Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($search_result as $search_result):
                                ?>
                                <tr>
                                    <td><?= $line++; ?></td>

                                    <td><?= $search_result->admin_username ?></td>
                                    <td><?= $search_result->admin_lastname . ", " . $search_result->admin_firstname ?></td>
                                    <td><?= $search_result->admin_contact ?></td>
                                    <td><?= $search_result->admin_email ?></td>
                                    <td><?php
                                        if ($search_result->admin_status == 1) {
                                            echo 'Active';
                                        } else {
                                            echo 'Inactive';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" style = "background-color: #2f313e; color: white; border-color: #2f313e;" href="<?= $this->config->base_url() ?>sys_users/view_user/<?= $search_result->admin_id ?>" title = "View User" alt = "View User">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-warning" style = "background-color: #65aad3; color: white; border-color: #65aad3;" href="<?= $this->config->base_url() ?>sys_users/edit_user/<?= $search_result->admin_id ?>" title = "Edit User" alt = "Edit User">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
                <?php
            } elseif (isset($_POST['btn_all'])) {
                if (!$sys_user):
                    ?>
                    <br>
                    <center><h3>THERE ARE NO ACTIVE USERS</h3><br></center>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <h4>ACTIVE USERS</h4>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Phone number</th>
                                <th>Email Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($sys_user as $sys_user):
                                ?>
                                <tr>
                                    <td><?= $line++; ?></td>

                                    <td><?= $sys_user->admin_username ?></td>
                                    <td><?= $sys_user->admin_lastname . ", " . $sys_user->admin_firstname ?></td>
                                    <td><?= $sys_user->admin_contact ?></td>
                                    <td><?= $sys_user->admin_email ?></td>
                                    <td>
                                        <a class="btn btn-success" style = "background-color: #2f313e; color: white; border-color: #2f313e;" href="<?= $this->config->base_url() ?>sys_users/view_user/<?= $sys_user->admin_id ?>" title = "View User" alt = "View User">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-warning" style = "background-color: #65aad3; color: white; border-color: #65aad3;" href="<?= $this->config->base_url() ?>sys_users/edit_user/<?= $sys_user->admin_id ?>" title = "Edit User" alt = "Edit User">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?= $sys_user->admin_id ?>" title = "Delete User" alt = "Delete User">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
                <?php
            }
            elseif (isset($_POST['btn_inactive'])) {
                if (!$inactive):
                    ?>
                    <center><h3>THERE ARE NO INACTIVE USERS</h3><br></center>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <h4>INACTIVE USERS</h4>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Phone number</th>
                                <th>Email Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($inactive as $inactive):
                                ?>
                                <tr>
                                    <td><?= $line++; ?></td>
                                    <td><?= $inactive->admin_username ?></td>
                                    <td><?= $inactive->admin_lastname . ", " . $inactive->admin_firstname ?></td>
                                    <td><?= $inactive->admin_contact ?></td>
                                    <td><?= $inactive->admin_email ?></td>
                                    <td>
                                        <a class="btn btn-success" style = "background-color: #2f313e; color: white; border-color: #2f313e;" href="<?= $this->config->base_url() ?>sys_users/view_user/<?= $inactive->admin_id ?>" title = "View User" alt = "View User">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-warning" style = "background-color: #65aad3; color: white; border-color:#65aad3;" href="<?= $this->config->base_url() ?>sys_users/edit_user/<?= $inactive->admin_id ?>" title = "Edit User" alt = "Edit User">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a class="btn btn-success restore" href="<?= $this->config->base_url() ?>sys_users/restore_user/<?= $inactive->admin_id ?>" data-id="<?= $inactive->admin_id ?>" style = "padding-right: 5px" title = "Restore User" alt = "Restore User">
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
            title: "Are you sure you want to deactivate this user?",
            // text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>sys_users/delete_user/" + id;
                } else {
                    swal("The user is safe!");
                }
            });
    });
</script>
