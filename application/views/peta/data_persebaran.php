<div class="panel panel-default">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group <?php echo form_error('sumber') != "" ? "has-error" : ""  ?>">
                <label for="tanggal" class="col-sm-2 control-label">Sumber Data</label>
                <div class="col-sm-10">
                    <select class="form-control" id="sumber" name="sumber">
                        <option value="LAPAN">LAPAN</option>
                        <option value="ITS">ITS</option>
                    </select>
                    <!--<input class="form-control" type="" id="sumber" name="tanggal" value="<?php // echo $this->input->post('tanggal') ?>">-->
                    <span class="help-block"><?php echo form_error('tanggal');  ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('tanggal') != "" ? "has-error" : ""  ?>">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?php echo $this->input->post('tanggal') ?>">
                    <span class="help-block"><?php echo form_error('tanggal');  ?></span>
                </div>
            </div>
            <div class="form-group <?php // echo form_error('fullDesc') != "" ? "has-error" : ""  ?>">
                <label for="file" class="col-sm-2 control-label">File</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="file" name="file" accept=".json" value="<?php // echo $this->input->post('fullDesc')  ?>">
                    <span class="help-block"><?php // echo form_error('fullDesc');  ?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">Kembali</a>
            <button class="btn btn-primary pull-right" name="simpan" value="ok">Simpan</button>
        </div>
    </form>
</div>
