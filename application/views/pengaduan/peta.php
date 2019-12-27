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
<div class="panel">
    <div class="panel-heading">
        <a class="btn btn-primary" href="<?php echo site_url($module)?>">Kembali</a>
    </div>
    <div class="panel-body">
        <div class="panel panel-default" id='map' style='width: 100%; height: 72vh;'></div>
    </div>
    <!--<div class="panel-footer"></div>-->
</div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYXJjc2hpZnQiLCJhIjoiY2swcDBqa2J4MGdnODNpbXducHg4ZnFyZiJ9.UJsG8gyS6HQpnsuyciur3A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [114.1923798892957, -7.472805706317786],
        zoom: 6
    });
    map.on('load', function () {
        $.getJSON('<?php echo site_url($module . '/koordinat') ?>', null, function (resp) {
            resp.forEach(function (item) {
                console.log(item);
                var el = document.createElement('div');
                el.className = 'marker';
                var marker = new mapboxgl.Marker(el, {
                    offset: [0, -20]
                })
                        .setLngLat([item.longitude, item.latitude])
                        .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
                                .setHTML('<p>' + item.description + '</p><p>status: ' + item.status + '</p>'))
                        .addTo(map);
            });
        });
    });
</script>