@extends('layout')
@section('content')
<script src='https://api.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        #map { margin: auto; width: 75%; }
    </style>
<div class="container-fluid h-100 p-5">
	<div class="h-100 border border-primary" id='map'></div>
	<p class="p-5">This map represents the general hype surrounding a cold. Areas with larger dots have more people who think they may have a cold or who are investigating a cold.</p>
</div>
<script>
$(document).ready(function(){
	mapboxgl.accessToken = 'pk.eyJ1Ijoia2VpdGhzaGF3IiwiYSI6ImNqbmIxaHBzMTAwMjYzdm52M3B2bGpnNjIifQ.ASYdEvBI6kpgbuTwBUE8XA';
	var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/light-v9',
	zoom: 9,
	center: [loc['coords']['longitude'], loc['coords']['latitude']]
	});
	map.on('load', function () {

		// Add a geojson point source.
	    map.addSource('visitors', {
	        "type": "geojson",
	        "data": "geojson/generated.geojson"
	    });

	     map.addLayer({
	        "id": "visitors-heat",
	        "type": "heatmap",
	        "source": "visitors",
	        "maxzoom": 12,
	        "paint": {
	            "heatmap-weight": 1,
	            "heatmap-intensity": [
	                "interpolate",
	                ["linear"],
	                ["zoom"],
	                0, 1,
	                30, 30
	            ],
	            "heatmap-color": [
	                "interpolate",
	                ["linear"],
	                ["heatmap-density"],
	                0, "rgba(33,102,172,0)",
	                0.2, "rgb(103,169,207)",
	                0.4, "rgb(209,229,240)",
	                0.6, "rgb(253,219,199)",
	                0.8, "rgb(239,138,98)",
	                1, "rgb(178,24,43)"
	            ],
	            // Adjust the heatmap radius by zoom level
	            'heatmap-radius': {
			      stops: [
			        [1, 5],
			        [15, 30]
			      ]
			    },
	           'heatmap-opacity': {
			      default: 1,
			      stops: [
			        [0, 1],
			        [15, 0.5]
			      ]
			    },
	        }
	    }, 'waterway-label');


	});
});
</script>

@endsection