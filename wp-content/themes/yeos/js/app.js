(function ($, window, undefined) {
  'use strict';

    $(window).load(function () {


        $(".member-block .show-overlay").click(function(){
            $(this).closest(".member-block").find(".overlay").show().bind('mouseleave',function(){
                $(this).hide();
            });
        });

        $(".member-block .img").hover(function(){
            $(this).find(".meta").show().parent().bind('mouseleave',function(){
                $(this).find(".meta").hide();
            });
        });

    });

})(jQuery, this);
