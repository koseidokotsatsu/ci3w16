<section class="content-header">
    <h1>
        Struk
        <small>Data Sale</small>
    </h1>
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
                    <th>No Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jam Teransaksi</th>
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
                        <td><?= $data->date_tf ?></td>
                        <td><?= $data->hour_tf ?></td>
                        <td>
                            <?php
                                echo anchor(site_url('sale/receipt_detail/' . $data->id_sale), '<i class="fa fa-eye"></i>&nbsp;&nbsp;Detail', array('title' => 'edit', 'class' => 'btn btn-sm btn-info'));
                                echo '&nbsp';
                                echo anchor(site_url('receipt/hapus/' . $data->id_sale), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-sm btn-danger "');
                                ?>
                        </td>
                    </tr>
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