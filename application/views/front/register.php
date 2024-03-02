<?php
$login = $this->session->flashdata('frontlogin');
if (!isset($login)) {
    $login = '';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Our Pharmacy | Sign Up</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/iCheck/square/blue.css" />
    <!-- Logo -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo/ngana.png" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
</head>

<body class="hold-transition login-page" style="
			background: url(../assets/img/bg_f.jpg) no-repeat;
			width: 100%;
			height: auto;
			background-size: cover;
			background-position: center;
		">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>OUR</b> PHARMACY</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <?php if ($login) { ?>
            <!-- Display flashdata message for registration -->
            <div class="alert alert-warning" role="alert">
                <?= $login ?>
            </div>
            <?php } else { ?>
            <p class="login-box-msg">Sign Up to start your new session</p>
            <?php } ?>
            <form action="<?= site_url('customerauth/register'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <!-- Display error message for username -->
                    <?= form_error('username', '<p class="text-danger"><i>', '</i></p>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="customer_name" class="form-control" placeholder="Full Name" required />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <!-- Display error message for customer name -->
                    <?= form_error('customer_name', '<p class="text-danger"><i>', '</i></p>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <!-- Display error message for password -->
                    <?= form_error('password', '<p class="text-danger"><i>', '</i></p>'); ?>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="<?= base_url('customerauth/login') ?>" class="text-center"><i>Already Have an Account?</i></a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">
                            Sign Up
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/'); ?>plugins/iCheck/icheck.min.js"></script>
</body>

</html>