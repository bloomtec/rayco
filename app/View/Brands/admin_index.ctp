<div class="brands index">
	<h2><?php echo __('Brands'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
		<th><?php echo $this -> Paginator -> sort('image', 'Imagen'); ?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Creada'); ?></th>
		<th><?php echo $this -> Paginator -> sort('modified', 'Modificada'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($brands as $brand): ?>
	<tr>
		<td><?php echo h($brand['Brand']['nombre']); ?>&nbsp;</td>
		<td>
			<?php //echo h($brand['Brand']['image']); ?>
			<img src="/img/uploads/50x50/<?php echo $brand['Brand']['image']; ?>" />
			&nbsp;
		</td>
		<td><?php echo h($brand['Brand']['created']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $brand['Brand']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $brand['Brand']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $brand['Brand']['id']), null, __('¿Desea eliminar %s?', $brand['Brand']['nombre'])); ?>
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
		<li><?php echo $this -> Html -> link(__('Agregar Marca'), array('action' => 'add')); ?></li>
		<li><?php echo $this -> Html -> link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
