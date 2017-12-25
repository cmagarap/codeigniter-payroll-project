<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Payroll Forgot Password">
    <meta name="author" content="S.E.X. Igniters">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->config->base_url()?>/assets/images/icon.png">
    <style>
        input[type=text]:focus {
            background-color: lightblue;
        }
        input[type=text] {
            width: 20%;
            padding: 7px 15px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            outline: none;
            border-radius: 4px;
        }
    </style>
    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->config->base_url() ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= $this->config->base_url() ?>assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= $this->config->base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= $this->config->base_url() ?>assets/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="error-box">
    <div class="error-body text-center">
        <h2 style = "color: #F33154; font-size: 50px"><b>ACCESS DENIED</b></h2>
        <p class="text-muted m-t-30 m-b-30"><i>You have entered invalid URL for password reset. Please try again.</i></p>
        <a href="javascript:history.go(-1)" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Go back to previous page</a>
    </div>
</div>

</body>
</html>