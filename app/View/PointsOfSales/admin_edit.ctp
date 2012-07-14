<?php if(!$wizard) : ?>
<div class="pointsOfSales form">
	<?php echo $this -> Form -> create('PointsOfSale'); ?>
	<div class="images" style="float: right; min-width: 400px; max-height: 360px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['PointsOfSale']['image']; ?>" /></div>
		<div id="single-upload" controller="catalogs"></div>
	</div>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Modificar Punto De Venta ' . $this -> request -> data['PointsOfSale']['nombre']); ?></legend>
		<?php echo $this -> Form -> input('id'); ?>
		<br />
		<?php echo $this -> Form -> hidden('image', array('id' => 'single-field')); ?>
		<br />
		<?php echo $this -> Form -> input('nombre'); ?>
		<br />
		<?php echo $this -> Form -> input('direccion', array('label' => 'Dirección')); ?>
		<br />
		<?php echo $this -> Form -> input('telefono', array('label' => 'Teléfono')); ?>
	</fieldset>
	<br />
	<fieldset>
		<?php
		echo $this -> Form -> input('contenido', array('class' => 'editor'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Submit')); ?>
</div>
<?php endif; ?>
<div style="clear:both;"></div>
<div class="images" style="float: right; margin-right: 350px;">
	<h2>Subir imagenes del punto de venta</h2>
	<div class="preview"></div>
	<div id="model_class" rel="PointsOfSale"></div>
	<div id="foreign_key" rel="<?php echo $this -> request -> data['PointsOfSale']['id']; ?>"></div>
	<div id="multiple-upload" controller="products"></div>
</div>
<div class="actions" style="max-width: 40%;">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<?php if(!$wizard) : ?>
		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('PointsOfSale.id')), null, __('¿Desea eliminar %s?', $this -> Form -> value('PointsOfSale.nombre'))); ?></li>
		<?php endif; ?>
		<li><?php echo $this -> Html -> link(__('Puntos De Ventas'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php echo $this -> element('Image/related'); ?>