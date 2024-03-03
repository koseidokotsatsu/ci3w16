<div class="site-blocks-cover inner-page" style="background-image: url('<?= base_url('') ?>assets/frontend/images/hero_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto align-self-center">
                <div class=" text-center">
                    <h1>About Us</h1>
                    <p>Not only have we been providing to the pharmacy sector for over a decade, but we've also got first-hand experience in running pharmacies. Two of the founding partners within our business are community pharmacists, which is why we understand the importance of web technology for your pharmacy.</p>ˀ
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section custom-border-bottom" data-aos="fade">
    <div class="container">
        <?php $counter = 0; ?>
        <?php foreach ($row->result() as $key => $data) { ?>
        <div class="row mb-5">
            <div class="col-md-6 <?php echo ($counter % 2 == 0) ? '' : 'order-md-2'; ?>">
                <div class="block-16">
                    <figure>
                        <img src="<?= base_url('assets/frontend/images/about_content/' . $data->img) ?>" alt="Image placeholder" class="img-fluid rounded">
                        <a href="<?= $data->link ?>" class="play-button"><span class="icon-play"></span></a>
                    </figure>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 <?php echo ($counter % 2 == 0) ? 'order-md-2' : ''; ?>">
                <div class="site-section-heading pt-3 mb-4">
                    <h2 class="text-black"><?= $data->title ?></h2>
                </div>
                <p><?= $data->description ?></p>
            </div>
        </div>
        <?php $counter++; ?>
        <?php } ?>
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