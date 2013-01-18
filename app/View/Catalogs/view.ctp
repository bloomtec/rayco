<?php echo $this -> element('catalogos');?>
<div style="clear:both;"></div>
<?php echo $this -> element('seccion-izquierda',array('catalogId'=>$catalog['Catalog']['id'])); ?>
<div class="seccion_derecha">
	<!--<a class="prev"></a>
	<a class="next"></a>-->
	<?php echo $this -> Paginator->prev(__(''), array(), null, array('class' => 'prev disabled')); ?>
	<?php echo $this -> Paginator->next(__(''), array(), null, array('class' => 'next disabled')); ?>
	<h2><?php echo $products_title; ?></h2>
	<div class="paginacion">
		<!--<p>
			6 Productos   |  
			<a href="#">4</a> -
			<a class="current" href="#">5</a> - 
			<a href="#">6</a> 
			<a href="#">></a>   
			<a href="#">>></a> | 
			<a href="#">Ver todos</a>
		</p>-->
		<p>
			<?php
				echo $this -> Paginator -> counter(
					array(
						'format' => __('{:count} Productos | {:start} - {:end} |')
						//'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					)
				);
			?>
		</p>
	</div>
	<div style="clear: both;"></div>
	<div class="productos">
		<?php foreach ($products as  $product): ?>
		<div>
			<a href="/products/view/<?php echo $product['Product']['id']; ?>"><img src="/img/uploads/215x215/<?php echo $product['Product']['image']; ?>" /></a>
			<a href="/products/view/<?php echo $product['Product']['id']; ?>"><h3><?php echo $product['Product']['nombre']; ?></h3></a>
		</div>
		<?php //debug($product); ?>
		<?php endforeach; ?>
	</div>
	<div class="paginacion" style="clear:left;">
		<!--<p>
			6 Productos   |  
			<a href="#">4</a> -
			<a class="current" href="#">5</a> - 
			<a href="#">6</a> 
			<a href="#">></a>   
			<a href="#">>></a> | 
			<a href="#">Ver todos</a>
		</p>-->
		<p>
			<?php
				echo $this -> Paginator -> counter(
					array(
						'format' => __('{:count} Productos | {:start} - {:end} |')
						//'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					)
				);
			?>
		</p>
		
	</div>
</div>
<div style="clear:both;"></div>
