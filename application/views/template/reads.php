<?php
$number = 1 + (($pagination['page'] - 1) * $this->config->item('page_limit'));
//echo $this->db->last_query();
?>
<form method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if (isset($config['filter']) | isset($config['search'])) { ?>
                <div class="row">
                    <?php if (isset($config['search'])) { ?>
                        <div class="col-sm-3 m-b-10">
                            <input class="form-control" name="search" placeholder="Cari" value="<?php echo $this->input->post('search') ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($config['filter'])) { ?>
                        <?php foreach ($config['filter'] as $f) { ?>
                            <div class="col-sm-3 m-b-10">
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
                    <?php } ?>
                    <div class="col">
                        <button name="cari" value="ok" class="btn btn-primary fa fa-search" title="Cari Data"> Cari</button>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-2">
                    <small class="label label-info">Total data: <?php echo $dataCount ?></small>
                </div>
                <div class="col-sm-10">
                    <?php if (isset($config['peta'])) { ?>
                        <a class="btn btn-primary fa fa-map pull-right" title="Lihat Peta" href="<?php echo site_url($module . '/peta'); ?>"> Peta</a>
                    <?php } ?>
                    <?php if (in_array('create', $config['crud'])) { ?>
                        <a class="btn btn-primary fa fa-plus pull-right" href="<?php echo site_url($module . '/create'); ?>" title="Tambah Data"> Tambah</a>
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
                        <?php if (in_array('read', $config['crud']) | in_array('edit', $config['crud']) | in_array('delete', $config['crud'])) { ?>
                            <th class="text-center fit-width">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><?php echo $number++ ?></td>
                            <?php foreach ($config['column'] as $c) { ?>
                                <td><?php echo $d[$c['title']] ?></td>
                            <?php } ?>
                            <?php if (in_array('read', $config['crud']) | in_array('edit', $config['crud']) | in_array('delete', $config['crud'])) { ?>
                                <td class="pull-right">
                                    <?php if (in_array('read', $config['crud'])) { ?>
                                        <button name="read" value="<?php echo $d['id'] ?>" class="btn btn-primary fa fa-search" title="Lihat Detail"> Lihat</button>
                                    <?php } ?>
                                    <?php if (in_array('update', $config['crud'])) { ?>
                                        <button name="edit" value="<?php echo $d['id'] ?>" class="btn btn-primary fa fa-edit" title="Edit Data"> Ubah</button>
                                    <?php } ?>
                                    <?php if (in_array('delete', $config['crud'])) { ?>                                    
                                        <button name="initDelete" value="<?php echo $d['id'] ?>" class="btn btn-danger fa fa-trash" title="Hapus Data"> Hapus</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <?php $this->load->view('template/pagination') ?>
        </div>
    </div>
</form>