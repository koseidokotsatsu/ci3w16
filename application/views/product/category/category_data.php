<section class="content-header">
    <h1>
        Category
        <small>Category data</small>
    </h1>
</section>

<!-- Main content -->
<section class="content col-lg-6">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Category</h3>
            <div class="pull-right">
                <a href="<?= site_url('category/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?= $no++ ?></td>
                        <td><?= $data->name ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?= site_url('category/edit/' . $data->id_category) ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="<?= site_url('category/del/' . $data->id_category) ?>" onclick="return confirm('Yakin ingin hapus data ini?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>