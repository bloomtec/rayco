<a class="logo" href="/admin" alt="inicio">
<?php echo $this -> Html -> image('logo_cms.png');?>
</a>
<ul id="AdminMenu" class="sf-menu">
	<!-- USUARIOS -->
	<li>
		<?php
		echo $this -> Html -> link('Usuarios', array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'index'));
		?>
		<ul>
			<li>
				<?php
				echo $this -> Html -> link('Crear Usuario', array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'add'));
				?>
			</li>
		</ul>
	</li>
	<!-- CATALOGOS -->
	<li>
		<?php
		echo $this -> Html -> link('Catálogos', array('plugin' => false, 'controller' => 'catalogs', 'action' => 'index'));
		?>
	</li>
	<!-- CATEGORÍAS -->
	<li>
		<?php
		echo $this -> Html -> link('Categorías', array('plugin' => false, 'controller' => 'categories', 'action' => 'index'));
		?>
	</li>
	<!-- SUBCATEGORÍAS -->
	<li>
		<?php
		echo $this -> Html -> link('Subcategorías', array('plugin' => false, 'controller' => 'subcategories', 'action' => 'index'));
		?>
	</li>
	<!-- MARCAS -->
	<li>
		<?php
		echo $this -> Html -> link('Marcas', array('plugin' => false, 'controller' => 'brands', 'action' => 'index'));
		?>
	</li>
	<!-- PRODUCTOS -->
	<li>
		<?php
		echo $this -> Html -> link('Productos', array('plugin' => false, 'controller' => 'products', 'action' => 'index'));
		?>
	</li>
	<!-- LOGOUT -->
	<li>
		<?php
		echo $this -> Html -> link('Cerrar Sesión', array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'logout', 'admin' => true));
		?>
	</li>
	<div style="clear:both;"></div>
</ul>
<script>
	$(document).ready(function() {
		$("ul.sf-menu").superfish();
	}); 
</script>