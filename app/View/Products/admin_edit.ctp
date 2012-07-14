<?php if(!$wizard) : ?>
<div class="products form">
	<?php echo $this -> Form -> create('Product'); ?>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Product']['image']; ?>" /></div>
		<div id="single-upload" controller="catalogs"></div>
	</div>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Modificar Producto ' . $this -> request -> data['Product']['nombre']); ?></legend>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> hidden('image', array('id' => 'single-field'));
		echo $this -> Form -> input('brand_id', array('label' => 'Marca', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('nombre');
		echo $this -> Form -> input('referencia');
		echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
		echo $this -> Form -> input('es_visible', array('checked' => 'checked'));
		echo $this -> Form -> input('Subcategory', array('label' => 'Subcategorías', 'multiple' => 'checkbox'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<?php endif; ?>
<div style="clear:both;"></div>
<div class="images" style="float: right; margin-right: 350px;">
	<h2>Subir imagenes del producto</h2>
	<div class="preview"></div>
	<div id="model_class" rel="Product"></div>
	<div id="foreign_key" rel="<?php echo $this -> request -> data['Product']['id']; ?>"></div>
	<div id="multiple-upload" controller="products"></div>
</div>
<div class="actions" style="max-width: 40%;">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<?php if($wizard) : ?>
		<li><?php echo $this -> Html -> link(__('Agregar Otro Producto'), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if(!$wizard) : ?>
		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('Product.id')), null, __('¿Desea eliminar %s?', $this -> Form -> value('Product.nombre'))); ?></li>
		<?php endif; ?>
		<li><?php echo $this -> Html -> link(__('Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php echo $this -> element('Image/related'); ?>