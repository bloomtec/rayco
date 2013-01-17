<img class="solapa_content" src="/img/solapa_content.png"/>
<div class="nuestros_productos">
	<h1>Conozca nuestros productos:</h1>
	<ul>
		<li>
			<a <?php if($this -> Session -> read('catalog') == 1) echo 'class="current"'; ?> href="/catalogs/view/1">RAYCO AUTOMOTRIZ</a>
		</li>
		<li>
			<a <?php if($this -> Session -> read('catalog') == 2) echo 'class="current"'; ?> href="/catalogs/view/2">RAYLUJOS AUTOMOTRIZ</a>
		</li>
	</ul>
</div>