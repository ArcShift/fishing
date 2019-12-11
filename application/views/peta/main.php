<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<div class="row">
    <div class="col-sm-2 panel panel-default">
        <div class="panel-body">
            <p>Update terakhir: <?php echo $data['date'] ?></p>
            <a class="btn btn-primary" href="<?php echo site_url($module . '/data_persebaran') ?>">Update</a>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="panel panel-default" id='map' style='width: 100%; height: 72vh;'></div>
    </div>
</div>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYXJjc2hpZnQiLCJhIjoiY2swcDBqa2J4MGdnODNpbXducHg4ZnFyZiJ9.UJsG8gyS6HQpnsuyciur3A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [112.572597, -7.2755979],
        zoom: 9
    });
    map.on('load', function () {
        map.addLayer({
            'id': 'population',
            'type': 'circle',
            'source': {
                type: 'geojson',
                data: '<?php echo base_url('upload/persebaran_ikan/' . $data['file']) ?>'
            },
            'paint': {
// make circles larger as the user zooms from z12 to z22
                'circle-radius': {
                    'base': 1.75,
                    'stops': [[12, 2], [22, 180]]
                },
// color circles by ethnicity, using a match expression
// https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
                'circle-color': [
                    'match',
                    ['get', 'ethnicity'],
                    'White', '#fbb03b',
                    'Black', '#223b53',
                    'Hispanic', '#e55e5e',
                    'Asian', '#3bb2d0',
                    /* other */ 'black'
                ]
            }
        });
    });
</script>