<section class="content-header">
    <h1>
        About Content
        <small>About Content data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">About Content</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> About Content</h3>
            <div class="pull-right">
                <a href="<?= site_url('aboutc'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('aboutc/process') ?>
                    <div class="form-group">
                        <label>title<span style="color: #BA3131;">*</span></label>
                        <input type="hidden" name="id" value="<?= $row->id_abtent; ?>">
                        <input type="text" name="title" class="form-control" value="<?= $row->title; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description<span style="color: #BA3131;">*</span></label>
                        <textarea name="description" class="form-control" required><?= $row->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link<span style="color: #BA3131;">*</span></label>
                        <input type="text" name="link" class="form-control" value="<?= $row->link; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <?php if ($page == 'edit') {
                            if ($row->img != null) { ?>
                        <div>
                            <img src="<?= base_url('assets/frontend/images/about_content/' . $row->img) ?>" style="width: 80%; margin-bottom:1%;">
                        </div>
                        <?php }
                        } ?>
                        <input type="file" name="img" class="form-control ">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>