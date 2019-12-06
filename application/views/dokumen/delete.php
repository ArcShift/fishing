<div class="panel panel-danger">
    <div class="panel-heading">
        <h1 class="panel-title">Anda yakin akan menghapus data ini?</h1>
    </div>
    <div class="panel-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>Judul</td>
                    <td><?php echo $data['title'] ?></td>
                </tr>
                <tr>
                    <td>File</td>
                    <td><?php echo $data['url'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <form method="post">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">KEMBALI</a>
            <button class="btn btn-danger pull-right" name="delete" value="<?php echo $data['id'] ?>">HAPUS</button>
        </form>
    </div>
</div>