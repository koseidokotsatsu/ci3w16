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
            <h3 class="box-title">Add Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>">
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label>Confirm Password *</label>
                            <input type="password" name="passconf" class="form-control" value="<?= set_value('passconf'); ?>">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <option value="">- Choose -</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Cashier</option>
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