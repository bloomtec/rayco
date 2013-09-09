<div class="seccion_izquierda">
	<div class="busqueda">
		<?php echo $this -> Form -> create('Catalog', array('id' => 'BusquedaProducto', 'action' => 'view/' . $this -> params['pass'][0])); ?>
		<div>
			<?php echo $this -> Form -> input('brand', array('label' => 'Marca', 'empty' => 'Todas')); ?>
			<?php echo $this -> Form -> input('referencia', array('value' => '', 'placeholder' => 'Ingrese total o parcialmente la referencia que busca', 'title' => 'Ingrese total o parcialmente la referencia que busca')); ?>
			<div sytle="clear:both;"></div>
		</div>
		<?php echo $this -> Form -> submit('Buscar'); ?>
		<div sytle="clear:both;"></div>
		<?php echo $this -> Form -> end(); ?>
		<style>
			#BusquedaProducto label {
				width: 70px;
				display: inline-block;
				font-size: 14px;
			}
			#BusquedaProducto select {
				font-size: small;
			    max-width: 140px;
			    min-width: 140px;
			}
			#BusquedaProducto input {
				font-size: small;
				margin-left: 2px;
    			max-width: 135px;
			}
			#BusquedaProducto .submit {

				float: right;
			    max-width: 70px;

			}
			#BusquedaProducto .submit input {
				font-size: small;
				background: #073f87;
				border: 0;
				color: white;
				padding: 5px;
			}
		</style>
	</div>
	<div class="listado">
		<?php $categories = $this -> requestAction('/categories/get/' . $catalogId); ?>
		<ul>
			<?php foreach($categories as $id =>$category): ?>
			<li class="<?php if( isset( $this -> request -> params['named']['category'] ) && $id == $this -> request -> params['named']['category'] ) echo "current" ?>">
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