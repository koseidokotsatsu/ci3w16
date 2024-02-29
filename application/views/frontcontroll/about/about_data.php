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
            <h3 class="box-title">Data About</h3>
            <div class="pull-right">
                <a href="<?= site_url('about/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="box-body table-resoponsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>About</th>
                        <th>About Shorter</th>
                        <th>Content Title</th>
                        <th>Content Description</th>
                        <th>Content Image</th>
                        <th>Content Link</th>
                        <th>Feature Title</th>
                        <th>Feature Desc</th>
                        <th>Feature Icon</th>
                        <th>Team Name</th>
                        <th>Team Role</th>
                        <th>Team Description</th>
                        <th>Team Img</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->about ?></td>
                            <td><?= $data->about_shorter ?></td>
                            <td><?= $data->content_title ?></td>
                            <td><?= $data->content_desc ?></td>
                            <td><?= $data->content_img ?></td>
                            <td><?= $data->content_link ?></td>
                            <td><?= $data->feature_title ?></td>
                            <td><?= $data->feature_desc ?></td>
                            <td><?= $data->feature_ico ?></td>
                            <td><?= $data->team_name ?></td>
                            <td><?= $data->team_role ?></td>
                            <td><?= $data->team_desc ?></td>
                            <td><?= $data->team_img ?></td>
                            <td><?= $data->created_at ?></td>
                            <td><?= $data->updated_at ?? '<span class="label label-danger">N/A<span>' ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('about/edit/' . $data->id_about) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="<?= site_url('about/del/' . $data->id_about) ?>" class="btn btn-danger btn-xs">
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