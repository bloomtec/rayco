$(function() {

	$('#ProductAdminAddForm').submit(function() {
		var valid = false
		$.each($('.radio'), function(key, data) {
			if ($(data).attr('checked'))
				valid = true;
		});
		if (!valid) {
			alert('Seleccione una categoría antes de intentar enviar el formulario.');
		}
		return valid;
	});

	var previous_cat = false;

	/**
	 * Manejar el hacer click sobre una categoría
	 */
	$('.radio').click(function() {
		var categoria_id = $(this).attr('cat');
		var count = 0;
		if (previous_cat != categoria_id) {
			$.each($('.sub_checkbox'), function(key, data) {
				var tmp_cat_id = $(data).attr('cat');
				var tmp_cat_vacia = $(data).attr('vacia');
				if (tmp_cat_id == categoria_id && tmp_cat_vacia == 1) {
					$(data).prop('checked', true);
				} else {
					$(data).removeProp('checked');
				}
			});
		}
		previous_cat = categoria_id;
	});

	/**
	 * Manejar el hacer click sobre una subcategoría
	 */
	$('.sub_checkbox').click(function() {

		var vacia = $(this).attr('vacia') == 1 ? true : false;
		var categoria_id = $(this).attr('cat');
		var checked = $(this).attr('checked') ? true : false;

		// Encontrar el radio button correspondiente y seleccionarlo
		var radio = null;
		$.each($('.radio'), function(key, data) {
			if ($(data).attr('cat') == categoria_id) {
				radio = $(data);
				radio.prop('checked', true);
			}
		});
		// Revisar si se hace click sobre la subcategoría vacía u otra
		if (vacia) {
			// Quitar la selección de todos los checkbox menos el actual
			$.each($('.sub_checkbox'), function(key, data) {
				$(data).removeProp('checked');
				if ($(data).attr('cat') == categoria_id && $(data).attr('vacia') == 1)
					$(data).prop('checked', true);
			});
		} else {
			$.each($('.sub_checkbox'), function(key, data) {
				// Quitar la selección del checkbox de la subcategoria vacía
				if ($(data).attr('cat') == categoria_id && $(data).attr('vacia') == 1)
					$(data).removeProp('checked');
				// Quitar la selección del checkbox si se es de otra categoría
				if ($(data).attr('cat') != categoria_id)
					$(data).removeProp('checked');
			});
			// Revisar si se dejó una subcategoría diferente a la vacía seleccionada
			var count = 0;
			$.each($('.sub_checkbox'), function(key, data) {
				// Quitar la selección del checkbox de la subcategoria vacía
				if ($(data).attr('cat') == categoria_id && $(data).prop('checked'))
					count++;
			});
			// Asignar la subcategoría vacía en la categoría actual si no hay otras subcategorías seleccionadas
			if (count == 0) {
				$.each($('.sub_checkbox'), function(key, data) {
					if ($(data).attr('cat') == categoria_id && $(data).attr('vacia') == 1)
						$(data).prop('checked', true);
				});
			}
		}
	});
}); 