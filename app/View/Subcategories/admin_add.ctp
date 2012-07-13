<div class="subcategories form">
<?php echo $this -> Form -> create('Subcategory'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Subcategory'); ?></legend>
	<?php
	echo $this -> Form -> input('category_id', array('label' => 'Categoría', 'empty' => 'Seleccione...'));
	echo $this -> Form -> input('nombre');
	echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
	echo $this -> Form -> input('Product', array('label' => 'Productos', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Categoría'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
