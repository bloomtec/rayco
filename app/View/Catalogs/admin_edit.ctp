<div class="catalogs form">
<?php echo $this -> Form -> create('Catalog'); ?>
	<div class="images" style="float:right; min-width: 400px">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Catalog']['image']; ?>" /></div>
		<div id="single-upload" controller="catalogs"></div>
	</div>
	<fieldset style="max-width:60%;">
		<legend><?php echo __('Modificar Catalogo ' . $this -> data['Catalog']['nombre']); ?></legend>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> hidden('image', array('id' => 'single-field'));
		echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
		?>
	</fieldset>
<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Catalogos'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Categorías'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Categoría'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
