<section class="content-header">
    <h1>
        Stock In
        <small>Stock data / Buying</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Stock</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/in/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Product Item</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->barcode ?></td>
                            <td><?= $data->item_name ?></td>
                            <td class="text-right"><?= $data->qty ?></td>
                            <td class="text-center"><?= indo_date($data->date) ?></td>
                            <td class="text-center" width="160px">
                                <a class="btn btn-primary btn-xs">
                                    <i class="fa fa-eye"> Detail</i>
                                </a>
                                <a href="<?= site_url('stock/in/del/' . $data->id_stock.'/'. $data->id_item) ?>" onclick="return confirm('Yakin ingin hapus data ini?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Delete</i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>