<?php
$login = $this->session->flashdata('login');
?>

<?php if ($login) : ?>
<section class="content-header">
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= $login ?>
  </div>
</section>
<?php endif; ?>

<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-medkit"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Items</span>
          <span class="info-box-number"><?= $this->fuct->count_item() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Suppliers</span>
          <span class="info-box-number"><?= $this->fuct->count_supplier() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Customers</span>
          <span class="info-box-number"><?= $this->fuct->count_customer() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-purple"><i class="ion ion-ios-paper"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Penjualan</span>
          <span class="info-box-number"><?= $this->fuct->count_sale() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Orders</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Item</th>
                  <th>Status</th>
                  <th>Popularity</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <a href="pages/examples/invoice.html">OR9842</a>
                  </td>
                  <td>Call of Duty IV</td>
                  <td>
                    <span class="label label-success">Shipped</span>
                  </td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                      90,80,90,-70,61,-83,63
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
          <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
    <!-- /.col -->

    <div class="col-md-6">
      <!-- USERS LIST -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Members</h3>

          <div class="box-tools pull-right">
            <span class="label label-danger">8 New Members</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            <li>
              <img src="<?= base_url('assets/') ?>dist/img/user1-128x128.jpg" alt="User Image" />
              <a class="users-list-name" href="#">Alexander Pierce</a>
              <span class="users-list-date">Today</span>
            </li>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>
    <!-- /.col -->
  </div>
</section>