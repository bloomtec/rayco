<div class="catalogs index">
	<h2><?php echo __('Catalogs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
		<th><?php echo $this -> Paginator -> sort('image', 'Imagen'); ?></th>
		<th><?php echo $this -> Paginator -> sort('descripcion', 'Descripción'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($catalogs as $catalog): ?>
	<tr>
		<td><?php echo h($catalog['Catalog']['nombre']); ?>&nbsp;</td>
		<td>
			<?php //echo h($catalog['Catalog']['image']); ?>
			<img src="/img/uploads/100x100/<?php echo $catalog['Catalog']['image']; ?>" />
			&nbsp;
		</td>
		<td><?php echo h($catalog['Catalog']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $catalog['Catalog']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $catalog['Catalog']['id'])); ?>
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
		<li><?php echo $this -> Html -> link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Categoría'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
