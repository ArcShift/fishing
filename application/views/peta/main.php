<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<style>
    #menu {
        background: #fff;
        /*position: absolute;*/
        z-index: 1;
        /*        top: 10px;
                right: 10px;*/
        border-radius: 3px;
        width: 120px;
        border: 1px solid rgba(0, 0, 0, 0.4);
        font-family: 'Open Sans', sans-serif;
    }
    #menu a {
        font-size: 13px;
        color: #404040;
        display: block;
        margin: 0;
        padding: 0;
        padding: 10px;
        text-decoration: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        text-align: center;
    }

    #menu a:last-child {
        border: none;
    }

    #menu a:hover {
        background-color: #f8f8f8;
        color: #404040;
    }

    #menu a.active {
        background-color: #3887be;
        color: #ffffff;
    }

    #menu a.active:hover {
        background: #3074a4;
    }
    .marker {
        background-image: url('https://pngriver.com/wp-content/uploads/2018/04/Download-Map-Marker-PNG-Image.png');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
<div class="row">
    <div class="col-sm-2 panel panel-default">
        <div class="panel-body">
<!--            <p>Update terakhir: <?php // echo $data['date']                      ?></p>
            <a class="btn btn-primary" href="<?php // echo site_url($module . '/data_persebaran')                      ?>">Update</a>-->
            <nav id="menu"></nav>
            <p><span></span></p>
            <p>Koordinat titik yang dipilih adalah :<span></span></p>
            <p><span></span></p>
            <p> lat: <span id="lat"></span></p>
            <p> long: <span id="long"></span></p>
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
        center: [114.1923798892957, -7.472805706317786],
        zoom: 6
    });
    map.on('load', function () {
        map.addLayer({
            'id': 'Persebaran Ikan: LAPAN',
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
        map.addLayer({
            'id': 'Persebaran Ikan: ITS',
            'type': 'circle',
            'source': {
                type: 'geojson',
                data: '<?php echo base_url('assets/desember.json');?>'
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
                    /* other */ '#ff0000'
                ]
            }
        });
        var lay = map.addLayer({
            'id': 'Batas Perairan: Jawa Timur',
            'type': 'line',
            'source': {
                type: 'geojson',
                data: '<?php echo base_url('upload/batas_zona_perairan.geojson') ?>'
            },
            'paint': {
// make circles larger as the user zooms from z12 to z22
//                'line-radius': {
//                    'base': 1.75,
//                    'stops': [[12, 2], [22, 180]]
//                },
// color circles by ethnicity, using a match expression
// https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
                'line-color': [
                    'match',
                    ['get', 'ethnicity'],
                    'White', '#fbb03b',
                    'Black', '#223b53',
                    'Hispanic', '#e55e5e',
                    'Asian', '#3bb2d0',
                    /* other */ '#0000ff'
                ]
            }
        });
        //ADD MARKERS
        $.getJSON('<?php echo site_url('peta/pengaduan') ?>', null, function (resp) {
            map.addLayer({
                'id': 'Persebaran Aduan Nelayan',
                'type': 'circle',
                'source': {
                    type: 'geojson',
                    data: resp
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
                        /* other */ 'green'
                    ]
                }
            });
        });

    });
    //==================
    var toggleableLayerIds = ['Batas Perairan: Jawa Timur', 'Persebaran Ikan: LAPAN', 'Persebaran Ikan: ITS', 'Persebaran Aduan Nelayan'];
    for (var i = 0; i < toggleableLayerIds.length; i++) {
        var id = toggleableLayerIds[i];
        var link = document.createElement('a');
        link.href = '#';
        link.className = 'active';
        link.textContent = id;

        link.onclick = function (e) {
            var clickedLayer = this.textContent;
            e.preventDefault();
            e.stopPropagation();

            var visibility = map.getLayoutProperty(clickedLayer, 'visibility');

            if (visibility === 'visible') {
                map.setLayoutProperty(clickedLayer, 'visibility', 'none');
                this.className = '';
            } else {
                this.className = 'active';
                map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
            }
        };
        var layers = document.getElementById('menu');
        layers.appendChild(link);
    }
    map.on('click', function (e) {
//    map.on('mousemove', function (e) {
        var co = e.lngLat;
        $("#lat").text(co.lat);
        $("#long").text(co.lng);
    });
</script>