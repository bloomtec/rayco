<!--<img class="solapa_content" src="/img/solapa_content.png"/>
<div class="nuestros_productos">
	<h1>Conozca nuestros productos:</h1>
	<ul>
		<li>
			<a href="#">RAYCO AUTOMOTRIZ</a>
		</li>
		<li>
			<a class="current" href="#">RAYLUJOS AUTOMOTRIZ</a>
		</li>
	</ul>
</div>-->
<?php echo $this -> element('catalogos');?>
<div style="clear:both;"></div>
<!--<div class="seccion_izquierda">
	
	<ul>
		<li><a class="current" href="#">Nombre Subcategoría 1</a></li>
		<li><a href="#">Nombre Subcategoría 2</a></li>
		<li><a href="#">Nombre Subcategoría 3</a></li>
		<li><a href="#">Nombre Subcategoría 4</a></li>
		<li><a href="#">Nombre Subcategoría 5</a></li>
	</ul>
</div>-->
<?php echo $this -> element('seccion-izquierda',array('catalogId'=>$catalog)); ?>
<div class="seccion_derecha">
	<a href="<?php echo $referer; ?>" class="regresar"><?php echo 'Regresar a ' . $previous_section; ?></a>
	<h2 class="detalle_producto"><?php echo $product['Product']['nombre']; ?></h2>
	
	<div style="clear: both;"></div>
		<div class="izq">
			<img class="imagen_principal" src="/img/uploads/360x360/<?php echo $product['Product']['image']; ?>" />
			<div class="controles">
				<a href=""><img src="/img/zoom_in.png" /></a>
				<a href=""><img src="/img/zoom_out.png" /></a>
				<a href=""><img src="/img/expand.png" /></a>
				<a href=""><img src="/img/contract.png" /></a>
			</div>
		</div>
		<div class="der">
			<p>
				<?php echo $product['Product']['descripcion']; ?>
				<!--<br /><br />
				<strong>Garantía:</strong> 1 año, Limitada. 
				<br /><br />
				<strong>Linea:</strong> Campero-->
			</p>
		</div>
</div>
<div style="clear:both;"></div>