<?php
//print_r($this->input->post());
?>
<div class="panel panel-default">
    <form class="form-horizontal" method="post">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <?php foreach ($input as $in) { ?>
                <div class="form-group <?php // echo form_error('username') != "" ? "has-error" : ""         ?>">
                    <label for="<?php echo $in['id'] ?>" class="col-sm-2 control-label"><?php echo $in['title'] ?></label>
                    <div class="col-sm-10">
                        <?php
                        $attr = 'class="form-control" id="' . $in['id'] . '" name="' . $in['id'] . '" placeholder="' . $in['title'] . '"';
                        if ($in['type'] == 'textarea') {
                            $html = '<textarea ';
                            $html .= $attr;
                            $html .= '></textarea>';
                        } else {
                            $html = '<input ';
                            if ($in['type'] == 'file') {
                                $html .= 'type="file"';
                            }
                            $html .= $attr;
                            $html .= '/>';
                        }
                        echo $html;
                        ?>
                         <!--value="<?php // echo $this->input->post('username')       ?>">-->
                        <span class="help-block"><?php // echo form_error('username');        ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary">Batal</button>
            <button class="btn btn-primary pull-right" name="simpan" value="ok">Simpan</button>
        </div>
    </form>
</div>
