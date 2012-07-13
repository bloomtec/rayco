$(document).ready(function() {
	
	/**
	 * Categoría
	 */
	$('#single-upload').uploadify({
		'swf' : '/swf/uploadify.swf',
		'checkExisting' : '/check-exists.php',
		'uploader' : '/uploadify.php',
		'buttonText' : 'Subir Imagen',
		'width' : 80,
		'height' : 20,
		'cancelImg' : '/img/uploadify-cancel.png',
		'multi' : false,
		//'debug' : true,
		'onUploadSuccess' : function(file, data, response) {
			if(response) {
				var name = file.name;
				$("#single-field").val(data);
				$.post("/images/uploadify_add", {
					'name' : data,
					'folder' : 'uploads',
					'multiple' : false
				}, function(ob) {
					ob = $.parseJSON(ob);
					if(ob.success) {
						$('#ImagePreview').remove();
						$("#ImagePreviewContainer").html('<img id="ImagePreview" src="/img/uploads/215x215/' + data + '" />');
					}				
				});
			}
		}
	});
	
	/**
	 * Multiples imagenes galería
	 */
	$('#multiple-upload').uploadify({
		'swf' : '/swf/uploadify.swf',
		'checkExisting' : '/check-exists.php',
		'uploader' : '/uploadify.php',
		'buttonText' : 'Subir Imagenes',
		'width' : 147,
		'height' : 37,
		'cancelImg' : '/img/uploadify-cancel.png',
		//'debug' : true,
		'onUploadSuccess' : function(file, data, response) {
			if(response) {
				var name = file.name;
				var fileName = data.split("/");
				fileName = fileName[(fileName.length - 1)];
				$.post("/images/uploadify_add", {
					'name' : fileName,
					'folder' : 'uploads',
					'multiple' : true,
					'model_class' : $('#model_class').attr('rel'),
					'foreign_key' : $('#foreign_key').attr('rel')
				}, function(ob) {
					ob = $.parseJSON(ob);
					if(ob.success) {
						var htmlData =
						'<tr><td>' 
						+ ob.image_id
						+ '</td><td><img src="/img/uploads/50x50/' + fileName + '"></td>'
						+ '<td></td>'
						+ '<td class="actions">'
						+ '<a href="/admin/images/view/' + ob.image_id + '">Ver</a>'
						+ '<a href="/admin/images/edit/' + ob.image_id + '">Modificar</a>'
						+ '<form method="post" style="display:none;" id="post_UploadedID'
						+ ob.image_id
						+ '" name="post_UploadedID' + ob.image_id + '" action="/admin/images/delete/' + ob.image_id + '/' + ob.model_class + '/' + ob.foreign_key + '">'
						+ '<input type="hidden" value="POST" name="_method"></form>'
						+ '<a href="#" onclick="if (confirm(\'¿Seguro desea eliminar la imagen #' + ob.image_id + '?\')) { document.post_UploadedID' + ob.image_id + '.submit(); } event.returnValue = false; return false;" href="#">Eliminar</a>'
						+ '</td></tr>';
						$('#RelatedImagesTableBody').append(htmlData);
					}
				});
			}
		}
	});
	
	/**
	 * Wizard
	 */
	$.each($('.single-uploads'), function(i, val) {
		$('#single-upload-' + val.id).uploadify({
			'swf' : '/swf/uploadify.swf',
			'checkExisting' : '/check-exists.php',
			'uploader' : '/uploadify.php',
			'buttonText' : 'Subir Imagen',
			'width' : 147,
			'height' : 37,
			'cancelImg' : '/img/uploadify-cancel.png',
			'multi' : false,
			//'debug' : true,
			'onUploadSuccess' : function(file, data, response) {
				if(response) {
					var name = file.name;
					var fileName = data.split("/");
					fileName = fileName[(fileName.length - 1)];
					$(val).val(fileName);
					$.post("/galleries/uploadify_add", {
						'name' : fileName,
						'folder' : 'uploads',
						'multiple' : false
					}, function(ob) {
						ob = $.parseJSON(ob);
						if(ob.success) {
							$('#preview-' + val.id).html('<img src="/img/uploads/215x215/' + data + '" />');
						}
					});
				}
			}
		});
	});

});
