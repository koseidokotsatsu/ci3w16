<section class="content-header">
    <h1>
        Users
        <small>User data</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i>
                </a>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->level == 1 ? "Admin" : "Cashier" ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('user/edit/' . $data->id_user) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>&nbsp;Edit
                                </a>
                                <form action="<?= site_url('user/del') ?>" method="post">
                                    <input type="hidden" name="id_user" value="<?= $data->id_user ?>">
                                    <button class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>&nbsp;Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>