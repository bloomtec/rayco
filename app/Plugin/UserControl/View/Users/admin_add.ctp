<div class="users form">
	<?php echo $this -> Form -> create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Crear Usuario'); ?>
		</legend>
		<?php
		echo $this -> Form -> input('nombres', array('label' => __('Nombres', true)));
		echo $this -> Form -> input('apellidos', array('label' => __('Apellidos', true)));
		echo $this -> Form -> input('email', array('label' => __('Correo (con este correo ingresará a la aplicación)', true)));
		echo $this -> Form -> input('password', array('label' => __('Contraseña', true), 'value' => ''));
		echo $this -> Form -> input('verify_password', array('label' => __('Verificar Contraseña', true), 'type' => 'password', 'value' => ''));
		echo $this -> Form -> input('es_activo', array('label' => __('Activo', true), 'checked'=>'checked'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Crear')); ?>
</div>