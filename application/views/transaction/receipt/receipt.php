<section class="content-header">
    <h1>
        Struk
        <small>Data Sale</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Data Sale</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class='box-header  with-border'>
            <h3 class='box-title'>Data Sale</h3>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo form_open('receipt', array('role' => "form", 'id' => "myForm", 'data-toggle' => "validator")); ?>
                <div class="col-md-3">
                    <div class="input-daterange">
                        <div class="form-group">
                            <label for="start_date" class="control-label">Start Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="start_date" id="start_date" data-error="Start Date Must be Filled" required />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-daterange">
                        <div class="form-group">
                            <label for="end_date" class="control-label">End Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="end_date" id="end_date" data-error="End Date Must be Filled" required />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="padding-top:25px;">
                    <button type="submit" name="search" id="search" value="Search" class="btn btn-info"> Search</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="box-body table-resoponsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaction</th>
                    <th>Customer</th>
                    <th>Delivery</th>
                    <th>Date Transaction</th>
                    <th>Hour Transaction</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($receipt as $data) { ?>
                <tr>
                    <td style="width:5%;"><?= $no++ ?></td>
                    <td><?= $data->invoice ?></td>
                    <td><?= $data->customer_name ?></td>
                    <td>
                        <?php if ($data->delivery == 'yes') { ?>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#deliveryModal<?= $data->id_sale ?>">Yes</button>
                        <?php if ($data->accepted != 'yes') { ?>
                        <i class="fa fa-info-circle" style="color: #EC3939;" data-toggle="tooltip" title="Not Accepted"></i>
                        <?php } ?>
                        <?php } else { ?>
                        <button type="button" class="btn btn-danger btn-sm" disabled>No</button>
                        <?php } ?>
                    </td>
                    <td><?= $data->date_tf ?></td>
                    <td><?= $data->hour_tf ?></td>
                    <td>
                        <?php
                            echo anchor(site_url('sale/receipt_detail/' . $data->id_sale), '<i class="fa fa-eye"></i>&nbsp;&nbsp;Detail', array('title' => 'edit', 'class' => 'btn btn-primary btn-xs'));
                            echo '&nbsp';
                            echo anchor(site_url('receipt/hapus/' . $data->id_sale), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-danger btn-xs "');
                            ?>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="deliveryModal<?= $data->id_sale ?>" tabindex="-1" role="dialog" aria-labelledby="deliveryModalLabel<?= $data->id_sale ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deliveryModalLabel<?= $data->id_sale ?>"><strong><i>Delivery Status</i></strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p><strong>No. Resi</strong></p>
                                        <p><strong>Expedition</strong></p>
                                        <p><strong>Address</strong></p>
                                        <p><strong>Pos Code</strong></p>
                                        <p><strong>Ongkos</strong></p>
                                        <p><strong>Accepted</strong></p>
                                    </div>
                                    <div class="col-md-10">
                                        <p>:&nbsp;&nbsp;<?= $data->no_resi ?></p>
                                        <p>:&nbsp;&nbsp;<?= $data->expedition ?></p>
                                        <p>:&nbsp;&nbsp;<?= $data->address ?></p>
                                        <p>:&nbsp;&nbsp;<?= $data->pos_code ?></p>
                                        <p>:&nbsp;&nbsp;Rp.<?= number_format($data->ongkos) ?></p>
                                        <?php if ($data->accepted == 'yes') { ?>
                                        <p>:&nbsp;&nbsp;<span class="label label-success"><?= $data->accepted ?></span></p>
                                        <?php } else { ?>
                                        <p>:&nbsp;&nbsp;<span class="label label-danger"><?= $data->accepted ?></span></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- Add more delivery status information here -->
                            </div>
                            <div class="modal-footer">
                                <a href="<?= site_url('receipt/edit/' . $data->id_sale) ?>" class="btn btn-primary">Edit</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                } ?>
            </tbody>
        </table>
    </div>
    </div>
</section>
<script src="<?= base_url() ?>assets/app/js/alert.js"></script>
<script>
    $(document).ready(function() {
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#myTable').DataTable({
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, ],
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'LAPORAN PENJUALAN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
                {
                    extend: 'copyHtml5',
                    title: 'LAPORAN PENJUALAN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
                {
                    extend: 'pdfHtml5',
                    oriented: 'portrait',
                    pageSize: 'legal',
                    title: 'LAPORAN PENJUALAN',
                    download: 'open',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                    },
                },
                {
                    extend: 'print',
                    oriented: 'portrait',
                    pageSize: 'A4',
                    title: 'LAPORAN PENJUALAN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
            ],
        });
    });
</script>