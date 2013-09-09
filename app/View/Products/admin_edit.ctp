<?php if(!$wizard) : ?>
<?php echo $this -> Html -> css('products'); ?>
<?php echo $this -> Html -> script('products'); ?>
<div class="products form">
	<?php echo $this -> Form -> create('Product'); ?>
	<div class="images" style="float: right; min-width: 400px;">
		<h2>Imagen</h2>
		<div id="ImagePreviewContainer"><img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Product']['image']; ?>" /></div>
		<div id="single-upload" controller="catalogs"></div>
	</div>
	<fieldset style="max-width: 60%;">
		<legend><?php echo __('Modificar Producto ' . $this -> request -> data['Product']['nombre']); ?></legend>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> hidden('image', array('id' => 'single-field'));
		echo $this -> Form -> input('brand_id', array('label' => 'Marca', 'empty' => 'Seleccione...'));
		//echo $this -> Form -> input('nombre');
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
	<?php echo $this -> Form -> end(__('Modificar')); ?>
</div>
<?php endif; ?>
<div style="clear:both;"></div>
<div class="images" style="float: right; margin-right: 350px;">
	<h2>Subir imagenes del producto</h2>
	<div class="preview"></div>
	<div id="model_class" rel="Product"></div>
	<div id="foreign_key" rel="<?php echo $this -> request -> data['Product']['id']; ?>"></div>
	<div id="multiple-upload" controller="products"></div>
</div>
<div class="actions" style="max-width: 40%;">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<?php if($wizard) : ?>
		<li><?php echo $this -> Html -> link(__('Agregar Otro Producto'), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if(!$wizard) : ?>
		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('Product.id')), null, __('¿Desea eliminar %s?', $this -> Form -> value('Product.nombre'))); ?></li>
		<?php endif; ?>
		<li><?php echo $this -> Html -> link(__('Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Subcategorías'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Subcategoría'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php echo $this -> element('Image/related'); ?>