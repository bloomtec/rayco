<div class="texts form">
	<?php echo $this -> Form -> create('Text'); ?>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Modificar Texto'); ?></legend>
		<?php echo $this -> Form -> input('id'); ?>
		<?php echo $this -> Form -> input('text', array('label' => false)); ?>
	</fieldset>
	<br />
	<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<script>
	$(function() {
		CKEDITOR.replace('TextText');
	});
</script>