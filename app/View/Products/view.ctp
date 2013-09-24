<div class="product-view">

	<h2 class="detalle_producto"><?php echo $product['Product']['referencia']; ?></h2>
		<div class="izq">
			<img class="imagen_principal main_image" src="/img/uploads/400x400/<?php echo $product['Product']['image']; ?>" />
			<div class="controls">
				<?php if(!empty($product['Image'])): ?>
					<a class="arrow-left"><img src="/img/arrow-left.png" /></a>
					<div class="scrollable">
						<div class="items">
							<a <?php  echo "class='current'"?>  href="#"><img src="/img/uploads/50x50/<?php echo $product['Product']['image'];?>" /></a>
							<?php foreach($product["Image"] as $i => $image):?>

								<a href="#"><img src="/img/uploads/50x50/<?php echo $image['image'];?>" /></a>
							<?php endforeach; ?>
						</div>
					</div>

					<a class="arrow-right"><img src="/img/arrow-right.png" /></a>
					<div style="clear:both;"></div>
				<?php endif; ?>
			</div>
			<?php /*
			<div class="controls">
				<a href=""><img src="/img/zoom_in.png" /></a>
				<a href=""><img src="/img/zoom_out.png" /></a>
				<a href=""><img src="/img/expand.png" /></a>
				<a href=""><img src="/img/contract.png" /></a>
			</div>
            */?>
		</div>
		<div class="der">
			<label>Marca:</label>
			<span class="marca"><?php echo $product['Brand']['nombre'] ?> </span>
			<br />
			<br />

			<label>Precio:</label>
			<span class="marca"><?php echo "$".number_format($product['Product']['precio'], 0, '.', '.');  ?> </span>
			<br />
			<br />

			<label>Aplicación:</label>
			<p class="descripcion">
				<?php echo $product['Product']['descripcion']; ?>

			</p>


		</div>
	<div style="clear:both;"></div>
</div>
<script type="text/javascript">
	$(function(){
		$(".scrollable").scrollable({
			next:".arrow-right",
			prev:".arrow-left"
		});

		$('.scrollable a').on('click',function(){
			$that = $(this);
			$that.parents('.controls').prev().animate({opacity:0},'fast',function(){
				$that.addClass('current').siblings().removeClass('current')
				newUrl = $that.children('img').attr('src').replace('50x50','360x360');
				$(this).attr('src', newUrl ).load(function(){

					$(this).animate({opacity:1},'fast');
				});
			});
		});



	});
</script>