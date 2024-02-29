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
        <div class="row mb-5">
            <form class="col-md-12" method="post">
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
                            <!-- Check if $cart_items is not null before looping -->
                            <?php if (!empty($cart_items)) : ?>
                            <?php foreach ($cart_items as $item) : ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="<?= $item['image'] ?? '' ?>" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"><?= $item['name'] ?? '' ?></h2>
                                </td>
                                <td>$<?= $item['price'] ?? '' ?></td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <input type="number" class="form-control text-center" value="<?= $item['quantity'] ?? '' ?>" placeholder="" aria-label="Quantity" aria-describedby="button-addon1">
                                    </div>
                                </td>
                                <td>$<?= $item['total'] ?? '' ?></td>
                                <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="6">No items in the cart</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Update Cart and Continue Shopping buttons -->
            </div>
            <div class="col-md-6 pl-5">
                <!-- Cart Totals -->
            </div>
        </div>
    </div>
</div>