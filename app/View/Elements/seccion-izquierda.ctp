<div class="seccion_izquierda">
	<?php $categories= $this -> requestAction('/categories/get/'.$catalogId);
	 ?>
	<ul>
		<?php foreach($categories as $id =>$category):?>
		<li>
			<a href="/catalogs/view/<?php echo $catalogId?>/category:<?php echo $id;?>"><?php echo $category;?></a>
			<?php $subcategories= $this -> requestAction('/subcategories/get/'.$id); ?>
			<?php if($subcategories):?>
				<ul>
				<?php foreach($subcategories as $id2 =>$subcategory):?>
					<li>
						<a href="/catalogs/view/<?php echo $catalogId ?>/category:<?php echo $id;?>/subcategory:<?php echo $id2;?>"><?php echo $subcategory;?></a>
					</li>
				</ul>
				<?php endforeach; ?>
			<?php endif;?>
		</li>

		<?php endforeach; ?>
	</ul>
</div>