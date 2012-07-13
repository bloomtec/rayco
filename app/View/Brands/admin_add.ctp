<div class="brands form">
<?php echo $this -> Form -> create('Brand'); ?>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><!--<img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Brand']['image']; ?>" />--></div>
		<div id="single-upload" controller="catalogs"></div>
	</div>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Agregar Marca'); ?></legend>
	<?php
	echo $this -> Form -> hidden('image', array('id' => 'single-field'));
	echo $this -> Form -> input('nombre');
	echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Marcas'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
