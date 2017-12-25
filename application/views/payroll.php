<?php if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") { ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <center>
                <br>
                <?php
                $payroll = $this->item_model->fetch('tbl_payroll');
                if (!$payroll): ?>
                <center><h3>THERE ARE NO PAYROLL DATA AVAILABLE</h3><br></center>
                <?php else: ?>
                	<table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Username</th>
                                <th>Gross Salary</th>
                                <th>Witholding Tax</th>
                                <th>SSS</th>
                                <th>Philheath</th>
                                <th>PAGIBIG</th>
                                <th>Net Pay</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $line = 1;
                            foreach ($payroll as $p): ?>
                                <tr>
                                    <td><?= $line++;?></td>
                                    <td><?= $p->emp_username ?></td>
                                    <td><?= number_format($p->gross_salary, 2) ?></td>
                                    <td><?= number_format($p->wtax, 2) ?></td>
                                    <td><?= number_format($p->sss, 2) ?></td>
                                    <td><?= number_format($p->philhealth, 2) ?></td>
                                    <td><?= number_format($p->pagibig, 2) ?></td>
                                    <td><?= number_format($p->net_pay, 2) ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                <?php endif; ?>
            </center>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
        <?php
        $payroll = $this->item_model->fetch('tbl_payroll', array('emp_username' => $this->session->userdata('username')));
        $info = $this->item_model->fetch('employees', array('emp_username' => $this->session->userdata('username')));
        $info = $info[0];
        $payroll = $payroll[0];
        if (!$payroll): ?>
            <center><h3>THERE ARE NO PAYROLL DATA AVAILABLE</h3><br></center>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <td><strong style = "color: #65aad3">Employee ID</strong></td>
                        <td class="active"><?= $info->emp_id ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">Employee Name</strong></td>
                        <td class="active"><?= $info->emp_lastname.", ".$info->emp_firstname." ".$info->emp_middlename ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">Gross Income</strong></td>
                        <td class="active"><?= number_format($payroll->gross_salary, 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">Income Tax Withheld</strong></td>
                        <td class="active"><?= number_format($payroll->wtax, 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">SSS</strong></td>
                        <td class="active"><?= number_format($payroll->sss, 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">Philhealth</strong></td>
                        <td class="active"><?= number_format($payroll->philhealth, 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">PAGIBIG</strong></td>
                        <td class="active"><?= number_format($payroll->pagibig, 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">Other Deductions</strong></td>
                        <td class="active"><?= number_format($payroll->other_deduction, 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong style = "color: #65aad3">Net Pay</strong></td>
                        <td class="active"><strong><?= number_format($payroll->net_pay, 2) ?></strong></td>
                    </tr>
                </thead>
            </table>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php } ?>
<!-- /.row -->
           