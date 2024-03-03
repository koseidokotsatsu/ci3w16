<?php if ($this->session->flashdata('message1')) : ?>
<div class="container mt-3">
    <?= $this->session->flashdata('message1'); ?>
</div>
<?php endif; ?>
<div class="container">
    <h1 class="mt-5 mb-4">Profile Information</h1>
    <?= form_open('home/custedit'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="username" class="form-label"><strong>Username:</strong></label>
                <input type="hidden" name="id" id="id" class="form-control" value="<?= $cust->id_customer ?>" readonly>
                <input type="text" name="username" id="username" class="form-control" value="<?= $cust->username ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Password:</strong></label>
                <input type="password" name="password" id="password" class="form-control">
                <small><i>leave it empty if you aren't gonna change it</i></small>
                <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label"><strong>Name:</strong></label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?= set_value('customer_name', $cust->name) ?>">
                <?= form_error('customer_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label"><strong>Phone:</strong></label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?= set_value('phone', $cust->phone) ?>">
                <?= form_error('phone', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="address" class="form-label"><strong>Address:</strong></label>
                <textarea name="address" id="address" class="form-control"><?= set_value('address', $cust->address) ?></textarea>
                <?= form_error('address', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="pos_code" class="form-label"><strong>Pos Code:</strong></label>
                <input type="text" name="pos_code" id="pos_code" class="form-control" value="<?= set_value('pos_code', $cust->pos_code) ?>">
                <?= form_error('pos_code', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label"><strong>Gender:</strong></label>
                <select name="gender" id="gender" class="form-control">
                    <option value="L" <?= set_select('gender', 'L', $cust->gender == 'L'); ?>>Male</option>
                    <option value="P" <?= set_select('gender', 'P', $cust->gender == 'P'); ?>>Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>
<div class="container">
    <?php
    // Reverse the $sales array to display the newest data first
    $sales = array_reverse($sales);
    ?>
    <!-- Delivery History Section -->
    <h2 class="mt-5 mb-4">Order History</h2>
    <div class="row">
        <div class="col-md-12">
            <table id="deliveryTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Receiver</th>
                        <th>Status</th>
                        <th>Resi</th>
                        <th>Cash</th>
                        <th>Accepted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach ($sales as $data) { ?>
                    <?php if ($count < 3) { ?>
                    <tr>
                        <td><?= $data->invoice ?></td>
                        <td><?= $data->receiver ?></td>
                        <td>
                            <?php if ($data->accepted == 'no') { ?>
                            <?= empty($data->expedition) ? 'On Process' : 'On Delivery' ?>
                            <?php } else {
                                        echo "Done";
                                    } ?>
                        </td>
                        <td><?php if ($data->no_resi) { ?>
                            <?= $data->no_resi ?>
                            <?php } else {
                                        echo 'Belum Dikirim';
                                    } ?>
                        </td>
                        <td>
                            <?php if ($data->total_final != '0') { ?>
                            Rp.<?= number_format($data->total_final) ?>
                            <?php } else {
                                        echo 'Belum Dikirim';
                                    } ?>
                        </td>
                        <td><?= $data->accepted == 'yes' ? 'Accepted' : 'Pending' ?></td>
                        <td>
                            <!-- Detail Action Button -->
                            <a href="<?= base_url('home/detail_receipt/' . $data->id_sale) ?>" class="btn btn-info btn-sm detail-btn">Detail</a>
                        </td>
                    </tr>
                    <?php } else { ?>
                    <tr class="additional-row" style="display: none;">
                        <td><?= $data->invoice ?></td>
                        <td><?= $data->receiver ?></td>
                        <td>
                            <?php if ($data->accepted == 'no') { ?>
                            <?= empty($data->expedition) ? 'On Process' : 'On Delivery' ?>
                            <?php } else {
                                        echo "Done";
                                    } ?>
                        </td>
                        <td><?php if ($data->no_resi) { ?>
                            <?= $data->no_resi ?>
                            <?php } else {
                                        echo 'Belum Dikirim';
                                    } ?>
                        </td>
                        <td>
                            <?php if ($data->total_final != '0') { ?>
                            Rp.<?= number_format($data->total_final) ?>
                            <?php } else {
                                        echo 'Belum Dikirim';
                                    } ?>
                        </td>
                        <td><?= $data->accepted == 'yes' ? 'Accepted' : 'Pending' ?></td>
                        <td>
                            <!-- Detail Action Button for Additional Rows -->
                            <a href="<?= base_url('home/detail_receipt/' . $data->id_sale) ?>" class="btn btn-info btn-sm detail-btn">Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php $count++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <?php if ($count > 3) { ?>
            <button id="showMoreBtn" class="btn btn-primary">Show More</button>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    document.getElementById('showMoreBtn').addEventListener('click', function() {
        var additionalRows = document.querySelectorAll('.additional-row');
        additionalRows.forEach(function(row) {
            row.style.display = 'table-row';
        });
        document.getElementById('showMoreBtn').style.display = 'none';
    });
</script>