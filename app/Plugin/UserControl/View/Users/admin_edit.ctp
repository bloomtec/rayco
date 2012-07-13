<div class="users form">
	<?php echo $this -> Form -> create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Modificar Usuario'); ?>
		</legend>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('email', array('label' => __('Correo', true)));
		echo $this -> Form -> input('nombres', array('label' => __('Nombre', true)));
		echo $this -> Form -> input('apellidos', array('label' => __('Apellido', true)));
		//echo $this -> Form -> input('password', array('label' => __('Contraseña', true), 'value' => ''));
		//echo $this -> Form -> input('verify_password', array('label' => __('Verificar Contraseña', true), 'type' => 'password', 'value' => ''));
		echo $this -> Form -> input('es_activo', array('label' => __('Activo', true)));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>

