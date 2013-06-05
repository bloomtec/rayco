<style>
		/* the overlayed element */
	.simple_overlay {

		/* must be initially hidden */
		display:none;

		/* place overlay on top of other elements */
		z-index:10000;

		/* styling */
		background-color:white;

		min-width: 700px;
		min-height: 415px;
		border:1px solid #666;

		/* CSS3 styling for latest browsers */
		-moz-box-shadow:0 0 90px 5px #000;
		-webkit-box-shadow: 0 0 90px #000;
	}

		/* close button positioned on upper right corner */
	.simple_overlay .close {
		background-image:url("/img/close.png");
		position:absolute;
		right:-15px;
		top:-15px;
		cursor:pointer;
		height:35px;
		width:35px;
	}

</style>
<script type="text/javascript">
	$(function() {
		$("a[rel]").overlay();
	});
</script>
<?php echo $this -> element('nuestros_productos');?>
<div class="info_content locales">
	<h1>Nuestras oficinas</h1>
	<div class="left">
        <?php foreach($locales as $key => $local):?>
            <?php if($key % 2 == 0 && !empty($local['Image'])):?>
            <div class="main_image">
                <img src="/img/uploads/360x360/<?php echo $local['Image'][0]['image'];?>" />
            </div>
            <div class="controls">
                <a class="arrow-left"><img src="/img/arrow-left.png" /></a>
                <div class="scrollable">
                    <div class="items">
                        <?php foreach($local["Image"] as $i => $image):?>
                        <a <?php if($i==0) echo "class='current'"?>><img src="/img/uploads/50x50/<?php echo $image['image'];?>" /></a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <a class="arrow-right"><img src="/img/arrow-right.png" /></a>
                <div style="clear:both;"></div>
            </div>

            <p>
                <strong>Correo electronico:</strong> info@rayco.com.co
                <br />
                <strong>Tel:</strong> <?php echo  $local['PointsOfSale']['telefono']?> <strong>Cel:</strong> <?php echo  $local['PointsOfSale']['celular']?>
                <br />
                <strong>Dirección:</strong> <?php echo  $local['PointsOfSale']['direccion']?>
            </p>
		    <p>
			    <?php
				    $lat = $local['PointsOfSale']['lat'];
				    $lng = $local['PointsOfSale']['lng'];
			    ?>
			    <iframe
				    id="simple_overlay_<?php echo $local['PointsOfSale']['id']; ?>"
				    class="simple_overlay"
				    src="/PointsOfSales/mapView/lat:<?php echo $lat; ?>/lng:<?php echo $lng; ?>"
				    >
			    </iframe>
			    <a href="#" id="overlay_<?php echo $local['PointsOfSale']['id']; ?>" rel="#simple_overlay_<?php echo $local['PointsOfSale']['id']; ?>">Ver Mapa</a>
		    </p>
             <?php endif;?>
        <?php endforeach; ?>
	</div>
	<div class="right">
        <?php foreach($locales as $key => $local): //debug($local['Image']); ?>
            <?php if($key % 2 != 0 && !empty($local['Image'])):?>
                <div class="main_image">
                    <img src="/img/uploads/360x360/<?php echo $local['Image'][0]['image'];?>" />
                </div>
                <div class="controls">
                    <a class="arrow-left"><img src="/img/arrow-left.png" /></a>
                    <div class="scrollable">
                        <div class="items">
                            <?php foreach($local["Image"] as $i => $image):?>
                                <a <?php if($i==0) echo "class='current'"?>><img src="/img/uploads/50x50/<?php echo $image['image'];?>" /></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a class="arrow-right"><img src="/img/arrow-right.png" /></a>
                    <div style="clear:both;"></div>
                </div>

                <p>
                    <strong>Correo electronico:</strong> info@rayco.com.co
                    <br />
                    <strong>Tel:</strong> <?php echo  $local['PointsOfSale']['telefono']?> <strong>Cel:</strong> <?php echo  $local['PointsOfSale']['celular']?>
                    <br />
                    <strong>Dirección:</strong> <?php echo  $local['PointsOfSale']['direccion']?>
                </p>
		        <p>
			        <?php
				        $lat = $local['PointsOfSale']['lat'];
				        $lng = $local['PointsOfSale']['lng'];
			        ?>
			        <iframe
				        id="simple_overlay_<?php echo $local['PointsOfSale']['id']; ?>"
				        class="simple_overlay"
				        src="/PointsOfSales/mapView/lat:<?php echo $lat; ?>/lng:<?php echo $lng; ?>"
				        >
			        </iframe>
			        <a href="#" id="overlay_<?php echo $local['PointsOfSale']['id']; ?>" rel="#simple_overlay_<?php echo $local['PointsOfSale']['id']; ?>">Ver Mapa</a>
		        </p>
            <?php endif;?>
        <?php endforeach; ?>
	</div>
	<div style="clear: both;"></div>
</div>