<a class="logo" href="/admin" alt="inicio">
	<?php echo $this->Html->image('logo.png');?>
</a>
<ul id="AdminMenu" class="sf-menu">
	<!-- USUARIOS -->
	<li>
		<?php
		echo $this->Html->link('Usuarios', array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'index'));
		?>
		<ul>
			<li>
				<?php
				echo $this->Html->link('Agregar Usuario', array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'add'));
				?>
			</li>
		</ul>
	</li>
	<!-- COMPAÑÍA -->
	<li>
		<?php
		echo $this->Html->link('Compañía', array('plugin' => false, 'controller' => 'companies', 'action' => 'index'));
		?>
	</li>
	<!-- CATALOGOS -->
	<li>
		<?php
		echo $this->Html->link('Catálogos', array('plugin' => false, 'controller' => 'catalogs', 'action' => 'index'));
		?>
		<ul>
			<li>
				<?php
				echo $this->Html->link('Categorías', array('plugin' => false, 'controller' => 'categories', 'action' => 'index'));
				?>
				<ul>
					<li>
						<?php
						echo $this->Html->link('Agregar Categoría', array('plugin' => false, 'controller' => 'categories', 'action' => 'add'));
						?>
					</li>
				</ul>
			</li>
			<!-- SUBCATEGORÍAS -->
			<li>
				<?php
				echo $this->Html->link('Subcategorías', array('plugin' => false, 'controller' => 'subcategories', 'action' => 'index'));
				?>
				<ul>
					<li>
						<?php
						echo $this->Html->link('Agregar Subcategoría', array('plugin' => false, 'controller' => 'subcategories', 'action' => 'add'));
						?>
					</li>
				</ul>
			</li>
			<!-- MARCAS -->
			<li>
				<?php
				echo $this->Html->link('Marcas', array('plugin' => false, 'controller' => 'brands', 'action' => 'index'));
				?>
			</li>
			<!-- PRODUCTOS -->
			<li>
				<?php
				echo $this->Html->link('Productos', array('plugin' => false, 'controller' => 'products', 'action' => 'index'));
				?>
				<ul>
					<li>
						<?php
						echo $this->Html->link('Agregar Producto', array('plugin' => false, 'controller' => 'products', 'action' => 'add'));
						?>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<!-- CATEGORÍAS -->

	<!-- PUNTOS DE VENTAS -->
	<li>
		<?php
		echo $this->Html->link('Puntos De Ventas', array('plugin' => false, 'controller' => 'points_of_sales', 'action' => 'index'));
		?>
		<ul>
			<li>
				<?php
				echo $this->Html->link('Agregar Punto De Venta', array('plugin' => false, 'controller' => 'points_of_sales', 'action' => 'add'));
				?>
			</li>
		</ul>
	</li>
	<!-- TEXTOS ADMINISTRABLES -->
	<li>
		<?php
			echo $this->Html->link('Textos', '#');
		?>
		<ul>
			<li>
				<?php
					echo $this->Html->link('Contacto', array('plugin' => false, 'controller' => 'texts', 'action' => 'edit', 1));
				?>
			</li>
		</ul>
	</li>
	<!-- LOGOUT -->
	<li>
		<?php
		echo $this->Html->link('Cerrar Sesión', array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'logout', 'admin' => true));
		?>
	</li>
	<div style="clear:both;"></div>
</ul>
<script>
	$(document).ready(function () {
		$("ul.sf-menu").superfish();
	});
</script>