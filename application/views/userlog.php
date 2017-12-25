<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php if (!$user_log) { ?>
                <center><h3>THERE ARE NO USER ACTIVITIES RECORDED</h3><br></center>
                <?php
            } else {
                echo "<div align = 'right'>" . $links . "</div>";
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>USERNAME</th>
                            <th>ACTION</th>
                            <th>USER TYPE</th>
                            <th>DATE</th>
                            <th>TIME</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($user_log as $log) { ?>
                            <tr>
                                <td><?= $log->userlog_id ?></td>
                                <td><?= $log->username ?></td>
                                <td><?= $log->action ?></td>
                                <td><?= $log->user_type ?></td>
                                <td><?= date("F j, Y", $log->time_and_date) ?></td>
                                <td><?= date("h:i A", $log->time_and_date) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
