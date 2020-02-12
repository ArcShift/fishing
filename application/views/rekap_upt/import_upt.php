<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Import Data</label>
                <div class="col-sm-10">
                    <input type="file" class="upload" name="upload_xls" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">Kembali</a>
            <button type="submit" class="btn btn-primary pull-right" name="create" value="ok">Simpan</button>
        </div>
    </div>
</form>
