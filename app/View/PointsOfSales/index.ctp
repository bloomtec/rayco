<div class="pointsOfSales index">
	<h2><?php echo __('Points Of Sales');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('direccion');?></th>
			<th><?php echo $this->Paginator->sort('telefono');?></th>
			<th><?php echo $this->Paginator->sort('contenido');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($pointsOfSales as $pointsOfSale): ?>
	<tr>
		<td><?php echo h($pointsOfSale['PointsOfSale']['id']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['created']); ?>&nbsp;</td>
		<td><?php echo h($pointsOfSale['PointsOfSale']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pointsOfSale['PointsOfSale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pointsOfSale['PointsOfSale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pointsOfSale['PointsOfSale']['id']), null, __('Are you sure you want to delete # %s?', $pointsOfSale['PointsOfSale']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Points Of Sale'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
