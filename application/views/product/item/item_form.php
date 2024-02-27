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
    <?php $this->view('error_msg'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('item/process') ?>
                    <div class="form-group">
                        <label>Barcode<span style="color: #BA3131;">*</span></label>
                        <input type="hidden" name="id" value="<?= $row->id_item; ?>">
                        <input type="text" name="barcode" class="form-control" value="<?= $row->barcode; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Product Name<span style="color: #BA3131;">*</span></label>
                        <input type="text" name="product_name" class="form-control" value="<?= $row->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>General Name<span style="color: #BA3131;">*</span></label>
                        <select name="general_name[]" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($general_name->result() as $key => $data) { ?>
                            <option value="<?= $data->id_general_name ?>" <?= $data->id_general_name == $row->id_general_name ? "selected" : null; ?>><?= $data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category<span style="color: #BA3131;">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="" <?= $row->id_category ?? "" == "" ? "selected" : null; ?>>-- Pilih --</option>
                            <?php foreach ($category->result() as $key => $data) { ?>
                            <option value="<?= $data->id_category ?>" <?= $data->id_category == $row->id_category ? "selected" : null; ?>><?= $data->name ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Type<span style="color: #BA3131;">*</span></label>
                        <select name="type" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($type->result() as $key => $data) { ?>
                            <option value="<?= $data->id_type ?>" <?= $data->id_type == $row->id_type ? "selected" : null; ?>><?= $data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Unit<span style="color: #BA3131;">*</span></label>
                        <?php echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group">
                        <label>Price<span style="color: #BA3131;">*</span></label>
                        <input type="number" name="price" class="form-control" value="<?= $row->price; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <?php if ($page == 'edit') {
                            if ($row->image != null) { ?>
                        <div>
                            <img src="<?= base_url('uploads/product/' . $row->image) ?>" style="width: 70%;">
                        </div>
                        <?php }
                        } ?>
                        <br>
                        <input type="file" name="image" class="form-control">
                        <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Save
                        </button>
                        <button type="Reset" class="btn btn-flat">
                            Reset
                        </button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>