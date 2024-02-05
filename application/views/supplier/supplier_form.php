<section class="content-header">
    <h1>
        Supplier
        <small>Supplier data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Supplier</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Supplier</h3>
            <div class="pull-right">
                <a href="<?= site_url('supplier'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= base_url('supplier/process') ?>" method="post">
                        <div class="form-group">
                            <label>Supplier Name<span style="color: #BA3131;">*</span></label>
                            <input type="hidden" name="id" value="<?= $row->id_supplier; ?>">
                            <input type="text" name="supplier_name" class="form-control" value="<?= $row->name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Phone<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="phone" class="form-control" value="<?= $row->phone; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Address<span style="color: #BA3131;">*</span></label>
                            <textarea name="address" class="form-control" required><?= $row->address; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?= $row->description; ?></textarea>
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
</section>