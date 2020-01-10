<div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
        <form method="post">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stat as $key => $s) { ?>
                        <tr>
                            <td><?php echo $s['title'] ?></td>
                            <td><?php echo $s['total'] ?></td>
                            <td>
                                <?php if (!empty($s['total'])) { ?>
                                <button class="btn btn-danger fa fa-trash" name="hapus" value="<?php echo $key?>"></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
    <div class="panel-footer"></div>
</div>