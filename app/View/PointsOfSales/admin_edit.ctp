<?php if(!$wizard) : ?>
<div class="pointsOfSales form">
	<?php echo $this -> Form -> create('PointsOfSale'); ?>

	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Modificar Punto De Venta ' . $this -> request -> data['PointsOfSale']['nombre']); ?></legend>
		<?php echo $this -> Form -> input('id'); ?>

		<br />
		<?php echo $this -> Form -> input('nombre'); ?>
		<br />
		<?php echo $this -> Form -> input('direccion', array('label' => 'Dirección')); ?>
		<br />
		<?php echo $this -> Form -> input('telefono', array('label' => 'Teléfono')); ?>
		<br />
		<?php echo $this -> Form -> input('lat', array('label' => 'Latitud')); ?>
		<br />
		<?php echo $this -> Form -> input('lng', array('label' => 'Longitud')); ?>
	</fieldset>
	<br />

	<?php echo $this -> Form -> end(__('Submit')); ?>
</div>
<?php endif; ?>
<div style="clear:both;"></div>
<div class="images" style="float: right; margin-right: 350px;">
	<h2>Subir imagenes del punto de venta<local></local></h2>
	<div class="preview"></div>
	<div id="model_class" rel="PointsOfSale"></div>
	<div id="foreign_key" rel="<?php echo $this -> request -> data['PointsOfSale']['id']; ?>"></div>
	<div id="multiple-upload" controller="points_of_sales"></div>
</div>
<div class="actions" style="max-width: 40%;">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<?php if($wizard) : ?>
		<li><?php echo $this -> Html -> link(__('Agregar Otro Punto De Venta'), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if(!$wizard) : ?>
		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('PointsOfSale.id')), null, __('¿Desea eliminar %s?', $this -> Form -> value('PointsOfSale.nombre'))); ?></li>
		<?php endif; ?>
		<li><?php echo $this -> Html -> link(__('Puntos De Ventas'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php echo $this -> element('Image/related'); ?>