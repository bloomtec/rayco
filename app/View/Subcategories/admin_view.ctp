<div class="subcategories view">
<h2><?php  echo __('Subcategory');?></h2>
	<dl>
		<dt><?php echo __('Categoría'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subcategory['Category']['nombre'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creada'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificada'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Subcategoría'), array('action' => 'edit', $subcategory['Subcategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Subcategoría'), array('action' => 'delete', $subcategory['Subcategory']['id']), null, __('¿Desea eliminar %s?', $subcategory['Subcategory']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Subcategorías'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Subcategoría'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Categoría'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Productos'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($subcategory['Product'])):?>
	<h3><?php echo __('Productos Relacionados');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Referencia'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Es Visible'); ?></th>
		<th><?php echo __('Creado'); ?></th>
		<th><?php echo __('Modificado'); ?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subcategory['Product'] as $product): ?>
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
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('¿Seguro desea eliminar %s?', $product['nombre'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>
