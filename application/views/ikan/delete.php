<div class="panel panel-danger">
    <div class="panel-heading">
        <h1 class="panel-title">Anda yakin akan menghapus data ini?</h1>
    </div>
    <div class="panel-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>Username</td>
                    <td><?php echo $data['name']?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><?php echo $data['about_fish']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <form method="post">
            <a class="btn btn-primary" href="<?php echo site_url('admin') ?>">KEMBALI</a>
            <button class="btn btn-danger pull-right" name="delete" value="<?php echo $data['id']?>">HAPUS</button>
        </form>
    </div>
</div>

