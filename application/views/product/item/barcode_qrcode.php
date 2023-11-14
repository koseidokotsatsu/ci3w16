<section class="content-header">
    <h1>
        Items
        <small>Data Barang</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('error_msg'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Barcode</h3>
            <div class="pull-right">
                <a href="<?= site_url('item'); ?>" class="btn btn-warning btn-flat btn-sm">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($row->barcode, $generator::TYPE_CODE_128_B);
            ?>
            <?= $row->barcode?>
        </div>
    </div>
</section>