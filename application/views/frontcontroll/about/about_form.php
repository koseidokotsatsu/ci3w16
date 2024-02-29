<section class="content-header">
    <h1>
        About
        <small>About data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">About</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> About</h3>
            <div class="pull-right">
                <a href="<?= site_url('about'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= base_url('about/process') ?>" method="post">
                        <div class="form-group">
                            <label>About<span style="color: #BA3131;">*</span></label>
                            <input type="hidden" name="id" value="<?= $row->id_about; ?>">
                            <textarea name="about" class="form-control"><?= $row->about; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>About Shorter<span style="color: #BA3131;">*</span></label>
                            <textarea name="about_shorter" class="form-control"><?= $row->about_shorter; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content Title<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="content_title" class="form-control" value="<?= $row->content_title; ?>">
                        </div>
                        <div class="form-group">
                            <label>Content Description<span style="color: #BA3131;">*</span></label>
                            <textarea name="content_desc" class="form-control"><?= $row->content_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content Image<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="content_img" class="form-control" value="<?= $row->content_img; ?>">
                        </div>
                        <div class="form-group">
                            <label>Content Link<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="content_link" class="form-control" value="<?= $row->content_link; ?>">
                        </div>
                        <div class="form-group">
                            <label>Feature Title<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="feature_title" class="form-control" value="<?= $row->feature_title; ?>">
                        </div>
                        <div class="form-group">
                            <label>Feature Description<span style="color: #BA3131;">*</span></label>
                            <textarea name="feature_desc" class="form-control"><?= $row->feature_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Feature Icon<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="feature_ico" class="form-control" value="<?= $row->feature_ico; ?>">
                        </div>
                        <div class="form-group">
                            <label>Team Name<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="team_name" class="form-control" value="<?= $row->team_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Team Role<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="team_role" class="form-control" value="<?= $row->team_role; ?>">
                        </div>
                        <div class="form-group">
                            <label>Team Description<span style="color: #BA3131;">*</span></label>
                            <textarea name="team_desc" class="form-control"><?= $row->team_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Team Image<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="team_img" class="form-control" value="<?= $row->team_img; ?>">
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