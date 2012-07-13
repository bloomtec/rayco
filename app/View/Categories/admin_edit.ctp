<div class="categories form">
<?php echo $this -> Form -> create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Modificar Categoría ' . $this -> data['Category']['nombre']); ?></legend>
	<?php
	echo $this -> Form -> input('id');
	echo $this -> Form -> input('catalog_id', array('label' => 'Catalogo', 'empty' => 'Seleccione...'));
	echo $this -> Form -> input('nombre');
	echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('Category.id')), null, __('¿Desea eliminar %s?', $this -> Form -> value('Category.nombre'))); ?></li>
		<li><?php echo $this -> Html -> link(__('Categorías'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Catalogos'), array('controller' => 'catalogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Catalogo'), array('controller' => 'catalogs', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
