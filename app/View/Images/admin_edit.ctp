<div class="images form">
	<?php echo $this -> Form -> create('Image'); ?>
	<fieldset>
		<legend><?php echo __('Modificar Imagen'); ?></legend>
		<div style="clear: both;"></div>
		<div id="imagen">
			<?php echo $this -> Html -> image('uploads/215x215/' . $this -> request -> data['Image']['image']); ?>
		</div>
		<div id="entradas">
			<?php
			echo $this -> Form -> input('id');
			echo $this -> Form -> hidden('model_class');
			echo $this -> Form -> hidden('foreign_key');
			echo $this -> Form -> hidden('image');
			echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
			?>
		</div>
		<div style="clear: both;"></div>
	</fieldset>
	<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<style>
	div#imagen {
		clear:none;
		max-width:400px;
		float:right;
	}
	div#entradas {
		clear:none;
		max-width:60%;
	}
	div#entradas *, div#imagen * {
		clear:none;
	}
</style>