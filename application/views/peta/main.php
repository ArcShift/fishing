<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
<div id='map' style='width: 100%; height: 72vh;'></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYXJjc2hpZnQiLCJhIjoiY2swcDBqa2J4MGdnODNpbXducHg4ZnFyZiJ9.UJsG8gyS6HQpnsuyciur3A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [112.572597, -7.2755979],
        zoom: 9
    });
    map.on('load', function () {

        /* Sample feature from the `examples.8fgz4egr` tileset:
         {
         "type": "Feature",
         "properties": {
         "ethnicity": "White"
         },
         "geometry": {
         "type": "Point",
         "coordinates": [ -122.447303, 37.753574 ]
         }
         }
         */
        map.addLayer({
            'id': 'population',
            'type': 'circle',
            'source': {
//                type: 'vector',
                type: 'geojson',
//                url: 'mapbox://examples.8fgz4egr'
                data: 'http://103.31.159.29/geoserver/wfs?srsName=EPSG%3A4326&typename=geonode%3Aindonesia_zppi_1806&outputFormat=json&version=1.0.0&service=WFS&request=GetFeature'
            },
//            'source-layer': 'sf2010',
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