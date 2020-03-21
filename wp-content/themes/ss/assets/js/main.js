jQuery(document).ready(function(){
    jQuery(".img-area").css('filter', 'blur(0px)', 'z-index', '2');
    jQuery(".load-icon").css('display', 'none', 'z-index', '1');
    jQuery('.gallery-thumb img').on("click", function(){
        var src = jQuery(this).data('src');
        jQuery(".img-area").css('filter', 'blur(8px)', 'z-index', '2');
        jQuery(".load-icon").css('display', 'block', 'z-index', '3');
        // jQuery(".img-area").attr('src', 'assets/images/loading.gif');
        setTimeout(function() {
            jQuery(".img-area").css('filter', 'blur(0px)', 'z-index', '3').attr('src', src);
            jQuery(".load-icon").css('display', 'none', 'z-index', '2');
        }, 1000);
    });
});
