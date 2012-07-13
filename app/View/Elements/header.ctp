<div id="header">
	<h1 class='logo'><a href="/"> PRICE SHOES </a></h1>
	<div class="left">
		<div id="buscar">
			<?php echo $this -> Form -> create("Product", array("action" => "search", "controller" => "products")); ?>
			<?php echo $this -> Form -> input("search", array("label" => false, 'class' => 'layout')); ?>
			<?php echo $this -> Form -> end('Buscar'); ?>
		</div>

		<ul class="opciones">
			<li>
				<?php
				if (!$this -> Session -> read("Auth.User.id")) {
					echo $this -> Html -> link("Mi Cuenta", array("controller" => "users", "action" => "login", 'plugin' => 'user_control'));
				} else {
					echo $this -> Html -> link("Mi Cuenta", array("controller" => "users", "action" => "profile", 'plugin' => 'user_control'));
				}
				?>
			</li>
			<li>
				<?php echo $this -> Html -> link("Mi Carrito", "/carrito", array('class' => 'cart')); ?>
			</li>
			<li>
				<?php
				if ($this -> Session -> read("Auth.User.id")) {
					echo $this -> Html -> link("Mis Favoritos", array("controller" => "pages", "action" => "favoritos", 'plugin' => false));
				}
				?>
			</li>
			<li>
				<?php
				if (!$this -> Session -> read("Auth.User.id")) {
					echo $this -> Html -> link("Registro", "/registro");
				} else {
					echo $this -> Html -> link("Salir", array('plugin' => 'user_control', "controller" => "users", "action" => "logout", 'admin' => false));
				}
				?>
			</li>

		</ul>
	</div>
	<div style="clear:both;"></div>
	<ul id="main-nav">
		
	</ul>
</div>