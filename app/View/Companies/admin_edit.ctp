<div class="companies form">
	<?php echo $this->Form->create('Company');?>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen 1</h2>
		<div id="ImagePreviewContainer1">
			<?php
				if(
					isset($this -> request -> data['Company']['imagen_1'])
					&& !empty($this -> request -> data['Company']['imagen_1'])
				) :
			?>
			<img src="<?php echo '/img/uploads/360x360/' . $this -> request -> data['Company']['imagen_1']; ?>">
			<?php endif; ?>
		</div>
		<div id="single-upload-1" controller="companies"></div>
	</div>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen 2</h2>
		<div id="ImagePreviewContainer2">
			<?php
			if(
				isset($this -> request -> data['Company']['imagen_2'])
				&& !empty($this -> request -> data['Company']['imagen_2'])
			) :
				?>
				<img src="<?php echo '/img/uploads/360x360/' . $this -> request -> data['Company']['imagen_2']; ?>">
			<?php endif; ?>
		</div>
		<div id="single-upload-2" controller="companies"></div>
	</div>
	<fieldset>
		<legend><?php echo __('Modificar Compañía'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parrafo_superior');
		echo $this->Form->input('titulo_1');
		echo $this->Form->input('parrafo_1');
		echo $this->Form->hidden('imagen_1', array('id' => 'single-field-1'));
		echo $this->Form->input('titulo_2');
		echo $this->Form->input('parrafo_2');
		echo $this->Form->hidden('imagen_2', array('id' => 'single-field-2'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Modificar'));?>
</div>