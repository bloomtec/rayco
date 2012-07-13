$(function() {// CONFIGURACIONES JQUERYS PLUGINS

	$('textarea.editor').ckeditor(function() {

	}, {
		filebrowserUploadUrl : '/wysiwyg/upload.php',
		filebrowserBrowseUrl : '/admin/ez/options/fileBrowser',
		height : 350
	});
	
	$('textarea.editor2').ckeditor(function() {

	}, {
		filebrowserUploadUrl : '/wysiwyg/upload.php',
		filebrowserBrowseUrl : '/admin/ez/options/fileBrowser',
		toolbar : 'Dialog'
	});
	if($('textarea.editor2').length){
		var editor = $('textarea.editor2').ckeditorGet();		
		editor.on('pluginsLoaded', function(ev) {
			// If our custom dialog has not been registered, do that now.
			if(!CKEDITOR.dialog.exists('myDialog')) {
				// We need to do the following trick to find out the dialog
				// definition file URL path. In the real world, you would simply
				// point to an absolute path directly, like "/mydir/mydialog.js".
				var href = '/js/my_dialog.js';
				// Finally, register the dialog.
				CKEDITOR.dialog.add('myDialog', href);
			}

			// Register the command used to open the dialog.
			editor.addCommand('myDialogCmd', new CKEDITOR.dialogCommand('myDialog'));

			// Add the a custom toolbar buttons, which fires the above
			// command..
			editor.ui.addButton('MyButton', {
				label : 'Elementos',
				command : 'myDialogCmd'
			});
		});
	}
	
	
});