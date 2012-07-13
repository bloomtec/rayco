<div class="categories form">
<?php echo $this -> Form -> create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Categoría'); ?></legend>
	<?php
	echo $this -> Form -> input('catalog_id', array('label' => 'Catalogo', 'empty' => 'Seleccione...'));
	echo $this -> Form -> input('nombre');
	echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Categorías'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Catalogos'), array('controller' => 'catalogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
