<?php
	echo $this -> element('nuestros_productos');

?>
<div style="clear:both;"></div>
<div class="marcas_wrapper">

	<div>
		<img src="/img/logo_rayco_catalogo.png">
		<p>
			<?php echo $raycoCatalog['Catalog']['descripcion']?>
		</p>
		<a style="position: absolute;bottom: 12px;" href="/catalogs/view/1">VER PRODUCTOS</a>
		<img class="solapa" src="/img/solapa_marcas.png">
	</div>
	<div>
		
		<img src="/img/raylujos.png">
		<p>
			<?php echo $raylujosCatalog['Catalog']['descripcion']?>
		</p>
		<a style="position: absolute;bottom: 12px;" href="/catalogs/view/2">VER PRODUCTOS</a>
		<img class="solapa" src="/img/solapa_marcas.png">
	</div>
	<div style="clear:both;border:none;padding:0; height:0;"></div>
</div>
<div style="clear:both;"></div>