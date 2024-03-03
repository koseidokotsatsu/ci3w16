<style>
    @media print {
        .dontprint {
            display: none;
        }

        #wrapper {
            max-width: 480px;
            width: 100%;
            min-width: 250px;
            margin: 0 auto;
        }
    }
</style>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div id="print-area" class="box-body">
                        <div id="wrapper">
                            <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
                                <div id="receipt-data">
                                    <div>
                                        <div style="text-align:center;">
                                            <img src="<?= base_url(); ?>assets/img/logo/ngana.png" style="max-width:150px;">
                                            <p style="text-align:center;"><strong>OurPharmacy</strong><br>Jl. Kasihan</p>
                                            <p></p>
                                        </div>
                                        <p>
                                            <span style="float: left; width: 50%;">
                                                Tanggal/Jam: <?= $date . '/' . $hour; ?><br>
                                                Nomor Transaksi: <?= $invoice; ?><br>
                                                Nama Penerima: <?= $receiver; ?> <br>
                                                Note: <?= $note; ?> <br><br>
                                            </span>
                                            <span style="float: right; width: 50%;">
                                                <?php
                                                $accs = ($acc == 'yes') ? 'Sudah' : 'Belum';
                                                ?>
                                                Diterima: <?= $accs; ?> <br>
                                                Pengiriman: <?= $expedition; ?> <br>
                                                Nomor Resi: <?= $resi; ?> <br>
                                            </span>
                                        </p>
                                        <p hidden>
                                            <?= $id_cust; ?> <br>
                                        </p>
                                        <div style="clear:both;"></div>
                                        <table class="table table-striped table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Nama Barang</th>
                                                    <th class="text-center" style="width: 12%; border-bottom: 2px solid #ddd;">Jumlah</th>
                                                    <th class="text-center" style="width: 24%; border-bottom: 2px solid #ddd;">Harga</th>
                                                    <th class="text-center" style="width: 26%; border-bottom: 2px solid #ddd;">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $row) { ?>
                                                <tr>
                                                    <td><?= $row->name; ?></td>
                                                    <td style="text-align:center;"><?= $row->qty; ?></td>
                                                    <td class="text-center">Rp.<?= number_format($row->price); ?></td>
                                                    <td class="text-right">Rp.<?= number_format($row->sub_total); ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">Subtotal</th>
                                                    <th colspan="2" class="text-right">Rp.<?= number_format($total_early); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Ongkos</th>
                                                    <th colspan="2" class="text-right">Rp.<?= number_format($ongkos); ?></th>
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
                                                    <td class="text-right">Diterima :</td>
                                                    <td><?= $accs; ?></td>
                                                    <td class="text-right">Uang yang diberikan :</td>
                                                    <td>Rp.<?= number_format($cash); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="well well-sm" style="margin-top:10px;">
                                            <div style="text-align: center;">Terimakasih Sudah Belanja :<?= ')' ?></div>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                            <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="dontprint">
                                <span class="pull-right col-xs-12">
                                    <button onclick="printDiv('print-area')" class="btn btn-block btn-primary">Print</button>
                                </span>
                                <span class="col-xs-12">
                                    <a class="btn btn-block btn-info" href="<?= base_url('home/user') ?>">Kembali</a>
                                </span>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media print {
        #buttons {
            display: none;
        }

        #a {
            display: none;
        }
    }
</style>

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