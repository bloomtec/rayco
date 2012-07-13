<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this -> Paginator -> sort('catalog_id', 'Catalogo'); ?></th>
		<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Creada'); ?></th>
		<th><?php echo $this -> Paginator -> sort('modified', 'Modificada'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td>
			<?php echo $this -> Html -> link($category['Catalog']['nombre'], array('controller' => 'catalogs', 'action' => 'view', $category['Catalog']['id'])); ?>
		</td>
		<td><?php echo h($category['Category']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $category['Category']['id']), null, __('¿Desea eliminar %s?', $category['Category']['nombre'])); ?>
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
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Agregar Categoría'), array('action' => 'add')); ?></li>
		<li><?php echo $this -> Html -> link(__('Catalogos'), array('controller' => 'catalogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
