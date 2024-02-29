<section class="content-header">
    <h1>
        Customer
        <small>Customer data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customer</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Customer</h3>
            <div class="pull-right">
                <a href="<?= site_url('customer'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= base_url('customer/process') ?>" method="post">
                        <!-- Username input -->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="hidden" name="id" value="<?= $row->id_customer; ?>">
                            <input type="text" name="username" class="form-control" value="<?= $row->username; ?>">
                            <?php if ($this->session->flashdata('username_error')) : ?>
                            <div class="text-danger"><?= $this->session->flashdata('username_error'); ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Password input -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <?php if ($this->session->flashdata('password_error')) : ?>
                            <div class="text-danger"><?= $this->session->flashdata('password_error'); ?></div>
                            <?php endif; ?>
                            <span><i>leave it when you aren't gonna change it</i></span>
                        </div>
                        <div class="form-group">
                            <label>Customer Name<span style="color: #BA3131;">*</span></label>
                            <input type="text" name="customer_name" class="form-control" value="<?= $row->name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Gender<span style="color: #BA3131;">*</span></label>
                            <select name="gender" class="form-control">
                                <option value="">- Choose -</option>
                                <option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Male</option>
                                <option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>>Female</option>
                            </select>
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