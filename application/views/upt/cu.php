<?php
print_r($this->input->post());
$data = array();
?>
<div class="panel panel-default">
    <form class="form-horizontal" method="post">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <input name="id" value="" hidden=""/>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nama" name="nama" value="<?php echo isset($data['nama']) ? $data['nama'] : null; ?>">
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">Kembali</a>
            <button class="btn btn-primary pull-right" name="<?php echo $mode ?>" value="ok">Simpan</button>
        </div>
    </form>
</div>