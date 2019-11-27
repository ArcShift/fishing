<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group <?php echo form_error('nama') != "" ? "has-error" : "" ?>">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $this->input->post('nama') ?>">
                    <span class="help-block"><?php echo form_error('nama'); ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('keterangan') != "" ? "has-error" : "" ?>">
                <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $this->input->post('keterangan') ?></textarea>
                    <span class="help-block"><?php echo form_error('keterangan') ?></span>
                </div>
            </div>  
            <div class="form-group <?php echo form_error('foto') != "" ? "has-error" : "" ?>">
                <label for="foto" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                    <span class="help-block"><?php echo form_error('foto') ?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?php echo site_url('ikan') ?>" class="btn btn-primary">Kembali</a>
            <button type="submit" name="create" value="ok" class="btn btn-primary pull-right">Simpan</button>
        </div>
    </div>
</form>