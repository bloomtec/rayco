<?php echo $this -> element('nuestros_productos');?>
<div class="info_content">

	<h1>Empresa</h1>
	<p>
		<img src="/img/uploads/360x360/<?php echo $company["Company"]["imagen_1"]?>" />
		<?php echo $company["Company"]["parrafo_superior"]?>
		
	</p>


	<?php if(!empty( $company["Company"]["titulo_1"]) ): ?>
	<h2><?php echo $company["Company"]["titulo_1"]?></h2>
	<?php endif; ?>
	<?php if(!empty($company["Company"]["parrafo_1"])):?>
	<p>
		
		<?php echo $company["Company"]["parrafo_1"]?>
		
	</p>
	<?php endif;?>
	<?php if(!empty( $company["Company"]["titulo_2"]) ): ?>
	<h2><?php echo $company["Company"]["titulo_2"]?></h2>
	<?php endif; ?>
	<?php if(!empty($company["Company"]["parrafo_2"])):?>
	<p>
		<img src="/img/uploads/360x360/<?php echo $company["Company"]["imagen_2"]?>" />
		<?php echo $company["Company"]["parrafo_2"]?>
	</p>
	<?php endif;?>
	<a href="/contacto" class="info_link">Contáctenos >>></a>
	
	<div style="clear: both;"></div>
	
</div>

