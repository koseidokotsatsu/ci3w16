<style type="text/css" media="all">
    body {
        color: #000;
    }

    table,
    th,
    tr {
        text-align: center;
    }

    #wrapper {
        max-width: 650px;
        margin: 0 auto;
        padding-top: 20px;
    }

    .btn {
        margin-bottom: 5px;
    }

    .table {
        border-radius: 3px;
    }

    .table th {
        background: #f5f5f5;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
    }

    h3 {
        margin: 5px 0;
    }

    @media print {
        .no-print {
            display: none;
        }

        #wrapper {
            max-width: 480px;
            width: 100%;
            min-width: 250px;
            margin: 0 auto;
        }
    }

    tfoot tr th:first-child {
        text-align: right;
    }
</style>

<section class='content'>
    <?php if ($this->session->flashdata('message')) { ?>
        <div class="col-lg-12 alerts">
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4> <i class="icon fa fa-check"></i> Success</h4>
                <p><?= $this->session->flashdata('message'); ?></p>
            </div>
        </div>
    <?php } else { } ?>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>Receipt</h3>
                </div>
                <div id="print-area">
                    <div class="box-body">
                        <div id="wrapper">
                            <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
                                <div id="receipt-data">
                                    <div>
                                        <div style="text-align:center;">
                                            <img src="<?= base_url(); ?>assets/img/logo/ngana.png" style="max-width:150px;">
                                            <p style="text-align:center;"><strong>OurPharmacy</strong><br>jL. Kasihan</p>
                                            <p></p>
                                        </div>
                                        <p>
                                            Tanggal : <?= $date . ' ' . $hour; ?> <br>
                                            Nomor Transaksi : <?= $invoice; ?><br>
                                            Nama Pelanggan : <?= $customer; ?> <br>
                                        </p>
                                        <div style="clear:both;"></div>
                                        <table class="table table-striped table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Item name</th>
                                                    <th class="text-center" style="width: 12%; border-bottom: 2px solid #ddd;">QTY</th>
                                                    <th class="text-center" style="width: 24%; border-bottom: 2px solid #ddd;">Price</th>
                                                    <th class="text-center" style="width: 26%; border-bottom: 2px solid #ddd;">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $row) { ?>
                                                    <tr>
                                                        <td><?= $row->name; ?></td>
                                                        <td style="text-align:center;"><?= $row->stock; ?></td>
                                                        <td class="text-center">Rp.<?= $row->price; ?></td>
                                                        <td class="text-right">Rp.<?= number_format($row->sub_total); ?></td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">Subtotal</th>
                                                    <th colspan="2" class="text-right">Rp.<?= number_format($total_early); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Discount</th>
                                                    <th colspan="2" class="text-right">Rp.<?= number_format($discount); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Total</th>
                                                    <th colspan="2" class="text-right">Rp.<?= number_format($total_final); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <table class="table table-striped table-condensed" style="margin-top:10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">Cash :</td>
                                                    <td>Rp.<?= number_format($cash); ?></td>
                                                    <td class="text-right">Remain :</td>
                                                    <td>Rp.<?= number_format($remain); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="well well-sm" style="margin-top:10px;">
                                            <div style="text-align: center;">Terimakasih Sudah Belanja :)</div>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                            <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
                                <span class="pull-right col-xs-12">
                                    <button onclick="printDiv('print-area')" class="btn btn-block btn-primary">Print</button> </span>
                                <span class="col-xs-12">
                                    <a class="btn btn-block btn-warning" href="<?= base_url() ?>index.php/penjualan">Kembali ke Penjualan</a>
                                </span>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->
            </div><!-- /.modal -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->


<script type="text/javascript">
    function printDiv(divName) {
        let printContents = document.getElementById(divName).innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(true);
        setTimeout(function() {}, 1000);
    }
</script>