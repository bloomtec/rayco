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


});


$(function(){
    $(".scrollable").scrollable({
        next:".arrow-right",
        prev:".arrow-left"
    });
    $('.scrollable a').click(function(){
        $that = $(this);
        $that.parents('.controls').prev().find('img').animate({opacity:0},'fast',function(){
            $that.addClass('current').siblings().removeClass('current')
            $(this).attr('src',$that.children('img').attr('src').replace('50x50','360x360')).load(function(){
                $(this).animate({opacity:1},'fast');
            });
        });
    });



});

$(function() {

    // if the function argument is given to overlay,
    // it is assumed to be the onBeforeLoad event listener
    $("a.load[rel]").overlay({

        mask: '#000',
        effect: 'apple',

        onBeforeLoad: function() {

            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrap");

            // load the page specified in the trigger
            wrap.load(this.getTrigger().attr("href"));
        }

    });
});