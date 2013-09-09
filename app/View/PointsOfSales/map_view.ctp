<?php

?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.13&sensor=false&language=es"></script>
<script>
	var map;
	var latlng =  new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);

	function initialize() {
		var mapOptions = {
			center:latlng,
			zoom: 18,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);
		marker = new google.maps.Marker({
			map: map,
			draggable: false,
			animation: google.maps.Animation.DROP,
			position: latlng
		});
		google.maps.event.addListener(marker, 'click', toggleBounce);

	}
	function toggleBounce() {

		if (marker.getAnimation() != null) {
			marker.setAnimation(null);
		} else {
			marker.setAnimation(google.maps.Animation.BOUNCE);
		}
	}
	google.maps.event.addDomListener(window, 'load', initialize);

</script>
<style>
    #map-canvas{
        min-width: 650px;
        min-height: 400px;

    }
	    /* the overlayed element */

</style>



<div id="map-canvas"></div>