<section class="content-header">
    <h1>
        Items
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li>Product</li>
        <li class="active">Item</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Product Items</h3>
            <div class="pull-right">
                <?php if ($this->fuct->user_login()->level == 1) { ?>
                    <a href="<?= site_url('item/add'); ?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>General Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <?php if ($this->fuct->user_login()->level == 1) { ?>
                            <th>Actions</th>
                        <?php } ?>
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
                                    Generate <i class="fa fa-barcode"></i> <i class="fa fa-qrcode"></i>
                                </a>
                            </td>
                            <td><?= $data->name ?? 'N/A' ?></td>
                            <td><?= $data->description ?? 'N/A' ?></td>
                            <td><span class="label label-primary"><?= $data->general_name ?? 'N/A' ?></span></td>
                            <td><?= $data->name_category ?? 'N/A' ?></td>
                            <td><?= $data->type_name ?? 'N/A' ?></td>
                            <td><?= $data->name_unit ?? 'N/A' ?></td>
                            <td><?= $data->price ?? 'N/A' ?></td>
                            <td><?= $data->stock ?? 'N/A' ?></td>
                            <?php if ($this->fuct->user_login()->level == 1) { ?>
                                <td>
                                    <?php if ($data->image != null) { ?>
                                        <img src="<?= base_url('uploads/product/' . $data->image) ?>" style="width: 100px;">
                                    <?php } ?>
                                </td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('item/edit/' . $data->id_item) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?= site_url('item/del/' . $data->id_item) ?>" onclick="return confirm('Yakin ingin hapus data ini?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?= site_url('item/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [5, 6],
                    "className": "text-right"
                },
                {
                    "targets": [7, 8],
                    "className": "text-center"
                },
                {
                    "targets": [0, 7, 8],
                    "orderable": false
                }
            ]
        })
    })
</script>