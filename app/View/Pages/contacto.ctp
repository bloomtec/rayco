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
	<?php echo $this->Session->flash(); ?>
</div>

<script>
	$(function() {

		$.tools.validator.fn("[data-equals]", {
			en : 'Value mismatch with corresponding field',
			es : 'El valor difiere al del campo correspondiente'
		}, function(el, value) {
			return $('[name="' + el.attr('data-equals') + '"]').val() == value ? true : false;
		});

		$.tools.validator.localize("es", {
			'*' : 'Corrija el valor en este campo',
			':email' : 'Ingrese un correo electrónico válido',
			':number' : 'Ingrese un valor numérico',
			':radio' : 'Seleccione una opción',
			':url' : 'Ingrese una URL válida',
			'[max]' : 'Ingrese un valor no mayor a $1',
			'[min]' : 'Ingrese un valor mayor o igual a $1',
			'[required]' : 'Este campo es requerido'
		});

		$.tools.dateinput.localize("es",  {
			months: 'Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre',
			shortMonths:  'Ene,Feb,Mar,Abr,May,Jun,Jul,Ago,Sep,Oct,Nov,Dic',
			days:         'Domingo,Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
			shortDays:    'Dom,Lun,Mar,Mie,Jue,Vie,Sab'
		});

		$('form').validator({ lang: 'es', position: "bottom left"});
	});

</script>