<div class="site-blocks-cover" style="background-image: url('assets/frontend/images/hero_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <h2 class="sub-title">You choose your own health</h2>
                    <h1>Welcome To OurPharmacy</h1>
                    <p>
                        <a href="<?= base_url('home/product/' . 1) ?>" class="btn btn-primary px-5 py-3">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">Popular Products</h2>
            </div>
        </div>
        <div class="row">

            <?php
            shuffle($items);
            $limitedItems = array_slice($items, 0, 3);

            foreach ($limitedItems as $item) {
                ?>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <a href="#">
                    <img src="<?= base_url('uploads/product/') . $item->image ?>" alt="Image" class="product-image">
                </a>
                <h3 class="text-dark">
                    <a href="#"><?= $item->name ?></a>
                </h3>
                <p class="price"><?= indo_currency($item->price) ?></p>
            </div>
            <?php } ?>

        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="<?= base_url('home/product/' . 1) ?>" class="btn btn-primary px-4 py-3">View All Products</a>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">New Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3 products-wrap">
                <div class="nonloop-block-3 owl-carousel">
                    <?php
                    shuffle($items);
                    $limitedItems = array_slice($items, 0, 6);

                    foreach ($limitedItems as $item) {
                        ?>
                    <div class="text-center item mb-4">
                        <a href="#">
                            <div class="product-image-container">
                                <img src="<?= base_url('uploads/product/') . $item->image ?>" alt="Image" class="product-image-slide">
                            </div>
                        </a>
                        <h3 class="text-dark"><a href="#"><?= $item->name ?></a></h3>
                        <p class="price"><?= indo_currency($item->price) ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="site-section bg-secondary bg-image" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_2.jpg');">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="<?= base_url('home/product/' . 1) ?>" class="banner-1 h-100 d-flex" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_1.jpg');">
                    <div class="banner-1-inner align-self-center">
                        <h2>Pharma Products</h2>
                        <p>Pharma product is manufacturer of liquid pharmaceutical forms. In the world of pharmacy
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="<?= base_url('home/contact') ?>" class="banner-1 h-100 d-flex" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_2.jpg');">
                    <div class="banner-1-inner ml-auto  align-self-center">
                        <h2>We Serve <br> You Better</h2>
                        <p>We are here to serve you better. Let us know if there's anything we can do to help.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>