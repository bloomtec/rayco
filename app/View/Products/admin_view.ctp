<div class="products view">
<h2><?php  echo __('Producto');?></h2>
	<dl>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Brand']['nombre'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($product['Product']['referencia']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php //echo __('Nombre'); ?></dt>
		<dd>
			<?php //echo h($product['Product']['nombre']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php //echo h($product['Product']['image']); ?>
			<?php echo $this -> Html -> image('uploads/215x215/' . $product['Product']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($product['Product']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Es Visible'); ?></dt>
		<dd>
			<?php
				if($product['Product']['es_visible']) {
					echo '<input type="checkbox" disabled="true" checked="checked" />';
				} else {
					echo '<input type="checkbox" disabled="true" />';
				}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($product['Product']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Producto'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Producto'), array('action' => 'delete', $product['Product']['id']), null, __('¿Desea eliminar %s?', $product['Product']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Producto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Imagenes Relacionadas');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Creada'); ?></th>
		<th><?php echo __('Modificada'); ?></th>
	</tr>
	<?php if (!empty($product['Image'])):?>
	<?php $i = 0; foreach ($product['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id'];?></td>
			<td><?php echo $this -> Html -> image('uploads/50x50/' . $image['image']); ?></td>
			<td><?php echo $image['created'];?></td>
			<td><?php echo $image['modified'];?></td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Subcategorías Relacionadas');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Creada'); ?></th>
		<th><?php echo __('Modificada'); ?></th>
	</tr>
	<?php if (!empty($product['Subcategory'])):?>
	<?php $i = 0; foreach ($product['Subcategory'] as $subcategory): ?>
		<tr>
			<td><?php echo $subcategory['nombre'];?></td>
			<td><?php echo $subcategory['created'];?></td>
			<td><?php echo $subcategory['modified'];?></td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</table>
</div>
