<?php
//title, sort_desc, full_desc, url_img
$input = array(
    array("name" => "judul", "label" => "Judul", ),
    array("name" => "sortDesc", "label" => "Deskripsi Singkat"),
//    array("name" => "fullDesc", "label" => "Deskripsi Lengkap", "type" => "text"),
//    array("name" => "img", "label" => "Foto", "type"=>"file"),
//        array("name"=>"","label"=>""),
//        array("name"=>"","label"=>""),
);
print_r($this->input->post());
?>
<div class="panel panel-default">
    <form class="form-horizontal" method="post">
        <div class="panel-heading"></div>
        <input name="user" value="<?php echo $this->session->userdata('userId'); ?>" hidden=""/>
        <div class="panel-body">
            <?php foreach ($input as $in) { ?>
                <div class="form-group <?php // echo form_error('username') != "" ? "has-error" : ""     ?>">
                    <label for="username" class="col-sm-2 control-label"><?php echo $in['label'] ?></label>
                    <div class="col-sm-10">
                        <input class="form-control" id="username" name="<?php echo $in['name'] ?>" placeholder="<?php echo $in['label'] ?>" value="<?php // echo $this->input->post('username')     ?>">
                        <span class="help-block"><?php // echo form_error('username');?></span>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group <?php // echo form_error('username') != "" ? "has-error" : ""     ?>">
                <label for="fullDesc" class="col-sm-2 control-label">Deskripsi Lengkap</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="fullDesc" name="fullDesc" placeholder="Deskripsi Lengkap"></textarea>
                    <span class="help-block"><?php // echo form_error('username');?></span>
                </div>
            </div>
            <div class="form-group <?php // echo form_error('username') != "" ? "has-error" : ""     ?>">
                <label for="foto" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" value="<?php // echo $this->input->post('username')     ?>">
                    <span class="help-block"><?php // echo form_error('username');?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module)?>">Batal</a>
            <button class="btn btn-primary pull-right" name="simpan" value="ok">Simpan</button>
        </div>
    </form>
</div>