<div class="brands view">
<h2><?php  echo __('Marca');?></h2>
	<dl>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php //echo h($brand['Brand']['image']); ?>
			<img src="/img/uploads/215x215/<?php echo $brand['Brand']['image']; ?>" />
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creada'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificada'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Marca'), array('action' => 'edit', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Marca'), array('action' => 'delete', $brand['Brand']['id']), null, __('¿Desea eliminar %s?', $brand['Brand']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Marcas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Marca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($brand['Product'])):?>
	<h3><?php echo __('Productos Relacionados'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Referencia'); ?></th>
		<th><?php echo __('Imagen'); ?></th>
		<th><?php echo __('Es Visible'); ?></th>
		<th><?php echo __('Creado'); ?></th>
		<th><?php echo __('Modificado'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php $i = 0; foreach ($brand['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['nombre'];?></td>
			<td><?php echo $product['referencia'];?></td>
			<td>
				<?php //echo $product['image']; ?>
				<img src="/img/uploads/50x50/<?php echo $product['image']; ?>" />
			</td>
			<td>
				<?php if($product['es_visible']) { ?>
				<input type="checkbox" disabled="true" checked="checked" />
				<?php } else { ?>
				<input type="checkbox" disabled="true" />
				<?php } ?>
			</td>
			<td><?php echo $product['created'];?></td>
			<td><?php echo $product['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Modificar'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('¿Desea eliminar %s?', $product['nombre'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>
