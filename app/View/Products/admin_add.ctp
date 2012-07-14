<div class="products form">
	<?php echo $this -> Form -> create('Product'); ?>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><!--<img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Brand']['image']; ?>" />--></div>
		<div id="single-upload" controller="products"></div>
	</div>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Agregar Producto'); ?></legend>
		<?php
		echo $this -> Form -> hidden('image', array('id' => 'single-field'));
		echo $this -> Form -> input('brand_id', array('label' => 'Marca', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('nombre');
		echo $this -> Form -> input('referencia');
		echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
		echo $this -> Form -> input('es_visible', array('checked' => 'checked'));
		echo $this -> Form -> input('Subcategory', array('label' => 'Subcategorías', 'multiple' => 'checkbox'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this -> Html -> link(__('Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
