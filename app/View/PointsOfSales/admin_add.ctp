<div class="pointsOfSales form">
	<?php echo $this -> Form -> create('PointsOfSale'); ?>
	<?php
		/*<div class="images" style="float: right; min-width: 400px; max-height: 360px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><!--<img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Brand']['image']; ?>" />--></div>
		<div id="single-upload" controller="points_of_sales"></div>
		</div>*/
	?>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Agregar Punto De Venta'); ?></legend>

		<br />
		<?php echo $this -> Form -> input('nombre'); ?>
        <br />
        <?php echo $this -> Form -> input('email', array('label' => 'Email')); ?>
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

	<?php echo $this -> Form -> end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Puntos De Ventas'), array('action' => 'index')); ?></li>
	</ul>
</div>
