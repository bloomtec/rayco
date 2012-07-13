<div class="subcategories index">
	<h2><?php echo __('Subcategories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this -> Paginator -> sort('category_id', 'Categoría'); ?></th>
		<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Creada'); ?></th>
		<th><?php echo $this -> Paginator -> sort('modified', 'Modificada'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($subcategories as $subcategory): ?>
	<tr>
		<td>
			<?php echo $this -> Html -> link($subcategory['Category']['nombre'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
		</td>
		<td><?php echo h($subcategory['Subcategory']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($subcategory['Subcategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($subcategory['Subcategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $subcategory['Subcategory']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $subcategory['Subcategory']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $subcategory['Subcategory']['id']), null, __('¿Desea eliminar %s?', $subcategory['Subcategory']['nombre'])); ?>
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
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('action' => 'add')); ?></li>
		<li><?php echo $this -> Html -> link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Categoría'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
