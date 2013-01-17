<?php echo $this -> element('catalogos');?>
<div style="clear:both;"></div>
<?php echo $this -> element('seccion-izquierda',array('catalogId'=>$catalog['Catalog']['id'])); ?>
<div class="seccion_derecha">
	<a class="prev"></a>
	<a class="next"></a>
	<h2>Nombre Subcategoría 1</h2>
	<div class="paginacion">
		<p>
			6 Productos   |  
			<a href="#">4</a> -
			<a class="current" href="#">5</a> - 
			<a href="#">6</a> 
			<a href="#">></a>   
			<a href="#">>></a> | 
			<a href="#">Ver todos</a>
		</p>
	</div>
	<div style="clear: both;"></div>
	<div class="productos">
		<?php foreach ($products as  $product): ?>
		<div>
			<a href="/products/view/<?php echo $product['Product']['id'] ?>"><img src="/img/uploads/215x215/<?php echo $product['Product']['image']?>" /></a>
			<a href="/products/view/<?php echo $product['Product']['id'] ?>"><h3>Nombre Producto</h3></a>
		</div>
	<?php endforeach; ?>
	</div>
	<div class="paginacion" style="clear:left;">
		<p>
			6 Productos   |  
			<a href="#">4</a> -
			<a class="current" href="#">5</a> - 
			<a href="#">6</a> 
			<a href="#">></a>   
			<a href="#">>></a> | 
			<a href="#">Ver todos</a>
		</p>
	</div>
</div>
<div style="clear:both;"></div>