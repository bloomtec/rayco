<?php
/**
 *
 * File Browser Layout
 * Layout para la ventana que se abre como poppup 
 * cuando se quiere subir un archivo o un flash en el WYSIWYG
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __("Subir Recurso") ?>:
		
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('reset.css');
		echo $this->Html->css('Ez.file_browser');
		echo $this -> Html -> script('jquery.tools.min.js');
		echo $this -> Html -> script('bjs/bjs');
		echo $this -> Html -> script('Ez.ckeditor/ckeditor'); 
		echo $this -> Html -> script('Ez.ckeditor/adapters/jquery');
		echo $this -> Html -> script('Ez.ez');
		echo $this -> Html -> script("Ez.fileBrowser");
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>