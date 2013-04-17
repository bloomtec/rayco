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
        <?php echo $this -> Form -> input('celular', array('label' => 'Celular')); ?>
	</fieldset>
	<br />

	<?php echo $this -> Form -> end(__('Submit')); ?>
</div>
<?php endif; ?>
<div style="clear:both;"></div>

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