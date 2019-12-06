<?php
echo $this->session->flashdata('id');
print_r($this->input->post());
?>
<div class="panel panel-default">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group <?php // echo form_error('judul') != "" ? "has-error" : ""   ?>">
                <label for="judul" class="col-sm-2 control-label">Judul</label>
                <div class="col-sm-10">
                    <input class="form-control" id="judul" name="judul" placeholder="Judul" value="<?php echo $this->input->post('judul') ?>">
                    <span class="help-block"><?php // echo form_error('judul');   ?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?php echo site_url($module) ?>" class="btn btn-primary">Kembali</a>
            <button type="submit" name="create" value="ok" class="btn btn-primary pull-right">Simpan</button>
        </div>
    </form>
</div>
<div class="panel panel-default">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group <?php // echo form_error('dokumen') != "" ? "has-error" : ""   ?>">
                <label for="dokumen" class="col-sm-2 control-label">File</label>
                <div class="col-sm-10">
                    <input class="form-control" id="dokumen" name="dokumen" type="file" placeholder="File">
                    <span class="help-block"><?php // echo form_error('dokumen');   ?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" name="create" value="ok" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>



