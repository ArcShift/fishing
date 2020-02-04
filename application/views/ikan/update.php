<?php
//print_r($data);
?>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://inhabitat.com/wp-content/blogs.dir/1/files/2016/01/blue-fin-tuna-in-the-ocean-889x592.jpg" width="100%"/>
                    <button class="btn btn-primary" id="gantiFoto" type="button">Ganti Foto</button>
                </div>
                <div class="col-sm-10">
                    <input class="form-control" id="id" name="id" hidden="" value="<?php echo $data['id'] ?>">
                    <div class="form-group <?php // echo form_error('nama') != "" ? "has-error" : ""   ?>">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $data['name'] ?>">
                            <span class="help-block"><?php // echo form_error('nama');     ?></span>
                        </div>
                    </div>
                    <div class="form-group <?php // echo form_error('keterangan') != "" ? "has-error" : ""   ?>">
                        <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $data['about_fish'] ?></textarea>
                            <span class="help-block"><?php // echo form_error('keterangan')   ?></span>
                        </div>
                    </div>
                </div>
                <input class="form-control" type="file" id="foto" name="foto" accept="image/*" hidden="">
            </div>
            <a href="<?php echo site_url($module) ?>" class="btn btn-primary">Kembali</a>
            <button type="submit" name="update" value="ok" class="btn btn-primary pull-right">Simpan</button>
        </div>
    </div>
</form>
<script>
    $("#gantiFoto").click(function () {
        $("#foto").click();
    });
</script>