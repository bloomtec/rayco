<div class="pointsOfSales view">
<h2><?php  echo __('Points Of Sale');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['contenido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Points Of Sale'), array('action' => 'edit', $pointsOfSale['PointsOfSale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Points Of Sale'), array('action' => 'delete', $pointsOfSale['PointsOfSale']['id']), null, __('Are you sure you want to delete # %s?', $pointsOfSale['PointsOfSale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Points Of Sales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Points Of Sale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Images');?></h3>
	<?php if (!empty($pointsOfSale['Image'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Model Class'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pointsOfSale['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id'];?></td>
			<td><?php echo $image['model_class'];?></td>
			<td><?php echo $image['foreign_key'];?></td>
			<td><?php echo $image['image'];?></td>
			<td><?php echo $image['descripcion'];?></td>
			<td><?php echo $image['created'];?></td>
			<td><?php echo $image['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'images', 'action' => 'delete', $image['id']), null, __('Are you sure you want to delete # %s?', $image['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
