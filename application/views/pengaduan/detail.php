<?php
    $d=$dataLaporan;
?>
<style>
    button: {
        
    }
</style>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
<div id='map' style='width: 100%; height: 72vh;'>
    <button>Kembali</button>
</div>
<script>
//    mapboxgl.accessToken = 'pk.eyJ1IjoiYXJjc2hpZnQiLCJhIjoiY2swcDBqa2J4MGdnODNpbXducHg4ZnFyZiJ9.UJsG8gyS6HQpnsuyciur3A';
//    var map = new mapboxgl.Map({
//        container: 'map',
//        style: 'mapbox://styles/mapbox/streets-v11',
//        center: [112.74,-7.32],
//        zoom: 10,
//        minZoom: 6
//    });
</script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script type="text/javascript" src="https://leafletjs.com/examples/map-panes/eu-countries.js"></script>
<script>
    var map = L.map('map');
    var positron = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.satellite',
        accessToken: 'pk.eyJ1IjoianVuZGloYXJzeWEiLCJhIjoiY2p4bGFzajN3MDQ4dzN0bnUxYTVzbmE1ayJ9.uFIv3j--2d3MhQ30KcDxLA'
    }).addTo(map);
    map.setView({lat: <?php echo $d['latitude']?>, lng: <?php echo $d['longitude']?>}, 14);
    L.marker([<?php echo $d['latitude']?>, <?php echo $d['longitude']?>]).addTo(map).bindPopup('<?php echo $d['title']?>');
</script>