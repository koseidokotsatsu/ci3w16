<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Checkout</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="<?= base_url('home/transaction') ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="receiver" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="receiver" name="receiver" value="<?= $cust->name ?>">
                                <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?= $cust->id_customer ?>">
                                <input type="hidden" class="form-control" id="customer_name" name="customer_name" value="<?= $cust->name ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="address" name="address" placeholder="Street address"><?= $cust->address ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="pos_code" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="pos_code" name="pos_code" value="<?= $cust->pos_code ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= $cust->phone ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note" class="text-black">Order Notes</label>
                            <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($this->cart->contents())) {
                                            foreach ($this->cart->contents() as $items) {
                                                $total = $items['qty'] * $items['price'];
                                                ?>
                                        <tr>
                                            <td><?= $items['name'] ?>&nbsp;&nbsp;x&nbsp;&nbsp;<?= $items['qty'] ?></td>
                                            <td><?= indo_currency($total) ?></td>
                                        </tr>
                                        <?php }
                                        } else { ?>
                                        <tr>
                                            <td colspan="6">No items in the cart</td>
                                        </tr>
                                        <?php } ?>
                                        <?php
                                        $total_early = 0;
                                        foreach ($this->cart->contents() as $items) {
                                            $subTotal = $items['qty'] * $items['price'];
                                            $total_early += $subTotal;
                                            ?>
                                        <?php } ?>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong><?= indo_currency($total_early) ?></strong></td>
                                            <input type="hidden" name="total_early" value="<?= $total_early ?>">
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="border mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cash On Delivery</a></h3>
                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2 px-4">
                                            <p class="mb-0">Cash on delivery or pay on delivery are cash payment methods when receiving a package delivered by post. If goods are not paid for, they will be returned to the retailer.</p>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($this->cart->contents())) { ?>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
                                </div>
                                <?php } ?>
                            </div>
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