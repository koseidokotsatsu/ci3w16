<section class="content-header">
    <h1>
        Items
        <small>Data Barang</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Product Items</h3>
            <div class="pull-right">
                <a href="<?= site_url('item/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create Product Item
                </a>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td>
                                <?= $data->barcode ?> <br>
                                <a href="<?= site_url('item/barcode_qrcode/' . $data->id_item) ?>" class="btn btn-warning btn-xs">
                                    View Barcode <i class="fa fa-barcode"></i>
                                </a>
                            </td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->name_category ?></td>
                            <td><?= $data->name_unit ?></td>
                            <td><?= $data->price ?></td>
                            <td><?= $data->stock ?></td>
                            <td>
                                <?php if($data->image != null) { ?>
                                    
                                    <img src="<?= base_url('uploads/product/'.$data->image) ?>" style="width: 100px;">
                                <?php } ?>
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('item/edit/' . $data->id_item) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="<?= site_url('item/del/' . $data->id_item) ?>"onclick="return confirm('Yakin ingin hapus data ini?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>
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