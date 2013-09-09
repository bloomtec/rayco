<div class="product-view">

	<h2 class="detalle_producto"><?php echo $product['Product']['referencia']; ?></h2>
		<div class="izq">
			<img class="imagen_principal" src="/img/uploads/400x400/<?php echo $product['Product']['image']; ?>" />
			<div class="controles">
				<a href=""><img src="/img/zoom_in.png" /></a>
				<a href=""><img src="/img/zoom_out.png" /></a>
				<a href=""><img src="/img/expand.png" /></a>
				<a href=""><img src="/img/contract.png" /></a>
			</div>
		</div>
		<div class="der">
			<label>Marca:</label>
			<span class="marca"><?php echo $product['Brand']['nombre'] ?> </span>
			<br />
			<br />

			<label>Precio:</label>
			<span class="marca"><?php echo "$".number_format($product['Product']['precio'], 0, '.', '.');  ?> </span>
			<br />
			<br />

			<label>Aplicación:</label>
			<p class="descripcion">
				<?php echo $product['Product']['descripcion']; ?>

			</p>


		</div>
	<div style="clear:both;"></div>
</div>
