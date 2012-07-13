<div class="subcategories form">
<?php echo $this -> Form -> create('Subcategory'); ?>
	<fieldset>
		<legend><?php echo __('Modificar Subcategoría ' . $this -> request -> data['Subcategory']['nombre']); ?></legend>
	<?php
	echo $this -> Form -> input('id');
	echo $this -> Form -> input('category_id', array('label' => 'Categoría', 'empty' => 'Seleccione...'));
	echo $this -> Form -> input('nombre');
	echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
	echo $this -> Form -> input('Product', array('label' => 'Productos', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('Subcategory.id')), null, __('¿Desea eliminar %s?', $this -> Form -> value('Subcategory.nombre'))); ?></li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Categoría'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php debug($this -> request -> data); ?>