<?php if ($this->session->flashdata('custedit')) : ?>
<div class="container mt-3">
    <?= $this->session->flashdata('custedit'); ?>
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
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label"><strong>Phone:</strong></label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?= set_value('phone', $cust->phone) ?>">
                <?= form_error('phone', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label"><strong>Address:</strong></label>
                <textarea name="address" id="address" class="form-control"><?= set_value('address', $cust->address) ?></textarea>
                <?= form_error('address', '<div class="text-danger">', '</div>'); ?>
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