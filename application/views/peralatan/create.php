<div class="panel panel-default">
    <form class="form-horizontal" method="post">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group <?php echo form_error('name') != "" ? "has-error" : "" ?>">
                <label for="name" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" id="name" name="name" placeholder="Nama" value="<?php echo $this->input->post('name') ?>">
                    <span class="help-block"><?php echo form_error('name'); ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('desc') != "" ? "has-error" : "" ?>">
                <label for="desc" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="desc" name="desc" placeholder="Deskripsi"><?php echo $this->input->post('desc') ?></textarea>
                    <span class="help-block"><?php echo form_error('desc'); ?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module)?>">Kembali</a>
            <button class="btn btn-primary pull-right" name="create" value="ok">Simpan</button>
        </div>
    </form>
</div>