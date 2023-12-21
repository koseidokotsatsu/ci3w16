<section class="content-header">
    <h1>
        Users
        <small>Add New User Data</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <?php if ($row->img != null) : ?>
                                <div class="existing-profile-image text-center" style="margin-bottom: 15px; margin-top: 15px;">
                                    <img src="<?= base_url('assets/img/' . $row->img); ?>" alt="Profile Image" class="img-thumbnail" style="border-radius: 50%;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="img" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" name="id_user" value="<?= $this->input->post('id_user') ?? $row->id_user; ?>">
                            <input type="text" name="name" class="form-control" value="<?= $this->input->post('name') ?? $row->name; ?>">
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $this->input->post('username') ?? $row->username; ?>" readonly>
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password</label>
                            <small>(leave it empty if you don't want to change it)</small>
                            <input type="password" name="password" class="form-control" value="<?= $this->input->post('password'); ?>">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="passconf" class="form-control" value="<?= $this->input->post('passconf'); ?>">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>Cashier</option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
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