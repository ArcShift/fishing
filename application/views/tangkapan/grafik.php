<!--MAP=====================-->
<style>
    .marker {
        background-image: url('https://pngriver.com/wp-content/uploads/2018/04/Download-Map-Marker-PNG-Image.png');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
<div class="panel panel-default" id='map' style='width: 100%; height: 72vh;'></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYXJjc2hpZnQiLCJhIjoiY2swcDBqa2J4MGdnODNpbXducHg4ZnFyZiJ9.UJsG8gyS6HQpnsuyciur3A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [112.572597, -7.2755979],
        zoom: 9
    });
    map.on('load', function () {
        console.log('LOAD');
        $.getJSON('<?php echo site_url($module . '/koordinat') ?>', null, function (resp) {
//            console.log(resp);
            resp.forEach(function (item) {
                console.log(item);
                var el = document.createElement('div');
                el.className = 'marker';
                var marker = new mapboxgl.Marker(el, {
                    offset: [0, -20]
                })
                        .setLngLat([item.longitude, item.latitude])
                        .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
                                .setHTML('<p>' + item.description + '</p><p>' + item.total_weight + ' kg</p>'))
                        .addTo(map);
            });
        });
    });
</script>
<!--GRAFIK==============================-->
<?php
$berat = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
foreach ($data as $d) {
    $berat[$d['bulan_id'] - 1] = $d['jumlah_berat'];
}
?>
<div class="panel no-rounded-corner bg-inverse text-white wrapper m-b-0">
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
                    label: 'Jumlah Tangkapan',
                    backgroundColor: 'rgb(0,200, 200)',
                    data: <?php echo json_encode($berat); ?>
                }]
        },
        options: {}
    });
</script>
<div class="panel pagination-inverse bg-white clearfix no-rounded-corner m-b-0">
    <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="width-100">Bulan</th>
                <th>Tangkapan (Kg)</th>
                <th>Postingan</th>
                <th>Nelayan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $d) { ?>
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
