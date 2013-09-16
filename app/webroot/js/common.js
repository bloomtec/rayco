(function ($) {
    $.event.special.load = {
        add: function (hollaback) {
            if ( this.nodeType === 1 && this.tagName.toLowerCase() === 'img' && this.src !== '' ) {
                // Image is already complete, fire the hollaback (fixes browser issues were cached
                // images isn't triggering the load event)
                if ( this.complete || this.readyState === 4 ) {
                    hollaback.handler.apply(this);
                }

                // Check if data URI images is supported, fire 'error' event if not
                else if ( this.readyState === 'uninitialized' && this.src.indexOf('data:') === 0 ) {
                    $(this).trigger('error');
                }

                else {
                    $(this).bind('load', hollaback.handler);
                }
            }
        }
    };
}(jQuery));




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