<div class="seccion_izquierda">
	<div class="busqueda">
		<?php echo $this -> Form -> create('Catalog', array('id' => 'BusquedaProducto', 'action' => 'view/' . $this -> params['pass'][0])); ?>
		<?php echo $this -> Form -> input('brand', array('label' => 'Marca', 'empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('nombre', array('value' => '', 'placeholder' => 'Nombre que busca', 'title' => 'La busqueda corresponde con los productos relacionados a la vista actual.')); ?>
		<?php echo $this -> Form -> submit('Buscar'); ?>
		<?php echo $this -> Form -> end(); ?>
		<style>
			#BusquedaProducto label {
				font-size: small;
			}
			#BusquedaProducto select {
				font-size: small;
			    margin-left: 16px;
			    max-width: 120px;
			    min-width: 120px;
			}
			#BusquedaProducto input {
				font-size: small;
				margin-left: 7px;
    			max-width: 114px;
			}
			#BusquedaProducto .submit {
				float: right;
			    left: 4px;
			    max-width: 70px;
			    position: relative;
			    top: -49px;
			}
			#BusquedaProducto .submit input {
				font-size: small;
			    height: 49px;
			    width: 50px;
			}
		</style>
	</div>
	<div class="listado">
		<?php $categories = $this -> requestAction('/categories/get/' . $catalogId); ?>
		<ul>
			<?php foreach($categories as $id =>$category): ?>
			<li>
				<a href="/catalogs/view/<?php echo $catalogId?>/category:<?php echo $id;?>"><?php echo $category;?></a>
				<?php $subcategories= $this -> requestAction('/subcategories/get/'.$id); ?>
				<?php if($subcategories):?>
					<ul>
					<?php foreach($subcategories as $id2 =>$subcategory): ?>
						<?php if($subcategory != 'empty') : ?>
						<li>
							<a href="/catalogs/view/<?php echo $catalogId ?>/category:<?php echo $id;?>/subcategory:<?php echo $id2;?>"><?php echo $subcategory;?></a>
						</li>
						<?php endif; ?>
					<?php endforeach; ?>
					</ul>
				<?php endif;?>
			</li>
			<?php endforeach; ?>
	</ul>
	</div>
</div>