jQuery(function($){$(".slick-slider").on("init",function(){console.log("delegating child events"),$(this).children.each(function(e){e.delegateEvents()})})}),jQuery(function($){$(".cards").slick({infinite:!0,slidesToShow:5,slidesToScroll:5,speed:300,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:769,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:601,settings:{slidesToShow:2,slidesToScroll:2,dots:!0}},{breakpoint:321,settings:{slidesToShow:1,slidesToScroll:1,dots:!0}}]})}),jQuery(function($){$(".home-completed-projects .card").mouseover(function(){var e=$(this).data("slick-index");$(".home1").hide(),$(".card").removeClass("card-active"),$(this).addClass("card-active"),$(".cslide"+e).show()}),$(".home-new-projects .card").mouseover(function(){var e=$(this).data("slick-index");$(".home3").hide(),$(".card").removeClass("card-active"),$(this).addClass("card-active"),$(".nslide"+e).show()})}),jQuery(function($){$(window).scroll(function(){$(".h-panel-l").css("transform","translate3d(0,"+2*$(this).scrollTop()+"px, 0)")}).scroll()}),jQuery(function($){$(".header-left").hide(),$(window).scroll(function(){var e=$(document).scrollTop(),o=1;e>1?($(".header-left").fadeIn(),$(".h-panel-content").fadeOut(),setTimeout(function(){$("body").removeClass("pre-anim")})):e<1&&($(".header-left").fadeOut(),$(".h-panel-content").fadeIn(),setTimeout(function(){$("body").addClass("pre-anim")}))})});var homePage=document.querySelector("header"),headroom2=new Headroom(homePage,{offset:1200,tolerance:5});headroom2.init();