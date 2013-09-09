<div class="seccion_izquierda">
	<div class="busqueda">
		<?php echo $this -> Form -> create('Catalog', array('id' => 'BusquedaProducto', 'action' => 'view/' . $this -> params['pass'][0])); ?>
		<?php echo $this -> Form -> input('brand', array('label' => 'Marca', 'empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('referencia', array('value' => '', 'placeholder' => 'Ingrese total o parcialmente la referencia que busca', 'title' => 'Ingrese total o parcialmente la referencia que busca')); ?>
		<?php echo $this -> Form -> submit('Buscar'); ?>
		<?php echo $this -> Form -> end(); ?>
		<style>
			#BusquedaProducto label {
				font-size: small;
			}
			#BusquedaProducto select {
				font-size: small;
			    margin-left: 12px;
			    max-width: 120px;
			    min-width: 120px;
			}
			#BusquedaProducto input {
				font-size: small;
				margin-left: 2px;
    			max-width: 114px;
			}
			#BusquedaProducto .submit {
				float: right;
			    left: 4px;
			    max-width: 70px;
			    position: relative;
			    top: -41px;
			}
			#BusquedaProducto .submit input {
				font-size: small;
			    height: 41px;
			    width: 54px;
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