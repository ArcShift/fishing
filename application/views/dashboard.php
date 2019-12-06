<!--<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Title</h4>
    </div>
    <div class="panel-body">
        Description..
        Description..
        Description..
        Description..
        Description..
        Description..
        Description..
    </div>
    <div class="panel-footer">
        <button class="btn btn-default">Tutup</button>
    </div>
</div>-->
<!--WIDGET-->
<?php
$widgets = array(
    array("module" => "nelayan", "title" => "Nelayan", "color" => "primary", "icon" => "user", "value" => $countFisherman, "note" => "-", "progress" => 50, "url" => "nelayan"),
    array("module" => "user", "title" => "User", "color" => "success", "icon" => "user-secret", "value" => $countAdmin, "note" => "-", "progress" => 50, "url" => "admin"),
    array("module" => "ikan", "title" => "Database Ikan", "color" => "grey", "icon" => "fish", "value" => $countFish, "note" => "-", "progress" => 50, "url" => "ikan"),
    array("module" => "pengaduan", "title" => "Pengaduan", "color" => "inverse-dark", "icon" => "phone-volume", "value" => $countPengaduan, "note" => "Tertangani " . $countPengaduanTertangani, "progress" => (80), "url" => "pengaduan"),
);
?>
<div class="row">
    <?php foreach ($widgets as $w) { ?>
        <?php if (in_array($w['module'], $aksesModule)) { ?>
            <div class="col-sm-6 col-lg-3">
                <div class="widget widget-stat widget-stat-right bg-<?php echo $w['color'] ?> text-white">
                    <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-redo"></i></a></div>
                    <div class="widget-stat-icon"><i class="fa fa-<?php echo $w['icon'] ?>"></i></div>
                    <div class="widget-stat-info">
                        <div class="widget-stat-title"><?php echo $w['title'] ?></div>
                        <div class="widget-stat-number"><?php echo $w['value'] ?></div>
                    </div>
                    <div class="widget-stat-progress">
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $w['progress'] ?>%"></div>
                        </div>
                    </div>
                    <div class="widget-stat-footer text-left">
                        <a class="btn btn-default fa fa-search" href="<?php echo site_url($w['module']) ?>"></a>
                        &nbsp;&nbsp;<?php echo $w['note'] ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>