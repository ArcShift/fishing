<div class="panel panel-default">
    <form class="form-horizontal">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Judul</td>
                        <td><?php echo $data['title'] ?></td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td><a class="btn btn-primary fa fa-download" title="Download" href="<?php echo base_url('upload/dokumen/') . $data['url'] ?>"></a> <?php echo $data['url'] ?></td>
                    </tr>
                    <tr>
                        <td>Date Create</td>
                        <td><?php echo $data['created_at'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="<?php echo site_url($module) ?>">Kembali</a>
        </div>
    </form>
</div>