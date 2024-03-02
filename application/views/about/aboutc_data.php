<section class="content-header">
    <h1>
        About Content
        <small>About Content Data</small>
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
            <h3 class="box-title">Data About Content</h3>
            <div class="pull-right">
                <a href="<?= site_url('aboutc/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Thumbnail </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?= $no++ ?></td>
                        <td><?= $data->title ?></td>
                        <td><?= $data->description ?></td>
                        <td><?= $data->link ?></td>
                        <?php if ($data->img != null) { ?>
                        <td><img src="<?= base_url('assets/frontend/images/about_content/') . $data->img ?>" style="width: 100px;"></td>
                        <?php } else {
                                echo `<i>N/A</i>`;
                            } ?>
                        <td class="text-center" width="160px">
                            <a href="<?= site_url('aboutc/edit/' . $data->id_abtent) ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="<?= site_url('aboutc/del/' . $data->id_abtent) ?>" class="btn btn-danger btn-xs">
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