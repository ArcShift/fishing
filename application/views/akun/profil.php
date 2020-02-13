<?php
echo validation_errors();
$d = $data;
if ($this->input->post('saveData')) {
    $in = $this->input->post();
}
?>
<div class="row">
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <div class="form-group <?php echo form_error('fullName') != "" ? "has-error" : "" ?>">
                        <label for="fullName" class="col-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="fullName" placeholder="Nama Lengkap" value="<?php echo isset($in) ? $in['fullName'] : $d['full_name'] ?>">
                            <span class="help-block"><?php echo form_error('fullName'); ?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('nama') != "" ? "has-error" : "" ?>">
                        <label for="nama" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="nama" name="nama" value="<?php echo isset($in) ? $in['nama'] : $d['nama'] ?>" placeholder="Nama">
                            <span class="help-block"><?php echo form_error('nama'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="type" value="<?php echo $d['type'] ?>" placeholder="Type" disabled="">
                        </div>  
                    </div>
                    <div class="form-group <?php echo form_error('email') != "" ? "has-error" : "" ?>">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="email" placeholder="Email" value="<?php echo isset($in) ? $in['email'] : $d['email'] ?>">
                            <span class="help-block"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('noHP') != "" ? "has-error" : "" ?>">
                        <label for="noHP" class="col-sm-3 control-label">no HP</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="noHP" placeholder="noHP" value="<?php echo isset($in) ? $in['noHP'] : $d['no_hp'] ?>">
                            <span class="help-block"><?php echo form_error('noHP'); ?></span>
                        </div>
                    </div>
                    <button type="submit" name="saveData" value="ok" class="btn btn-primary pull-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Ubah Password</h1>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <?php
                    $field = array(
                            ["f" => "pass", "l" => "Password Lama"],
                            ["f" => "newPass", "l" => "Password Baru"],
                            ["f" => "confirmPass", "l" => "Konfirmasi Password"]
                    );
                    ?>
                    <?php foreach ($field as $f) { ?>
                        <div class="form-group <?php echo form_error($f['f']) != "" ? "has-error" : "" ?>">
                            <?php echo '<label for="' . $f['f'] . '" class="control-label">' . $f['l'] . '</label>' ?>
                            <?php echo '<input type="password" class="form-control" id="' . $f['f'] . '" name="' . $f['f'] . '" placeholder="' . $f['l'] . '">' ?>
                            <span class="help-block"><?php echo form_error($f['f']); ?></span>
                        </div>
                    <?php } ?>
                    <button type="submit" name="changePass" value="Simpan" class="btn btn-primary pull-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>