<div class="footer">
	<ul>
		<li><a href="/locales">Puntos de atención</a></li>
		<li><a href="/empresa">Nosotros</a></li>
		<li><a href="/">Contactenos</a></li>
		<div style="clear:both;"></div>
	</ul>
	<!--<p>©2012 Rayco automotriz / Tel.: 555 55 55 / Cel.: 311 311 3111 / Calle 7 #47-53 / Santiago de Cali, Colombia</p>-->
	<?php
		$text = $this->requestAction('/texts/getText/2');
		echo $text['Text']['text'];
	?>
</div>
