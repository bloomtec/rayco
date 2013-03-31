<?php echo $this -> Html -> css('products'); ?>
<?php echo $this -> Html -> script('products'); ?>
<div class="products form">
	<?php echo $this -> Form -> create('Product'); ?>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"></div>
		<div id="single-upload" controller="products"></div>
	</div>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Agregar Producto'); ?></legend>
		<?php
			echo $this -> Form -> hidden('image', array('id' => 'single-field'));
			echo $this -> Form -> input('brand_id', array('label' => 'Marca', 'empty' => 'Seleccione...'));
			echo $this -> Form -> input('nombre');
			echo $this -> Form -> input('referencia');
			echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
			echo $this -> Form -> input('es_visible', array('checked' => 'checked'));
		?>
		<div class="categorias">
			<input id="CategoryCategory" type="hidden" value="" name="data[Category][Category]">
			<input id="SubcategorySubcategory" type="hidden" value="" name="data[Subcategory][Subcategory]">
			<h4>Categorías - Subcategorías</h4>
			<?php foreach($categories as $key => $category) : ?>
			<div class="category-section">
				<div class="category">
					<?php
						$category_selected = false;
						if(isset($this -> request -> data['Category']['Category']) && is_array($this -> request -> data['Category']['Category']) && in_array($category['Category']['id'], $this -> request -> data['Category']['Category'])) $category_selected = true;
					?>
					<input class="radio" cat="<?php echo $category['Category']['id']; ?>" type="radio" id="CategoryCategory<?php echo $category['Category']['id']; ?>" name="data[Category][Category][]" value="<?php echo $category['Category']['id']; ?>" <?php if($category_selected) echo 'checked="checked"'; ?> /><?php echo $category['Category']['nombre']; ?><br />
				</div>
				<div class="subcategories">
					<div class="input select">
						<?php foreach ($category['Subcategory'] as $key => $subcategory) : ?>
							<div class="checkbox">
								<?php
									$subcategory_selected = false;
									if(isset($this -> request -> data['Subcategory']['Subcategory']) && is_array($this -> request -> data['Subcategory']['Subcategory']) && in_array($subcategory['id'], $this -> request -> data['Subcategory']['Subcategory'])) $subcategory_selected = true;
									$subcategory_empty = false;
									if($subcategory['nombre'] == 'empty') $subcategory_empty = true;
								?>
								<input class="sub_checkbox" cat="<?php echo $category['Category']['id']; ?>" vacia="<?php if($subcategory_empty) { echo '1'; } else { echo '0'; } ?>" type="checkbox" id="SubcategorySubcategory<?php echo $subcategory['id']; ?>" value="<?php echo $subcategory['id']; ?>" name="data[Subcategory][Subcategory][]" <?php if($subcategory_selected) echo 'checked="checked"'; ?> /><?php if($subcategory_empty) { echo 'Sin Subcategoría'; } else { echo $subcategory['nombre']; } ?><br />
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</fieldset>
	<?php echo $this -> Form -> end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php //debug($this -> request -> data); ?>