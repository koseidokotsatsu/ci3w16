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
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Delivery Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $receipt_count = count($receipt);
                $start_index = max(0, $receipt_count - 5); // Ensure start index doesn't go below 0

                // Get the last 10 elements of the $receipt array
                $recent_receipts = array_slice($receipt, $start_index, 5);

                foreach ($recent_receipts as $data) { ?>
                <tr>
                  <td>
                    <a href="<?= base_url('sale/receipt/') ?>"><?= $data->invoice ?></a>
                  </td>
                  <td><?= $data->customer_name ?></td>
                  <td>
                    <?php if ($data->delivery == 'yes') { ?>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#deliveryModal<?= $data->id_sale ?>">Yes</button>
                    <?php if ($data->accepted != 'yes') { ?>
                    <i class="fa fa-info-circle" style="color: #EC3939;" data-toggle="tooltip" title="Not Done"></i>
                    <?php } ?>
                    <?php } else { ?>
                    <button type="button" class="btn btn-danger btn-sm" disabled>No</button>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

        <div class="box-footer clearfix">
          <a href="<?= base_url('receipt') ?>" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
        </div>

        <!-- /.box-footer -->
      </div>
    </div>
    <!-- /.col -->

    <div class="col-md-6">
      <!-- USERS LIST -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Admin & Cashier</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            <?php
            $counter = 0; // Initialize counter variable
            foreach ($user as $data) {
              // Skip the admin user
              if ($data->username == 'admin') {
                continue;
              }

              // Increment the counter
              $counter++;

              // Break the loop if counter reaches 4
              if ($counter > 4) {
                break;
              }
              ?>
            <li>
              <img src="<?= base_url('assets/img/' . $data->img) ?>" style="width: 150px; height: 150px;" />
              <a class="users-list-name"><?= $data->name ?></a>
              <span class="users-list-date">
                <?= ($data->level == 1) ? 'Admin' : 'Cashier' ?>
              </span>
            </li>
            <?php } ?>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <?php if ($this->fuct->user_login()->level == 1) { ?>
        <div class="box-footer text-center">
          <a href="<?= base_url('user') ?>" class="uppercase">View All Users</a>
        </div>
        <?php } ?>
        <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>
    <!-- /.col -->
  </div>
</section>