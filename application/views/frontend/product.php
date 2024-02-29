<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.html">Home</a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Product</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <!-- Search Bar -->
                <div class="input-group mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search by name...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="searchButton" type="button">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Filter by Preferences Dropdown -->
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
                <select id="filterDropdown" class="custom-select">
                    <option value="relevance">Relevance</option>
                    <option value="name_az">Name, A to Z</option>
                    <option value="name_za">Name, Z to A</option>
                    <option value="price_low">Price, low to high</option>
                    <option value="price_high">Price, high to low</option>
                </select>
            </div>
        </div>

        <div class="row" id="searchResults">

            <?php
            $limitedItems = array_slice($items, 0, 9);

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
            <div class="col-md-12 text-center">
                <div class="site-block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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