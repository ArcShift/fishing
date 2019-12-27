<?php
$number = 1 + (($pagination['page'] - 1) * $this->config->item('page_limit'));
?>
<form method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if (isset($config['filter'])) { ?>
                <div class="row">
                    <?php foreach ($config['filter'] as $f) { ?>
                        <div class="col-sm-5 m-b-10">
                            <?php if ($f['type'] == 'input') { ?>
                                <input class="form-control" name="<?php echo $f['title'] ?>" placeholder="<?php echo ucfirst($f['title']) ?>" value="<?php echo $this->input->post($f['title']) ?>">
                            <?php } else if ($f['type'] == 'select_query') { ?>
                                <select class="form-control" name="<?php echo $f['title'] ?>">
                                    <option value="">-- <?php echo ucfirst($f['title']) ?> --</option>
                                    <?php foreach ($f['result'] as $r) { ?>
                                        <option value="<?php echo $r['v'] ?>"><?php echo $r['v'] ?></option>
                                    <?php } ?>
                                </select>
                            <?php } else if ($f['type'] == 'array') { ?>
                                <select class="form-control" name="<?php echo $f['title'] ?>">
                                    <option value="">-- <?php echo ucfirst($f['title']) ?> --</option>
                                    <?php foreach ($f['data'] as $d) { ?>
                                        <option value="<?php echo $d ?>"><?php echo $d ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="col-sm-1">
                        <button name="cari" value="ok" class="btn btn-primary fa fa-search" title="Cari Data"></button>
                    </div>
                </div>
                <br/>
            <?php } ?>
            <div class="row">
                <div class="col-sm-2">
                    <small class="label label-info">Total data: <?php echo $dataCount ?></small>
                </div>
                <div class="col-sm-10">
                    <?php if (isset($config['peta'])) { ?>
                    <a class="btn btn-primary fa fa-map" title="Peta" href="<?php echo site_url($module . '/peta'); ?>"></a>
                    <?php } ?>
                    <?php if (in_array('create', $config['crud'])) { ?>
                        <a class="btn btn-primary fa fa-plus" href="<?php echo site_url($module . '/create'); ?>" title="Tambah Data"></a>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-10">
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <?php foreach ($config['column'] as $c) { ?>
                            <th><?php echo ucfirst($c['title']) ?><button class="fa fa-sort<?php if (isset($pagination['sort'])) echo $c['field'] == $pagination['sort'] ? '-down' : '' ?> fa-sort" name="sort" value="<?php echo $c['title'] ?>"></button></th>
                        <?php } ?>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><?php echo $number++ ?></td>
                            <?php foreach ($config['column'] as $c) { ?>
                                <td><?php echo $d[$c['title']] ?></td>
                            <?php } ?>
                            <td>
                                <?php if (in_array('read', $config['crud'])) { ?>
                                    <button name="read" value="<?php echo $d['id'] ?>" class="btn btn-primary fa fa-search" title="Lihat Detail"></button>
                                <?php } ?>
                                <?php if (in_array('update', $config['crud'])) { ?>
                                    <button name="edit" value="<?php echo $d['id'] ?>" class="btn btn-primary fa fa-edit" title="Edit Data"></button>
                                <?php } ?>
                                <?php if (in_array('delete', $config['crud'])) { ?>                                    
                                    <button name="initDelete" value="<?php echo $d['id'] ?>" class="btn btn-danger fa fa-trash" title="Hapus Data"></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <?php $this->load->view('template/pagination') ?>
        </div>
    </div>
</form>