<div class="configs form">
	<?php echo $this -> Form -> create('Config'); ?>
	<fieldset>
		<legend><?php echo __('Modificar Configuración'); ?></legend>
		<?php
			echo $this -> Form -> input('id');
			echo $this -> Form -> input('email_contactenos', array('label' => 'Email de recepción formulario de contacto'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>