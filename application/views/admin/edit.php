<div class="panel">
    <div class="panel-body">
        <form class="form-horizontal" method="post">
            <input name="id" value="<?php echo $data['id'] ?>" hidden="">
            <div class="form-group <?php echo form_error('fullName') != "" ? "has-error" : "" ?>">
                <label for="fullName" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input class="form-control" name="fullName" placeholder="Nama Lengkap" value="<?php echo $data['full_name'] ?>">
                    <span class="help-block"><?php echo form_error('fullName'); ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('username') != "" ? "has-error" : "" ?>">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input class="form-control" name="nama" placeholder="Username" value="<?php echo $data['nama'] ?>">
                    <span class="help-block"><?php echo form_error('username'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type" id="type">
                        <?php foreach ($roles as $r) { ?>
                            <option value="<?php echo $r['id'] ?>" <?php echo $data['type'] == $r['nama'] ? 'selected' : '' ?>><?php echo $r['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group <?php echo form_error('email') != "" ? "has-error" : "" ?>">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
                    <span class="help-block"><?php echo form_error('email'); ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('noHP') != "" ? "has-error" : "" ?>">
                <label for="noHP" class="col-sm-2 control-label">no HP</label>
                <div class="col-sm-10">
                    <input class="form-control" name="noHP" placeholder="noHP" value="<?php echo $data['no_hp'] ?>">
                    <span class="help-block"><?php echo form_error('noHP'); ?></span>
                </div>
            </div>
            <a href="<?php echo site_url($module) ?>" class="btn btn-primary">Kembali</a>
            <button type="submit" name="update" value="ok" class="btn btn-primary pull-right">Simpan</button>
        </form>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <form class="form-horizontal" method="post">
            <input name="id" value="<?php echo $data['id'] ?>" hidden="">
            <div class="form-group <?php echo form_error('newPass') != "" ? "has-error" : "" ?>">
                <label for="pass" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" id="pass" name="newPass" placeholder="Password">
                    <span class="help-block"><?php echo form_error('newPass'); ?></span>
                </div>
            </div>
            <div class="form-group <?php echo form_error('confirmPass') != "" ? "has-error" : "" ?>">
                <label for="passConfirm" class="col-sm-2 control-label">Ulangi Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" id="passConfirm" name="confirmPass" placeholder="Ulangi Password">
                    <span class="help-block"><?php echo form_error('confirmPass'); ?></span>
                </div>
            </div>
            <button type="submit" name="changePass" value="ok" class="btn btn-primary pull-right">Simpan</button>
        </form>
    </div>
</div>