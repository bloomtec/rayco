<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<?php echo $this->Html->charset(); ?>
	<?php /* if(isset($product)): ?>
	<meta property="og:title" content="<?php $product['Product']['name'] ?>" />
	<meta property="og:type" content="company" />
	<meta property="og:url" content="http://priceshoes.bloomweb.co/products/view/<?php echo $this -> params['pass'][0]."/".$this -> params['pass'][1] ?>" />
	<meta property="og:image" content="http://priceshoes.bloomweb.co/img/uploads" />
	<meta property="og:site_name" content="PriceShoes" />
	<meta property="og:description" content="<?php echo $product['Product']['description']?>"> 
	<meta property="fb:app_id" content="157362437721922" />
	<?php endif; */ ?>
	<title>
		<?php echo 'PriceShoes'?> :: 
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('reset');
		//echo $this->Html->css('ie');
		echo $this->Html->css('styles');
		
		echo $this->Html->Script('jquery.min');
		echo $this->Html->Script('jquery.tools.min');
		echo $this->Html->Script('bjs/bjs');
		echo $this->Html->Script('bcart');
		//echo $this->Html->Script('cufon');
		echo $this -> Html -> script('common'); 
		//echo $this->Html->Script('HelveticaNeueLT_LightExt2_400-HelveticaNeueLT_LightExt2_400.font');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script type="text/javascript"> 
	/*Cufon.now(); 
	Cufon.set('fontFamily', 'HelveticaNeueLT LightExt2').replace('body');*/
</script>
</head>
<body class="<?php echo $this -> action;?>">
	<div class="main_container">
		<?php echo $this -> element('header');?>
		<div id="content">
			<img class="solapa_content" src="/img/solapa_content.png"/>
			<div class="nuestros_productos">
				<h1>Conozca nuestros productos:</h1>
				<ul>
					<li><a href="#">RAYCO AUTOMOTRIZ</a></li>
					<li><a href="#">RAYLUJOS AUTOMOTRIZ</a></li>
				</ul>	
			</div>
			<div style="clear:both;"></div>
			<div class="marcas_wrapper">
				<div>
					<img src="/img/rayco.png">
					<p>
						Se llama luz (del latín lux, lucis) a la parte de la radiación electromagnética que puede ser percibida por el ojo humano....
					</p>
					<a href="#">VER PRODUCTOS</a>
					<img class="solapa" src="/img/solapa_marcas.png">
				</div>
				<div>
					<img src="/img/raylujos.png">
					<p>
						Se llama luz (del latín lux, lucis) a la parte de la radiación electromagnética que puede ser percibida por el ojo humano....
					</p>
					<a href="#">VER PRODUCTOS</a>
					<img class="solapa" src="/img/solapa_marcas.png">
				</div>
				<div style="clear:both;border:none;padding:0; height:0;"></div>
			</div>
			<div style="clear:both;"></div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<?php echo $this -> element('footer');?>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
</body>

</html>
