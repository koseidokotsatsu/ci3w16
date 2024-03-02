<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Contact</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black">Get In Touch</h2>
            </div>
            <?php if ($this->session->flashdata('message2')) : ?>
            <div class="container mt-3">
                <?= $this->session->flashdata('message2'); ?>
            </div>
            <?php endif; ?>

            <div class="col-md-12">

                <form action="<?= base_url('contact/add') ?>" method="post">

                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="firstname" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstname" name="firstname">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="subject" class="text-black">Subject </label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="message " class="text-black">Message </label>
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="site-section bg-secondary bg-image" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_2.jpg');">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="<?= base_url('home/product') ?>" class="banner-1 h-100 d-flex" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_1.jpg');">
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