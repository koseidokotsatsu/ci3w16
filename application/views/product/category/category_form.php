<section class="content-header">
    <h1>
        Category
        <small>Category data</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Category</h3>
            <div class="pull-right">
                <a href="<?= site_url('category'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= base_url('category/process') ?>" method="post">
                        <div class="form-group">
                            <label>Category Name<span style="color: #BA3131;">*</span></label>
                            <input type="hidden" name="id" value="<?= $row->id_category; ?>">
                            <input type="text" name="category_name" class="form-control" value="<?= $row->name; ?>" required>
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