<?php echo $this -> element('nuestros_productos');?>
<div class="info_content locales">
	<h1>Nuestras oficinas</h1>

	<div class="left">
        <?php foreach($locales as $key => $local):?>
            <?php if($key % 2 == 0):?>
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
             <?php endif;?>
        <?php endforeach; ?>
	</div>
	<div class="right">
        <?php foreach($locales as $key => $local):?>
            <?php if($key % 2 != 0):?>
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
            <?php endif;?>
        <?php endforeach; ?>
	</div>
	
	
	
	<div style="clear: both;"></div>
	
</div>