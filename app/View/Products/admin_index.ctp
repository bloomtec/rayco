<div class="products index">
	<h2><?php echo __('Productos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this -> Paginator -> sort('brand_id', 'Marca'); ?></th>
		<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
		<th><?php echo $this -> Paginator -> sort('image', 'Imagen'); ?></th>
		<th><?php echo $this -> Paginator -> sort('referencia'); ?></th>
		<th><?php echo $this -> Paginator -> sort('es_visible'); ?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Creado'); ?></th>
		<th><?php echo $this -> Paginator -> sort('modified', 'Modificado'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td>
			<?php echo $this -> Html -> link($product['Brand']['nombre'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['nombre']); ?>&nbsp;</td>
		<td>
			<?php //echo h($product['Product']['image']); ?>
			<img src="/img/uploads/50x50/<?php echo $product['Product']['image']; ?>" />
			&nbsp;
		</td>
		<td><?php echo h($product['Product']['referencia']); ?>&nbsp;</td>
		<td>
			<?php //echo h($product['Product']['es_visible']); ?>
			<?php if($product['Product']['es_visible']) { ?>
			<input type="checkbox" disabled="true" checked="checked" />
			<?php } else { ?>
			<input type="checkbox" disabled="true" />
			<?php } ?>
			&nbsp;
		</td>
		<td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $product['Product']['id']), null, __('¿Desea eliminar %s?', $product['Product']['nombre'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, desde el %start%, hasta el %end%')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('anterior '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(' siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(' >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Agregar Producto'), array('action' => 'add')); ?></li>
		<li><?php echo $this -> Html -> link(__('Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
