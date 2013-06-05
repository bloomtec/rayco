<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=es"></script>
<script>
	var map;
	function initialize() {
		var mapOptions = {
			zoom: 13,
			center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);
		marker = new google.maps.Marker({
			map: map,
			draggable: false,
			animation: google.maps.Animation.DROP,
			position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>)
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
<div id="map-canvas"></div>