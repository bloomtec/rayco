<div class="pointsOfSales index">
	<h2><?php echo __('Puntos De Ventas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this -> Paginator -> sort('image', 'Imagen'); ?></th>
		<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
		<th><?php echo $this -> Paginator -> sort('direccion', 'Dirección'); ?></th>
		<th><?php echo $this -> Paginator -> sort('telefono', 'Teléfono'); ?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Creado'); ?></th>
		<th><?php echo $this -> Paginator -> sort('modified', 'Modificado'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($pointsOfSales as $pointsOfSale): ?>
	<tr>
		<td><?php echo $this -> Html -> image('uploads/50x50/' . $pointsOfSale['PointsOfSale']['image']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['created']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $pointsOfSale['PointsOfSale']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $pointsOfSale['PointsOfSale']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $pointsOfSale['PointsOfSale']['id']), null, __('¿Desea eliminar %s?', $pointsOfSale['PointsOfSale']['nombre'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this -> Paginator -> counter(array('format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, desde el %start%, hasta el %end%')));
	?>	</p>

	<div class="paging">
	<?php
	echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> prev('< ' . __('anterior '), array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> numbers(array('separator' => ''));
	echo $this -> Paginator -> next(__(' siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	echo $this -> Paginator -> last(' >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Agregar Punto De Venta'), array('action' => 'add')); ?></li>
	</ul>
</div>
