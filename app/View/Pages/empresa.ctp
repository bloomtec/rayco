<?php echo $this -> element('nuestros_productos');?>
<div class="info_content">
	<h1>Empresa</h1>
	<p>
		<img src="/img/uploads/360x360/<?php echo $company["Company"]["imagen_1"]?>" />
		<?php echo $company["Company"]["parrafo_superior"]?>
		
	</p>
	<h2><?php echo $company["Company"]["titulo_1"]?></h2>
	<p>
		
		<?php echo $company["Company"]["parrafo_1"]?><
		
	</p>
	<h2><?php echo $company["Company"]["titulo_2"]?></h2>
	<p>
		<img src="/img/uploads/360x360/<?php echo $company["Company"]["imagen_2"]?>" />
		<?php echo $company["Company"]["parrafo_2"]?>
	</p>
	
	<a href="#" class="info_link">Contáctenos >>></a>
	
	<div style="clear: both;"></div>
	
</div>

