<!DOCTYPE html>
<html lang="en">

<head>
    <title>OurPharmacy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="<?= base_url(); ?>assets/img/logo/ngana.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/style.css">

</head>

<body>
    <div class="site-wrap">
        <div class="site-navbar py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="<?= base_url('home/search') ?>" method="post">
                        <input type="text" name="search" class="form-control" placeholder="Search product and hit enter...">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="<?= base_url('home') ?>" class="js-logo-clone">OurPharmacy</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="<?= base_url('home') ?>">Home</a></li>
                                <li><a href="<?= base_url('home/product/') . 1 ?>">Product</a></li>
                                <li><a href="<?= base_url('home/about') ?>">About</a></li>
                                <li><a href="<?= base_url('home/contact') ?>">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                        <?php if ($this->session->userdata('id_customer')) { ?>
                        <a href="<?= base_url('home/view_cart') ?>" class="icons-btn d-inline-block bag">
                            <a href="<?= base_url('home/view_cart') ?>" class="icons-btn d-inline-block bag">
                                <span class="icon-shopping-bag"></span>
                            </a>
                        </a>
                        <a href="<?= base_url('home/user') ?>" class="icons-btn d-inline-block"><span class="icon-user"></span></a>
                        <a href="<?= base_url('customerauth/logout') ?>" class="icons-btn d-inline-block"><span class="icon-input"></span></a>
                        <?php } else { ?>
                        <a href="<?= base_url('customerauth/login') ?>" class="icons-btn d-inline-block"><span class="icon-user"></span></a>
                        <?php } ?>
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Life is awfull -->
        <div class="content-wrapper">
            <?= $contentsfront; ?>
        </div>
        <!-- Life is awfull -->

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About Us</h3>
                            <p>Not only have we been providing to the pharmacy sector for over a decade, but we've also got first-hand experience in running pharmacies.</p>
                        </div>

                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('home/product/') . 1 ?>">Product</a></li>
                            <li><a href="<?= base_url('home/about') ?>">About</a></li>
                            <li><a href="<?= base_url('home/contact') ?>">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address">Kasihan, Bantul, Daerah Istimewa Yogyakarta</li>
                                <li class="phone"><a href="tel://2826352812">+2 826 352 812</a></li>
                                <li class="email">ourpharmacy@gmail.com</li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </p>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script src="<?= base_url('assets/frontend/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery-ui.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/aos.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/main.js"></script>


</body>

</html>