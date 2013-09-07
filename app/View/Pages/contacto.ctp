<?php echo $this->element('nuestros_productos'); ?>
<div class="info_content">
	<h1>Contácto</h1>

	<?php echo $text; // Texto administrable de contacto ?>

	<h2>Formulario de contácto</h2>

	<form action="/pages/contacto" method="post">
	<p><span class="requerido">*</span> Campos requeridos</p>
	<fieldset>
		<div class="left">
			<label><span class="requerido">*</span>Nombre y apellido</label>
			<input type="text" name="data[Contacto][nombre_y_apellido]" required="required"/>
			<label>Empresa</label>
			<input type="text" name="data[Contacto][empresa]"/>
			<label><span class="requerido">*</span>Departamento</label>
			<input type="text" name="data[Contacto][departamento]" required="required"/>
			<label><span class="requerido">*</span>Ciudad</label>
			<input type="text" name="data[Contacto][ciudad]" required="required"/>
			<label>teléfono</label>
			<input type="text" name="data[Contacto][telefono]" />
			<label><span class="requerido">*</span>Correo electrónico</label>
			<input type="email" name="data[Contacto][email]" required="required"/>
		</div>
		<div class="right">
			<label><span class="requerido">*</span>Preguntas o comentarios</label>
			<textarea required="required" name="data[Contacto][mensaje]" MINLENGTH="50"> </textarea>
			<input type="submit" value="enviar" class="enviar"/>
			<input type="reset" value="Borrar todo" class="borrar"/>
		</div>
		<div style="clear: both;"></div>
	</fieldset>
	</form>
</div>

<script>
	$(function () {
		$('form').validator({ lang: 'es', position: "bottom left"});
	});
</script>