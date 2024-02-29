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
    <title>Our Pharmacy | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css" />
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
			background: url(../assets/img/bg.jpg) no-repeat;
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
            <!-- Flash message for login -->
            <?php if ($login) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $login ?>
            </div>
            <?php } else { ?>
            <p class="login-box-msg">Sign in to start your session</p>
            <?php } ?>
            <form action="<?= site_url('customerauth/process'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8"></div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">
                            Sign In
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