<?php
//print_r($mod);
//print_r($this->input->post());
//print_r($access);
$crud = array('create', 'read', 'update', 'delete');
$icon = array('plus', 'search', 'edit', 'trash');
?>
<form method="post" name="f">
    <input name="set" value="ok" hidden="">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table">
                <thead>
                    <tr>
                        <th>Module</th>
                        <?php foreach ($userRole as $u) { ?>
                            <th><?php echo $u['nama'] ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mod as $mkey => $m) { ?>
                        <tr>
                            <td><?php echo $m['nama'] ?></td>
                            <?php foreach ($userRole as $ukey => $u) { ?>
                                <td>
                                    <?php foreach ($crud as $ckey => $c) { ?>
                                        <?php
                                        $btn = isset($access[$mkey][$ukey]['acc_' . $c]) ? 'primary' : 'danger';
                                        $val = isset($access[$mkey][$ukey]['acc_' . $c]) ? '0' : '1';
                                        ?>
                                        <button class="btn btn-<?php echo $btn . ' fa fa-' . $icon[$ckey] ?>" title="Create" name="<?php echo $c ?>" value="<?php echo $m['id'] . '_' . $u['id'] . '_' . $val ?>"></button>
                                    <?php } ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
