jQuery(document).ready(function($){
    var $layers = $('.parallax__layer');
    $(window).on('scroll', function(){
        var top = $(this).scrollTop();
        $layers.each(function(){
            var depth = $(this).data('depth') || 0;
            var movement = -(top * depth);
            $(this).css('transform','translate3d(0,'+movement+'px,0)');
        });
    });
});
