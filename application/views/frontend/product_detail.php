<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?= base_url('home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?= base_url('home/product') ?>">Product</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Ibuprofen Tablets, 200mg</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="<?= base_url('home/add_cart') ?>" method="post">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img src="<?= base_url('uploads/product/' . $item->image) ?>" alt="Image" class="img-fluid p-5">
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="id_item" value="<?= $item->id_item ?>">
                    <input type="hidden" name="name" value="<?= $item->name ?>">
                    <input type="hidden" name="price" value="<?= $item->price ?>">
                    <h2 class="text-black"><?= $item->name ?></h2>
                    <p><?= $item->description ?></p>
                    <p><strong class="text-primary h4"><?= indo_currency($item->price) ?></strong></p>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                        <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="site-section bg-secondary bg-image" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_2.jpg');">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_1.jpg');">
                        <div class="banner-1-inner align-self-center">
                            <h2>Pharma Products</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= base_url('') ?>assets/frontend/images/bg_2.jpg');">
                        <div class="banner-1-inner ml-auto  align-self-center">
                            <h2>Rated by Experts</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>