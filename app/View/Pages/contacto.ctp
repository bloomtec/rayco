<?php echo $this -> element('nuestros_productos');?>
<div class="info_content">
	<h1>Contácto</h1>
	<p>
		<strong>Correo electronico:</strong> info@rayco.com.co
		<br />
		<strong>Tel:</strong> (+57)(2)387 3479 <strong>Cel:</strong> (+57)309 451 2536
		<br />
		<strong>Dirección:</strong> Cra 100 13-90 - Cali, Valle del cauca, Colombia
	</p>
	<h2>Formulario de contácto</h2>
	<form>
		<p><span class="requerido">*</span> Campos requeridos</p>
		<fieldset>
			<div class="left">
				<label><span class="requerido">*</span>Nombre y apellido</label>
				<input type="text" />
				<label>Empresa</label>
				<input type="text" />
				<label><span class="requerido">*</span>Departamento</label>
				<input type="text" />
				<label><span class="requerido">*</span>Ciudad</label>
				<input type="text" />
				<label>teléfono</label>
				<input type="text" />
				<label><span class="requerido">*</span>Correo electrónico</label>
				<input type="text" />
			</div>
			<div class="right">
				<label>Preguntas o comentarios</label>
				<textarea></textarea>
				<input type="submit" value="enviar" class="enviar" />
				<input type="submit" value="Borrar todo" class="borrar" />
			</div>
			<div style="clear: both;"></div>
		</fieldset>
	</form>
</div>

<script>
	$(function(){
		$('#PageContactoForm').validator({ lang: 'es', position:"bottom left"});
	});
</script>