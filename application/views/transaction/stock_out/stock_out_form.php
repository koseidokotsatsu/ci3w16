<section class="content-header">
    <h1>
        Stock Out
        <small>Barang Keluar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Stock Out</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/out'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= base_url('stock/process_out') ?>" method="post">
                        <div class="form-group">
                            <label>Date<span style="color: #BA3131;">*</span></label>
                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                        </div>
                        <div>
                            <label for="barcode">Barcode<span style="color: #BA3131;">*</span></label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="id_item" id="id_item">
                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Item Name<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="name_unit">Item Unit</label>
                                    <input type="text" name="name_unit" id="name_unit" value="-" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Initial Stock</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detail<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="detail" class="form-control" placeholder="Rusak / Kadaluwarsa / Hilang / etc" required>
                        </div>
                        <div class="form-group">
                            <label>Qty<span style="color: #BA3131;">*</span></label>
                            <input type="number" name="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="out_add" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Save
                            </button>
                            <button type="Reset" class="btn btn-flat">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($item as $i => $data) { ?>
                            <tr>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->name ?></td>
                                <td><?= $data->name_unit ?></td>
                                <td class="text-right"><?= indo_currency($data->price) ?></td>
                                <td class="text-right"><?= $data->stock ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info" style="margin-left: 20px;" id="select" data-id="<?= $data->id_item ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?>" data-unit="<?= $data->name_unit ?>" data-stock="<?= $data->stock ?>">
                                        <i class="fa fa-check">Select</i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_item = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var name_unit = $(this).data('unit');
            var stock = $(this).data('stock');

            $('#id_item').val(id_item);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#name_unit').val(name_unit);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');

        })
    })
</script>