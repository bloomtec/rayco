<div class="categories view">
<h2><?php  echo __('Categoría');?></h2>
	<dl>
		<dt><?php echo __('Catalogo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($category['Catalog']['nombre'], array('controller' => 'catalogs', 'action' => 'view', $category['Catalog']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($category['Category']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($category['Category']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creada'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificada'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Categoría'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Categoría'), array('action' => 'delete', $category['Category']['id']), null, __('¿Desea eliminar %s?', $category['Category']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Categorías'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Categoría'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Catalogos'), array('controller' => 'catalogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($category['Subcategory'])):?>
	<h3><?php echo __('Subcategorías Relacionadas');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Creada'); ?></th>
		<th><?php echo __('Modificada'); ?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Subcategory'] as $subcategory): ?>
		<tr>
			<td><?php echo $subcategory['nombre'];?></td>
			<td><?php echo $subcategory['created'];?></td>
			<td><?php echo $subcategory['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'subcategories', 'action' => 'view', $subcategory['id'])); ?>
				<?php echo $this->Html->link(__('Modificar'), array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']), null, __('¿Desea eliminar %s?', $subcategory['nombre'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>
