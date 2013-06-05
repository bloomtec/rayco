/*global $*/
$(function () {
    'use strict';
    /**
     * Compañía
     */
    $('#single-upload-1').uploadify({
        'swf': '/swf/uploadify.swf',
        'checkExisting': '/check-exists.php',
        'uploader': '/uploadify.php',
        'buttonText': 'Subir Imagen',
        'width': 80,
        'height': 20,
        'cancelImg': '/img/uploadify-cancel.png',
        'multi': false,
        //'debug' : true,
        'onUploadSuccess': function (file, data, response) {
            if (response) {
                var name = file.name;
                $('#single-field-1').val(data);
                $.post('/images/uploadify_add', {
                    'name': data,
                    'folder': 'uploads',
                    'multiple': false
                }, function (ob) {
                    var parsedOb = $.parseJSON(ob);
                    if (parsedOb.success) {
                        $('#ImagePreviewContainer1').empty();
                        $('#ImagePreviewContainer1').html('<img id="ImagePreviewContainer1" src="/img/uploads/360x360/' + data + '" />');
                    }
                });
            }
        }
    });

    $('#single-upload-2').uploadify({
        'swf': '/swf/uploadify.swf',
        'checkExisting': '/check-exists.php',
        'uploader': '/uploadify.php',
        'buttonText': 'Subir Imagen',
        'width': 80,
        'height': 20,
        'cancelImg': '/img/uploadify-cancel.png',
        'multi': false,
        //'debug' : true,
        'onUploadSuccess': function (file, data, response) {
            if (response) {
                var name = file.name;
                $('#single-field-2').val(data);
                $.post('/images/uploadify_add', {
                    'name': data,
                    'folder': 'uploads',
                    'multiple': false
                }, function (ob) {
                    var parsedOb = $.parseJSON(ob);
                    if (parsedOb.success) {
                        $('#ImagePreviewContainer2').empty();
                        $('#ImagePreviewContainer2').html('<img id="ImagePreviewContainer1" src="/img/uploads/360x360/' + data + '" />');
                    }
                });
            }
        }
    });

    /**
     * Categoría
     */
    $('#single-upload').uploadify({
        'swf': '/swf/uploadify.swf',
        'checkExisting': '/check-exists.php',
        'uploader': '/uploadify.php',
        'buttonText': 'Subir Imagen',
        'width': 80,
        'height': 20,
        'cancelImg': '/img/uploadify-cancel.png',
        'multi': false,
        //'debug' : true,
        'onUploadSuccess': function (file, data, response) {
            if (response) {
                var name = file.name;
                $('#single-field').val(data);
                $.post('/images/uploadify_add', {
                    'name': data,
                    'folder': 'uploads',
                    'multiple': false
                }, function (ob) {
                    var parsedOb = $.parseJSON(ob);
                    if (parsedOb.success) {
                        $('#ImagePreview').remove();
                        $('#ImagePreviewContainer').html('<img id="ImagePreview" src="/img/uploads/215x215/' + data + '" />');
                    }
                });
            }
        }
    });

    /**
     * Multiples imagenes galería
     */
    $('#multiple-upload').uploadify({
        'swf': '/swf/uploadify.swf',
        'checkExisting': '/check-exists.php',
        'uploader': '/uploadify.php',
        'buttonText': 'Subir Imagenes',
        'width': 147,
        'height': 37,
        'cancelImg': '/img/uploadify-cancel.png',
        //'debug' : true,
        'onUploadSuccess': function (file, data, response) {
            if (response) {
                var name = file.name,
                    fileName = data.split('/');
                fileName = fileName[(fileName.length - 1)];
                $.post('/images/uploadify_add', {
                    'name': fileName,
                    'folder': 'uploads',
                    'multiple': true,
                    'model_class': $('#model_class').attr('rel'),
                    'foreign_key': $('#foreign_key').attr('rel')
                }, function (ob) {
                    var parsedOb = $.parseJSON(ob),
                        htmlData;
                    if (parsedOb.success) {
                        htmlData =
                            '<tr><td>'
                                + parsedOb.image_id
                                + '</td><td><img src="/img/uploads/50x50/' + fileName + '"></td>'
                                + '<td></td>'
                                + '<td class="actions">'
                                + '<a href="/admin/images/view/' + parsedOb.image_id + '">Ver</a>'
                                + '<a href="/admin/images/edit/' + parsedOb.image_id + '">Modificar</a>'
                                + '<form method="post" style="display:none;" id="post_UploadedID'
                                + parsedOb.image_id
                                + '" name="post_UploadedID' + parsedOb.image_id + '" action="/admin/images/delete/' + parsedOb.image_id + '/' + parsedOb.model_class + '/' + parsedOb.foreign_key + '">'
                                + '<input type="hidden" value="POST" name="_method"></form>'
                                + '<a href="#" onclick="if (confirm(\'¿Seguro desea eliminar la imagen #' + parsedOb.image_id + '?\')) { document.post_UploadedID' + parsedOb.image_id + '.submit(); } event.returnValue = false; return false;" href="#">Eliminar</a>'
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
    $.each($('.single-uploads'), function (i, val) {
        $('#single-upload-' + val.id).uploadify({
            'swf': '/swf/uploadify.swf',
            'checkExisting': '/check-exists.php',
            'uploader': '/uploadify.php',
            'buttonText': 'Subir Imagen',
            'width': 147,
            'height': 37,
            'cancelImg': '/img/uploadify-cancel.png',
            'multi': false,
            //'debug' : true,
            'onUploadSuccess': function (file, data, response) {
                if (response) {
                    var name = file.name,
                        fileName = data.split("/");
                    fileName = fileName[(fileName.length - 1)];
                    $(val).val(fileName);
                    $.post("/galleries/uploadify_add", {
                        'name': fileName,
                        'folder': 'uploads',
                        'multiple': false
                    }, function (ob) {
                        var parsedOb = $.parseJSON(ob);
                        if (parsedOb.success) {
                            $('#preview-' + val.id).html('<img src="/img/uploads/215x215/' + data + '" />');
                        }
                    });
                }
            }
        });
    });

});
