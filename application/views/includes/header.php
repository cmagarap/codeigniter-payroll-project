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
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 50px;
            border: 1px solid #888;
            width: 38%;
        }

        /* The Close Button */
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
    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->config->base_url()?>/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?= $this->config->base_url()?>/assets/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?= $this->config->base_url()?>/assets/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?= $this->config->base_url()?>/assets/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= $this->config->base_url()?>/assets/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>/assets/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= $this->config->base_url()?>/assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= $this->config->base_url()?>/assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= $this->config->base_url()?>/assets/css/colors/default.css" id="theme" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= $this->config->base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?= $this->config->base_url()?>assets/js/clock.js"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
</head>

<body class="fix-header" onload="startTime()">
<?php
if($this->session->has_userdata('isloggedin')):
if ($this->session->userdata('type') == "Super Administrator"):
?>
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->

<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="<?= site_url('dashboard/'); ?>">
                    <!-- Logo icon image, you can use font-icon also -->
                    <!--This is dark logo icon-->
                    <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" alt="home" class="light-logo" padding = "100px"/>

                    <!-- Logo text image you can use text also -->
                    <span class="hidden-xs">
                            <!--This is light logo text-->
                            <img src="<?= $this->config->base_url() ?>assets/images/payroll-s.png" alt="home" class="light-logo" width="150" padding="100px"/>
                        </span>
                </a>
            </div>
            <!-- /Logo -->
            <ul class="nav navbar-top-links navbar-right pull-left">
                <li>
                    <a class="profile-pic" href="<?= site_url('profile/'); ?>">
                        <img src="<?= $this->config->base_url() ?>uploads/<?= $user_image ?>" alt="user-img"
                             width="36" class="img-circle">
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
                    </a><!-- pink: F33154; gray: 2f313e -->
                </li>
            </ul>

        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
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
                <li>
                    <!-- This is just for space -->
                    <a></a>
                </li>
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
                    <a href="<?= site_url('sys_users/'); ?>" class="waves-effect"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>System
                        Users</a>
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
                   class="btn btn-danger btn-block waves-effect waves-light"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
            </div>
        </div>
    </div>
    <?php
    elseif ($this->session->userdata('type') == "Administrator"):
    ?>
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?= site_url('dashboard/'); ?>">
                        <!-- Logo icon image, you can use font-icon also -->
                        <!--This is dark logo icon-->
                        <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" alt="home" class="light-logo" padding = "100px"/>

                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <!--This is light logo text-->
                                <img src="<?= $this->config->base_url() ?>assets/images/payroll-s.png" alt="home" class="light-logo" width="150" padding="100px"/>
                            </span>
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-left">
                    <li>
                        <a class="profile-pic" href="<?= site_url('profile/admin'); ?>">
                            <img src="<?= $this->config->base_url() ?>uploads/<?= $user_image ?>" alt="user-img"
                                 width="36" class="img-circle">
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
                        </a><!-- pink: F33154; gray: 2f313e -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- This is just for space -->
                        <a></a>
                    </li>
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
                       class="btn btn-danger btn-block waves-effect waves-light"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                </div>
            </div>
        </div>
        <?php
        elseif ($this->session->userdata('type') == "Employee"):
        ?>
        <!-- ============================================================== -->
        <!-- Preloader -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Wrapper -->
        <!-- ============================================================== -->
        <div id="wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <div class="top-left-part">
                        <!-- Logo -->
                        <a class="logo" href="<?= site_url('dashboard/'); ?>">
                            <!-- Logo icon image, you can use font-icon also -->
                            <!--This is dark logo icon-->
                            <img src="<?= $this->config->base_url() ?>assets/images/icon-s.png" alt="home" class="light-logo" padding = "100px"/>

                            <!-- Logo text image you can use text also -->
                            <span class="hidden-xs">
                                    <!--This is light logo text-->
                                    <img src="<?= $this->config->base_url() ?>assets/images/payroll-s.png" alt="home" class="light-logo" width="150" padding="100px"/>
                                </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-right pull-left">
                        <li>
                            <a class="profile-pic" href="<?= site_url('employees/profile_emp'); ?>">
                                <img src="<?= $this->config->base_url() ?>uploads_employee/<?= $user_image ?>" alt="user-img" width="36" class="img-circle">
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
                            </a><!-- pink: F33154; gray: 2f313e -->
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
            <!-- End Top Navigation -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">
                    <div class="sidebar-head">
                        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li>
                            <!-- This is just for space -->
                            <a></a>
                        </li>
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
                           class="btn btn-danger btn-block waves-effect waves-light"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                    </div>
                </div>
            </div>
            <?php endif;
            else:
                redirect('payroll/');
            endif;
            ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- PAGE CONTENT -->
            <!-- ============================================================== -->
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
