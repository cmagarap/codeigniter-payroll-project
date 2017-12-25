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
        <?php
        if($_POST) {
            $email = $_POST['email'];
        }
        else {
            $email = "";
        }

        ?>
        <h2 style = "color: #65aad3; font-size: 50px"><b>Seems you've forgotten your password...</b></h2>
        <p class="text-muted m-t-30 m-b-30"><i>Enter the email for your account below to request a password reset.</i></p>
        <form action="<?= $this->config->base_url() ?>payroll/forgot_checkmail" method = "POST">
            <label for="email" class="col-md-12">Email Address:</label>
            <input type="text" name = "email" placeholder="Enter your email..." value = "<?= $email ?>">
            <br><br>
            <font color = "red"><?php echo validation_errors(); ?>
                <?php
                if ($this->session->flashdata('forgot_error') != '') {
                    echo $this->session->flashdata('forgot_error') . '<br><br>';
                }
                ?></font>
            <input type="submit" value = "Send request" class = "btn btn-rounded waves-effect waves-light m-b-40" style = "background-color: #65aad3; color: white">
            <a href="<?= $this->config->base_url() ?>payroll/" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>