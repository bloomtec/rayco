<div class="catalogs view">
	<?php echo $this -> Form -> create('Filtro'); ?>
	<table id="FilterTable">
		<tbody>
			<tr>
				<td><?php echo $this -> Form -> input('Filtro.categories', array('label' => 'Categoría', 'type' => 'select', 'empty' => 'Seleccione...')); ?></td>
				<td><?php echo $this -> Form -> input('Filtro.subcategories', array('label' => 'Subcategoría', 'type' => 'select', 'empty' => 'Seleccione...')); ?></td>
				<td><?php echo $this -> Form -> submit('Filtrar'); ?></td>
				<?php if((isset($this -> request -> data['Filtro']['categories']) && $this -> request -> data['Filtro']['categories']) || (isset($this -> request -> data['Filtro']['subcategories']) && $this -> request -> data['Filtro']['subcategories'])) : ?>
				<td class="actions"><a href="/catalogs/view/<?php echo $catalog['Catalog']['id']; ?>">Quitar Filtros</a></td>
				<?php endif; ?>
			</tr>
		</tbody>
	</table>
	<?php echo $this -> Form -> end(); ?>
	<?php debug($products); ?>
<!--
<h2><?php  echo __('Catalog');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($catalog['Catalog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($catalog['Catalog']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($catalog['Catalog']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($catalog['Catalog']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($catalog['Catalog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($catalog['Catalog']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
-->
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Catalogos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
	</ul>
</div>
<!--
<div class="related">
	<h3><?php echo __('Related Categories');?></h3>
	<?php if (!empty($catalog['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Catalog Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($catalog['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id'];?></td>
			<td><?php echo $category['catalog_id'];?></td>
			<td><?php echo $category['nombre'];?></td>
			<td><?php echo $category['descripcion'];?></td>
			<td><?php echo $category['created'];?></td>
			<td><?php echo $category['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add'));?> </li>
		</ul>
	</div>

</div>
-->