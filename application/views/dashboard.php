<!--WIDGET-->
<?php

function parseWeight($weight) {
    if ($weight >= 1000) {
        return (int) ($weight / 1000) . ' ton';
    } else if ($weight >= 100) {
        return (int) ($weight / 100) . ' kwintal';
    } else if ($weight == 0) {
        return '0 kg';
    } else {
        return $weight . ' kg';
    }
}

function parseNominal($nominal) {
    $bil = array('triliun', 'milyar', 'juta', 'ribu');
    foreach ($bil as $key => $val) {
        if ($nominal > pow(10, 12 - (3 * $key))) {
            return (int) ($nominal / pow(10, 12 - (3 * $key))) . ' ' . $val;
        }
    }
}

$widgets = array(
    array("module" => "nelayan", "title" => "Nelayan", "color" => "primary", "icon" => "user", "value" => $countFisherman, "note" => "Nelayan baru: " . $newFisherman, "progress" => 50, "url" => "nelayan"),
    array("module" => "tangkapan", "title" => "Total Tangkapan", "color" => "success", "icon" => "shopping-basket", "value" => parseWeight($totalCatch), "note" => "Minggu ini: " . parseWeight($weekCatch), "progress" => 50, "url" => "nelayan"),
//    array("module" => "user", "title" => "User", "color" => "success", "icon" => "user-secret", "value" => $countAdmin, "note" => "-", "progress" => 50, "url" => "admin"),
    array("module" => "ikan", "title" => "Database Ikan", "color" => "grey", "icon" => "fish", "value" => $countFish, "note" => "-", "progress" => 50, "url" => "ikan"),
    array("module" => "pengaduan", "title" => "Pengaduan", "color" => "inverse-dark", "icon" => "phone-volume", "value" => $countPengaduan, "note" => "-", "progress" => (80), "url" => "pengaduan"),
    array("module" => "rekap_upt", "title" => "Kapal", "color" => "purple", "icon" => "ship", "value" => $kapal, "note" => "-", "progress" => (80), "url" => "pengaduan"),
    array("module" => "rekap_upt", "title" => "Total Tangkapan", "color" => "lime", "icon" => "shopping-basket", "value" => parseWeight($tangkapan), "note" => "-", "progress" => (80), "url" => "pengaduan"),
    array("module" => "rekap_upt", "title" => "Total Nilai Produksi", "color" => "danger", "icon" => "dolly", "value" => "Rp. " . parseNominal($keuntungan), "note" => "-", "progress" => (80), "url" => "pengaduan"),
);
?>
<div class="row">
    <?php foreach ($widgets as $w) { ?>
        <?php if (!empty($user['access'][$w['module']])) { ?>
            <div class="col-sm-6 col-lg-3">
                <div class="widget widget-stat widget-stat-right bg-<?php echo $w['color'] ?> text-white">
                    <!--<div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-redo"></i></a></div>-->
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
<!--GRAFIK==============================-->
<?php
$upt_kab = $user['role'] == 'UPT' | $user['role'] == 'Kabupaten' ? TRUE : FALSE;
if (!empty($dataGrafik)) {
    $berat = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    foreach ($dataGrafik as $d) {
        $berat[$d['bulan_id'] - 1] = $d['jumlah_berat'];
    }
    $grafikTitle = $upt_kab ? 'Bongkar Muat' : 'Tangkapan';
    ?>
    <div class="panel bg-inverse text-white wrapper">
        <h3 class="text-white text-center">Grafik <?php echo $grafikTitle ?></h3>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-2">
                    <select class="form-control" name="tahun" id="tahun">
                        <?php foreach ($tahun as $t) { ?>
                            <option value="<?php echo $t['tahun'] ?>" <?php echo $this->input->get('tahun') == $t['tahun'] ? 'selected' : '' ?>><?php echo $t['tahun'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-primary fa fa-search"></button>
            </div>
        </form>
        <canvas id="mainGraph" height="100"></canvas>
    </div>
    <script>
        var bulan = ['Januari', 'Februari', 'Maret', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var ctx = document.getElementById('mainGraph').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bulan,
                datasets: [{
                        label: 'Jumlah <?php echo $grafikTitle ?>',
                        backgroundColor: 'rgb(0,200, 200)',
                        data: <?php echo json_encode($berat); ?>
                    }]
            },
            options: {}
        });
    </script>
    <!--TABEL TANGKAPAN-->
    <?php if (!empty($user['access']['tangkapan'])) { ?>
        <div class="panel pagination-inverse bg-white clearfix no-rounded-corner">
            <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="width-100">Bulan</th>
                        <th><?php echo $grafikTitle ?> (Kg)</th>
                        <th>Postingan</th>
                        <th>Nelayan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataGrafik as $d) { ?>
                        <tr>
                            <td><?php echo $d['bulan'] ?></td>
                            <td><?php echo $d['jumlah_berat'] ?></td>
                            <td><?php echo $d['jumlah_postingan'] ?></td>
                            <td><?php echo $d['jumlah_nelayan'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
<?php } ?>
<?php
if ($upt_kab) {
    $table = array('ikan', 'kapal');
    $table_upt = array($upt_ikan, $upt_kapal);
    ?>
    <div class="row">
        <?php foreach ($table as $keyTb => $tb) { ?>
            <div class="col-sm-6">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">          
                            Bongkar Muat per <?php echo ucfirst($tb) ?>          
                        </h4>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="inverse">
                                <th><?php echo ucfirst($tb) ?></th>
                                <th>Volume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sum_vol = 0;
                            $sum_vol_more = 0;
                            $has_more = count($table_upt[$keyTb]) > 6 ? TRUE : FALSE;
                            foreach ($table_upt[$keyTb] as $key => $ui) {
                                ?>
                                <tr <?php echo ($key > 4 & $has_more) ? 'class="more_data"' : ''; ?>>
                                    <td><?php echo $ui[$tb] ?></td>
                                    <td><?php echo $ui['vol'] ?></td>
                                </tr>
                                <?php
                                $sum_vol += $ui['vol'];
                                $sum_vol_more += $key > 4 & $has_more ? $ui['vol'] : 0;
                            }
                            if ($has_more) {
                                ?>
                                <tr class="more_btn" onclick="more_data(this)">
                                    <th>More ...</th>
                                    <th><?php echo $sum_vol_more ?></th>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th><?php echo $sum_vol ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<!--PENGUMUMAN TERBARU-->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Pengumuman Terbaru</h4>
    </div>
    <div class="panel-body">
        <h4><?php echo $pengumuman['title'] ?></h4>
        <h5><?php echo $pengumuman['sort_desc'] ?></h5>
        <p><?php echo $pengumuman['full_desc'] ?></p>
    </div>
    <div class="panel-footer">
    </div>
</div>
<!--METADATA PETA-->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Data Peta</h4>
    </div>
    <table class="table">
        <thead>
            <tr class="inverse">
                <th>Sumber Data</th>
                <th>Tgl Update</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataPeta as $p) { ?>
                <tr>
                    <td><?php echo $p['source'] ?></td>
                    <td><?php echo $p['date'] ?></td>
                </tr>   
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('.more_data').hide();
    });
    function more_data(obj) {
        var tbody = $(obj).parent();
        $(tbody.children('.more_data')).show();
        $(obj).hide();
    }
    function ubah_status() {

    }
</script>