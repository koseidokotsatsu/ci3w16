<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | OurPharmacy </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/select2/select2.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="<?= base_url(''); ?>assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?= base_url(''); ?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Logo -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo/ngana.png" type="image/x-icon">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script>
        var baseUrl = '<?= base_url() ?>';
    </script>

</head>

<body class="hold-transition skin-purple sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= site_url('dashboard'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>DC</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Our<b>Pharmacy</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/img/' . $this->fuct->user_login()->img); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fuct->user_login()->username ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/img/' . $this->fuct->user_login()->img); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $this->fuct->user_login()->name ?>
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('user/edit/' . $this->fuct->user_login()->id_user); ?>" class="btn btn-primary btn-flat">Edit Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/img/' . $this->fuct->user_login()->img); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fuct->user_login()->username ?></p>
                        <a><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('dashboard'); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if ($this->fuct->user_login()->level == 1) { ?>
                    <li <?= $this->uri->segment(1) == 'supplier'  ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('supplier'); ?>">
                            <i class="fa fa-truck"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li <?= $this->uri->segment(1) == 'customer'  ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('customer'); ?>">
                            <i class="fa fa-users"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                    <li class="treeview <?= $this->uri->segment(1) == 'category' ||
                                            $this->uri->segment(1) == 'type' ||
                                            $this->uri->segment(1) == 'general_name' ||
                                            $this->uri->segment(1) == 'item' ||
                                            $this->uri->segment(1) == 'unit' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-archive"></i>
                            <span>Product</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'item'  ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('item'); ?>"><i class="fa fa-circle-o"></i> Items</a>
                            </li>
                            <?php if ($this->fuct->user_login()->level == 1) { ?>
                            <li <?= $this->uri->segment(1) == 'category'  ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('category'); ?>"><i class="fa fa-circle-o"></i> Categories</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'type'  ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('type'); ?>"><i class="fa fa-circle-o"></i> Type</a></li>
                            <li <?= $this->uri->segment(1) == 'general_name'  ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('general_name'); ?>"><i class="fa fa-circle-o"></i> General Name</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'unit'  ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('unit'); ?>"><i class="fa fa-circle-o"></i> Units</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="treeview <?= $this->uri->segment(1) == 'stock' ||
                                            $this->uri->segment(1) == 'receipt' ||
                                            $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-cart-arrow-down"></i>
                            <span>Transaction&nbsp;&nbsp;<?php if ($pending_deliveries) { ?>
                                <span class="label bg-red">!</span>
                                <?php } ?>
                            </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'sale' ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('sale'); ?>"><i class="fa fa-circle-o"></i> Sales</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'receipt'  ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('receipt'); ?>">
                                    <?php if ($pending_deliveries) { ?>
                                    <i class="fa fa-circle-o text-red"></i> Data Sale
                                    <span class="label pull-right bg-red">!</span>
                                    <?php } else { ?>
                                    <i class="fa fa-circle-o"></i> Data Sale
                                    <?php } ?>
                                </a>
                            </li>
                            <?php if ($this->fuct->user_login()->level == 1) { ?>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('stock/in'); ?>"><i class="fa fa-circle-o"></i> Stock in</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('stock/out'); ?>"><i class="fa fa-circle-o"></i> Stock Out</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <!-- frontend controller -->

                    <?php if ($this->fuct->user_login()->level == 1) { ?>
                    <li class="header">FRONTEND</li>
                    <li <?= $this->uri->segment(1) == 'aboutc' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('aboutc'); ?>">
                            <i class="fa fa-dot-circle-o"></i>
                            <span>About Content </span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'contact' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('contact'); ?>">
                            <?php if ($unreadmessage) { ?>
                            <i class="fa fa-dot-circle-o text-info"></i>Contact
                            <span class="label pull-right bg-blue">new</span>
                            <?php } else { ?>
                            <i class="fa fa-dot-circle-o"></i>Contact
                            <?php } ?>
                        </a>
                    </li>
                    <?php } ?>

                    <li class="header">SETTINGS</li>
                    <?php if ($this->fuct->user_login()->level == 1) { ?>
                    <li <?= $this->uri->segment(1) == 'user'  ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('user'); ?>">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <?php } else { ?>
                    <li <?= $this->uri->segment(1) == 'user'  ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('user/edit/' . $this->fuct->user_login()->id_user); ?>">
                            <i class="fa fa-pencil-square-o"></i>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>


            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- jQuery 3 -->
        <script src="<?= base_url(''); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents; ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->


    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(''); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?= base_url(''); ?>assets/bower_components/raphael/raphael.min.js"></script>
    <script src="<?= base_url(''); ?>assets/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(''); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?= base_url(''); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url(''); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(''); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(''); ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url(''); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url(''); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url(''); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(''); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url(''); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url(''); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url(''); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(''); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url(''); ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(''); ?>assets/dist/js/demo.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url(''); ?>assets/plugins/select2/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })

        $(function() {
            $(".select2").select2();
        })
    </script>
</body>

</html>