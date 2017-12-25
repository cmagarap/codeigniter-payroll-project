    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total No. of Present Employees</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i>
                        <span class="counter text-success"><?= $present ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Employees</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i>
                        <span class="counter text-purple"><?= $total ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Active Users</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i>
                        <span class="counter text-info"><?= $active ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->

    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <?php if (!$attendance_now) { ?>
                    <center><h3>THERE ARE NO EMPLOYEE ATTENDANCE RECORDED YET FOR TODAY</h3><br></center>
                <?php } else {
                    #echo "<div align = 'right'>" . $links . "</div>";
                    ?>
                    <div class="table-responsive">
                        <h2>LATEST ATTENDANCE</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>USERNAME</th>
                                <th>LAST NAME</th>
                                <th>FIRST NAME</th>
                                <th>TIME IN</th>
                                <th>TIME OUT</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($attendance_now as $attendance) {
                                ?>
                                <tr>
                                    <td><?= $line++ ?></td>
                                    <td><?= $attendance->username ?></td>
                                    <td><?= $attendance->lastname ?></td>
                                    <td><?= $attendance->firstname ?></td>
                                    <td><?= $attendance->time_in ?></td>
                                    <?php
                                    if ($attendance->time_out != NULL) {
                                        echo "<td>$attendance->time_out</td>";
                                    } else {
                                        echo "<td><font color = 'red'>Not checked out</font></td>";
                                    }
                                    ?>
                                    <td><?= $attendance->date ?></td>
                                    <?php
                                    if ($attendance->status == "Late") {
                                        echo "<td><font color = 'red'>$attendance->status</font></td>";
                                    } elseif ($attendance->status == "Overtime") {
                                        echo "<td><font color = 'orange'>$attendance->status</font></td>";
                                    } elseif ($attendance->status == "On time") {
                                        echo "<td><font color = '#32cd32'>$attendance->status</font></td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Highest net pay</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i>
                        <span class="counter text-success"><?= number_format($highest, 2) ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Average Net Pay</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i>
                        <span class="counter text-purple"><?= number_format($average, 2) ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Lowest net pay</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i>
                        <span class="counter text-info"><?= number_format($lowest, 2) ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->