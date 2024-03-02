<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Cart</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="<?= base_url('home/checkout'); ?>" method="post">
            <div class="row mb-5">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($this->cart->contents())) {
                                foreach ($this->cart->contents() as $items) {
                                    $total = $items['qty'] * $items['price'];
                                    ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="<?= base_url('uploads/product/' . $items['image'])  ?>" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"><?= $items['name'] ?></h2>
                                </td>
                                <td><?= indo_currency($items['price']) ?></td>
                                <td><?= $items['qty'] ?></td>
                                <td><?= indo_currency($total) ?></td> <!-- Display total for the current item -->
                                <td><a href="<?= base_url(); ?>home/hapus_cart/<?= $items['rowid']; ?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="6">No items in the cart</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="<?= base_url('home/product') ?>" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>

                            <?php
                            $total = 0;
                            foreach ($this->cart->contents() as $items) {
                                $subTotal = $items['qty'] * $items['price'];
                                $total += $subTotal;
                                ?>
                            <?php } ?>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"><?= indo_currency($total) ?></strong>
                                </div>
                            </div>
                            <?php if (!empty($this->cart->contents())) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed To Checkout</button>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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