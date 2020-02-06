<div class="panel panel-danger">
    <div class="panel-heading">
        <h1 class="panel-title">Anda yakin akan menghapus data ini?</h1>
    </div>
    <div class="panel-body">
        <table class="table">
            <tbody>
                <?php foreach ($config['field'] as $f) { ?>
                    <tr>
                        <td><?php echo ucfirst($f['title'])?></td>
                        <td><?php echo $data[$f['title']] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <form method="post">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">KEMBALI</a>
            <button class="btn btn-danger pull-right" name="delete" value="<?php echo $this->session->flashdata('id') ?>">HAPUS</button>
        </form>
    </div>
</div>

