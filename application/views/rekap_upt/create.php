<?php
//print_r($this->input->post());
?>
<div style="margin-bottom: 5px;">
<a href="<?php echo site_url($module.'/import_upt'); ?>" class="btn btn-primary">Import Data</a>
</div>
<form class="form-horizontal" method="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $this->input->post('tanggal') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_kapal" class="col-sm-2 control-label">Nama Kapal</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nama_kapal" name="nama_kapal" placeholder="Nama Kapal" value="<?php echo $this->input->post('nama_kapal') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_alat_tangkap" class="col-sm-2 control-label">Jenis Alat Tangkap</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jenis_alat_tangkap" name="jenis_alat_tangkap">
                        <option>--</option>
                        <?php foreach ($alat as $a) { ?>
                        <option value="<?php echo $a['id'] ?>" <?php echo $a['id']==$this->input->post('jenis_alat_tangkap')?'selected':'' ?>><?php echo $a['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kapal" class="col-sm-2 control-label">Jenis Kapal</label>
                <div class="col-sm-10">
                    <input class="form-control" id="jenis_kapal" name="jenis_kapal" placeholder="Jenis Kapal" value="<?php echo $this->input->post('jenis_kapal') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_ikan" class="col-sm-2 control-label">Jenis Ikan</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jenis_ikan" name="jenis_ikan">
                        <option>--</option>
                        <?php foreach ($ikan as $a) { ?>
                            <option value="<?php echo $a['id'] ?>" <?php echo $a['id']==$this->input->post('jenis_ikan')?'selected':'' ?>><?php echo $a['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="volume" class="col-sm-2 control-label">Volume</label>
                <div class="col-sm-10">
                    <input class="form-control" id="volume" name="volume" placeholder="Volume (Kg)" value="<?php echo $this->input->post('volume') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="harga_lelang" class="col-sm-2 control-label">Harga Lelang</label>
                <div class="col-sm-10">
                    <input class="form-control" id="harga_lelang" name="harga_lelang" placeholder="Harga Lelang (Rp)" value="<?php echo $this->input->post('harga_lelang') ?>">
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">Kembali</a>
            <button class="btn btn-primary pull-right" name="create" value="ok">Simpan</button>
        </div>
    </div>
</form>
