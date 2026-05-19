<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Payroll">
    <meta name="author" content="S.E.X. Igniters">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $this->config->base_url()?>assets/css/bootstrap.css"/>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->config->base_url()?>/assets/images/icon.png">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 50px;
            border: 1px solid #888;
            width: 38%;
        }
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <link href="<?= $this->config->base_url()?>/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/css/style.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/css/colors/default.css" id="theme" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= $this->config->base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?= $this->config->base_url()?>assets/js/clock.js"></script>
</head>

<body class="fix-header" onload="startTime()">
<?php
if($this->session->has_userdata('isloggedin')):
if ($this->session->userdata('type') == "Super Administrator"):
?>
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="<?= site_url('dashboard/'); ?>">
                    <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" alt="home" class="light-logo" padding="100px"/>
                    <span class="hidden-xs">
                        <img src="<?= $this->config->base_url() ?>assets/images/payroll-s.png" alt="home" class="light-logo" width="150" padding="100px"/>
                    </span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right pull-left">
                <li>
                    <a class="profile-pic" href="<?= site_url('profile/'); ?>">
                        <?php if (!empty($user_image)): ?>
                            <img src="http://localhost/payroll-api/uploads/<?= $user_image ?>" 
                                 alt="user-img" width="36" class="img-circle">
                        <?php else: ?>
                            <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" 
                                 alt="user-img" width="36" class="img-circle">
                        <?php endif; ?>
                        <b class="hidden-xs">
                            <?= $this->session->userdata('username'); ?>
                        </b>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a><b class="hidden-xs"><?php echo date('F j, Y') . " "; ?></b></a>
                </li>
                <li>
                    <a>
                        <div id="clock" style="display: inline; color: #65aad3"></div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close">
                        <i class="ti-close ti-menu"></i>
                    </span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <ul class="nav" id="side-menu">
                <li><a></a></li>
                <li style="padding: 70px 0 0;">
                    <a href="<?= site_url('dashboard/'); ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="<?= site_url('profile/'); ?>" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
                </li>
                <li>
                    <a href="<?= site_url('employees/'); ?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Employee Data</a>
                </li>
                <li>
                    <a href="<?= site_url('payroll/payroll/'); ?>" class="waves-effect"><i class="fa fa-money fa-fw" aria-hidden="true"></i>Payroll</a>
                </li>
                <li>
                    <a href="<?= site_url('attendance/page'); ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Attendance</a>
                </li>
                <li>
                    <a href="<?= site_url('sys_users/'); ?>" class="waves-effect"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>System Users</a>
                </li>
                <li>
                    <a href="<?= site_url('user_log/page'); ?>" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>User Log</a>
                </li>
                <li>
                    <a href="<?= site_url('payroll/about/'); ?>" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>About</a>
                </li>
            </ul>
            <div class="center p-20">
                <a href="<?= site_url('payroll/logout'); ?>"
                   class="btn btn-danger btn-block waves-effect waves-light">
                    <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout
                </a>
            </div>
        </div>
    </div>

<?php elseif ($this->session->userdata('type') == "Administrator"): ?>

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="<?= site_url('dashboard/'); ?>">
                    <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" alt="home" class="light-logo" padding="100px"/>
                    <span class="hidden-xs">
                        <img src="<?= $this->config->base_url() ?>assets/images/payroll-s.png" alt="home" class="light-logo" width="150" padding="100px"/>
                    </span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right pull-left">
                <li>
                    <a class="profile-pic" href="<?= site_url('profile/admin'); ?>">
                        <?php if (!empty($user_image)): ?>
                            <img src="http://localhost/payroll-api/uploads/<?= $user_image ?>" 
                                 alt="user-img" width="36" class="img-circle">
                        <?php else: ?>
                            <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" 
                                 alt="user-img" width="36" class="img-circle">
                        <?php endif; ?>
                        <b class="hidden-xs">
                            <?= $this->session->userdata('username'); ?>
                        </b>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a><b class="hidden-xs"><?php echo date('F j, Y') . " "; ?></b></a>
                </li>
                <li>
                    <a>
                        <div id="clock" style="display: inline; color: #65aad3"></div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <ul class="nav" id="side-menu">
                <li><a></a></li>
                <li style="padding: 70px 0 0;">
                    <a href="<?= site_url('dashboard/'); ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="<?= site_url('profile/admin/'); ?>" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
                </li>
                <li>
                    <a href="<?= site_url('employees/'); ?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Employee Data</a>
                </li>
                <li>
                    <a href="<?= site_url('payroll/payroll/'); ?>" class="waves-effect"><i class="fa fa-money fa-fw" aria-hidden="true"></i>Payroll</a>
                </li>
                <li>
                    <a href="<?= site_url('attendance/page'); ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Attendance</a>
                </li>
                <li>
                    <a href="<?= site_url('user_log/page'); ?>" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>User Log</a>
                </li>
                <li>
                    <a href="<?= site_url('payroll/about/'); ?>" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>About</a>
                </li>
            </ul>
            <div class="center p-20">
                <a href="<?= site_url('payroll/logout'); ?>"
                   class="btn btn-danger btn-block waves-effect waves-light">
                    <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout
                </a>
            </div>
        </div>
    </div>

<?php elseif ($this->session->userdata('type') == "Employee"): ?>

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="<?= site_url('dashboard/'); ?>">
                    <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" alt="home" class="light-logo" padding="100px"/>
                    <span class="hidden-xs">
                        <img src="<?= $this->config->base_url() ?>assets/images/payroll-s.png" alt="home" class="light-logo" width="150" padding="100px"/>
                    </span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right pull-left">
                <li>
                    <a class="profile-pic" href="<?= site_url('employees/profile_emp'); ?>">
                        <?php if (!empty($user_image)): ?>
                            <img src="http://localhost/payroll-api/uploads/<?= $user_image ?>" 
                                 alt="user-img" width="36" class="img-circle">
                        <?php else: ?>
                            <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" 
                                 alt="user-img" width="36" class="img-circle">
                        <?php endif; ?>
                        <b class="hidden-xs">
                            <?= $this->session->userdata('username'); ?>
                        </b>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a><b class="hidden-xs"><?php echo date('F j, Y') . " "; ?></b></a>
                </li>
                <li>
                    <a>
                        <div id="clock" style="display: inline; color: #65aad3"></div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <ul class="nav" id="side-menu">
                <li><a></a></li>
                <li style="padding: 70px 0 0;">
                    <a href="<?= site_url('employees/profile_emp'); ?>" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
                </li>
                <li>
                    <a href="<?= site_url('payroll/payroll/'); ?>" class="waves-effect"><i class="fa fa-money fa-fw" aria-hidden="true"></i>Payroll</a>
                </li>
                <li>
                    <a href="<?= site_url('attendance/page'); ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>My Attendance</a>
                </li>
                <li>
                    <a href="<?= site_url('payroll/about/'); ?>" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>About</a>
                </li>
            </ul>
            <div class="center p-20">
                <a href="<?= site_url('payroll/logout'); ?>"
                   class="btn btn-danger btn-block waves-effect waves-light">
                    <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout
                </a>
            </div>
        </div>
    </div>

<?php endif;
else:
    redirect('payroll/');
endif;
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?= $heading; ?></h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><?= $user; ?></li>
                    <li class="active"><b><?= $side; ?></b></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->