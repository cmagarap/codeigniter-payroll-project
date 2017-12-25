<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
<?php
if(!$attendance) { ?>
    <center><h3>THERE ARE NO EMPLOYEE ATTENDANCE RECORDED</h3><br></center>
<?php } else { ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>DATE</th>
                <th>TIME IN</th>
                <th>TIME OUT</th>
                <th>STATUS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $line = 1;
            foreach($attendance as $attendance) { ?>
                <tr>
                    <td><?= $line++?></td>
                    <td><?= $attendance->date ?></td>
                    <td><?= $attendance->time_in ?></td>
                    <?php
                    if($attendance->time_out != NULL) {
                        echo "<td>$attendance->time_out</td>";
                        } else {
                        echo "<td><font color = 'red'>Not checked out</font></td>";
                        }
                    ?>
                    <?php
                    if($attendance->status == "Late") {
                        echo "<td><font color = 'red'>$attendance->status</font></td>";
                    } elseif($attendance->status == "Overtime") {
                        echo "<td><font color = 'orange'>$attendance->status</font></td>";
                    } elseif($attendance->status == "On time") {
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
