(function(e,t,n){"use strict";e(t).load(function(){e(".member-block .show-overlay").click(function(){e(this).closest(".member-block").find(".overlay").show().bind("mouseleave",function(){e(this).hide()})});e(".member-block .img").hover(function(){e(this).find(".meta").show().parent().bind("mouseleave",function(){e(this).find(".meta").hide()})})})})(jQuery,this);