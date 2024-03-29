<section class="content-header">
    <h1>
        Sale Delivery
        <small>Sale Delivery Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Sale Delivery</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Sale Delivery</h3>
            <div class="pull-right">
                <a href="<?= site_url('receipt'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= base_url('receipt/process') ?>" method="post">
                        <div class="form-group" hidden>
                            <label>Data</label>
                            <input type="text" name="id_sale" class="form-control" value="<?= $row->id_sale; ?>" readonly>
                            <input type="text" name="total_early" class="form-control" value="<?= $row->total_early; ?>" readonly>
                            <input type="text" name="discount" class="form-control" value="<?= $row->discount; ?>" readonly>
                            <input type="text" name="cash" class="form-control" value="<?= $row->cash; ?>" readonly>
                            <input type="text" name="remain" class="form-control" value="<?= $row->remain; ?>" readonly>
                            <input type="text" name="note" class="form-control" value="<?= $row->note; ?>" readonly>
                            <input type="date" name="date_tf" class="form-control" value="<?= $row->date_tf; ?>" readonly>
                            <input type="text" name="hour_tf" class="form-control" value="<?= $row->hour_tf; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Invoice</label>
                            <div class="input-group">
                                <input type="text" name="invoice" class="form-control" value="<?= $row->invoice; ?>" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#invoiceDetailModal">
                                        Details
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Expedition</label>
                            <select name="expedition" id="expedition" class="form-control">
                                <?php if (empty($row->expedition)) : ?>
                                <option value="" selected disabled>- Select Expedition -</option>
                                <?php endif; ?>
                                <option value="J&T" <?= ($row->expedition == 'J&T') ? 'selected' : ''; ?>>J&T</option>
                                <option value="JNE" <?= ($row->expedition == 'JNE') ? 'selected' : ''; ?>>JNE</option>
                                <option value="Sicepat" <?= ($row->expedition == 'Sicepat') ? 'selected' : ''; ?>>Sicepat</option>
                                <option value="AnterAja" <?= ($row->expedition == 'AnterAja') ? 'selected' : ''; ?>>AnterAja</option>
                                <!-- Add more options if needed -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Resi</label>
                            <input type="text" name="no_resi" id="no_resi" class="form-control" value="<?= $row->no_resi; ?>" <?= empty($row->expedition) ? 'disabled' : ''; ?>>
                        </div>
                        <div class="form-group">
                            <label>Ongkos</label>
                            <input type="text" name="ongkos" id="ongkos" class="form-control" value="<?= $row->ongkos; ?>">
                        </div>
                        <div class="form-group">
                            <label>Total Final</label>
                            <input type="text" name="total_final" id="total_final" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Accepted<span style="color: #BA3131;">*</span></label>
                            <select name="accepted" class="form-control" required>
                                <?php if (empty($row->accepted)) : ?>
                                <option value="" selected disabled>- Choose -</option>
                                <?php endif; ?>
                                <option value="yes" <?= ($row->accepted == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?= ($row->accepted == 'no') ? 'selected' : ''; ?>>No</option>
                                <!-- Add more options if needed -->
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
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
    <!-- Modal -->
    <div class="modal fade" id="invoiceDetailModal" tabindex="-1" role="dialog" aria-labelledby="invoiceDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="invoiceDetailModalLabel"><b><i>Invoice Details</i></b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="customerName">Customer Name:</label>
                        <input type="text" id="customerName" class="form-control" value="<?= $row->customer_name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="receiver">Receiver:</label>
                        <input type="text" id="receiver" class="form-control" value="<?= $row->receiver; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea id="address" class="form-control" rows="3" readonly><?= $row->address; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="posCode">POS Code:</label>
                        <input type="text" id="posCode" class="form-control" value="<?= $row->pos_code; ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var expeditionSelect = document.getElementById('expedition');
        var noResiInput = document.getElementById('no_resi');
        var ongkosInput = document.getElementById('ongkos');
        var acceptedSelect = document.querySelector('select[name="accepted"]');
        var cashInput = document.querySelector('input[name="cash"]');
        var totalFinalInput = document.getElementById('total_final');

        expeditionSelect.addEventListener('change', function() {
            if (expeditionSelect.value !== '') {
                noResiInput.removeAttribute('disabled');
                noResiInput.focus();
                ongkosInput.removeAttribute('disabled');
                acceptedSelect.removeAttribute('disabled');
            } else {
                noResiInput.value = '';
                noResiInput.setAttribute('disabled', 'disabled');
                ongkosInput.value = '';
                ongkosInput.setAttribute('disabled', 'disabled');
                acceptedSelect.value = '';
                acceptedSelect.setAttribute('disabled', 'disabled');
            }
        });

        // Initialize on page load
        if (expeditionSelect.value === '') {
            noResiInput.setAttribute('disabled', 'disabled');
            ongkosInput.setAttribute('disabled', 'disabled');
            acceptedSelect.setAttribute('disabled', 'disabled');
        }

        // Fill cash input with total_final when 'Yes' is selected in accepted
        acceptedSelect.addEventListener('change', function() {
            if (acceptedSelect.value === 'yes') {
                cashInput.value = totalFinalInput.value;
            } else {
                cashInput.value = ''; // Reset cash input when 'No' or nothing is selected
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var ongkosInput = document.getElementById('ongkos');
        var totalEarlyInput = document.querySelector('input[name="total_early"]');
        var totalFinalInput = document.getElementById('total_final');

        // Calculate total_final when ongkos or total_early changes
        function calculateTotalFinal() {
            var ongkos = parseFloat(ongkosInput.value) || 0;
            var totalEarly = parseFloat(totalEarlyInput.value) || 0;
            var totalFinal = ongkos + totalEarly;
            totalFinalInput.value = totalFinal; // Display without currency format
        }

        ongkosInput.addEventListener('input', calculateTotalFinal);
        totalEarlyInput.addEventListener('input', calculateTotalFinal);

        // Initial calculation
        calculateTotalFinal();
    });
</script>