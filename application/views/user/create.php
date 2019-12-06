<div class="panel">
    <div class="panel-body">
        <form class="form-horizontal" method="post">
            <div class="form-group <?php echo form_error('username') != "" ? "has-error" : "" ?>">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $this->input->post('username') ?>">
                    <span class="help-block"><?php echo form_error('username'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type" id="type">
                        <?php foreach ($roles as $r) { ?>
                            <option value="<?php echo $r['id'] ?>" <?php echo $this->input->post('type')==$r['id']?'selected':'' ?>><?php echo $r['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group <?php echo form_error('pass') != "" ? "has-error" : "" ?>">
                <label for="pass" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" id="pass" name="pass" placeholder="Password">
                    <span class="help-block"><?php echo form_error('pass'); ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('passConfirm') != "" ? "has-error" : "" ?>">
                <label for="passConfirm" class="col-sm-2 control-label">Ulangi Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" id="passConfirm" name="passConfirm" placeholder="Ulangi Password">
                    <span class="help-block"><?php echo form_error('passConfirm'); ?></span>
                </div>
            </div>
            <a href="<?php echo site_url($module) ?>" class="btn btn-primary">Kembali</a>
            <button type="submit" name="create" value="ok" class="btn btn-primary pull-right">Simpan</button>
        </form>
    </div>
</div>