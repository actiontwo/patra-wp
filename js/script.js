$(document).ready(function () {
    $('.slide-logo').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000
    });
//  Remove html slick-prev, slick-next
    $('.slick-prev').empty();
    $('.slick-next').empty();
//Reset tab-landing
    $('.sub-title').click(function(){
        $('.tab-content .tab-content .tab-pane.active').removeClass("active");
        $('.tab-content .tab-content .tab-landing').addClass("active");
        $('.nav-stacked li').removeClass("active");
    })
    var count = 0;
    $('.main-bxslider').bxSlider();

    $('.testimonials-bxSlider').bxSlider();

    $('#menu').slicknav({prependTo: '#main-menu'});

    $(window).resize(function () {
        if ($(this).width() > 1199) {
            $(".logo").css({"top": "0"});
        } else {
            if ($('.slicknav_btn').hasClass('activeMenu')) {
                $(".logo").css({"top": "0"});
            }
            else {
                $(".logo").css({"top": "-54px"});
            }
        }
    });

    $(".slicknav_btn").click(function () {
        count++;
        if (count % 2 != 0) {
            $(this).addClass('activeMenu');
            $(".slicknav_menu").css({"background-color": "#1ba2db"});
            $(".slicknav_btn").css({"background-color": "#1ba2db"});
            $(".logo").css({"top": "0"});
            $(".slicknav_icon-bar").css({"background-color": "#ffffff"});
            $(".contact-mobile .phone-mobile").hide();
            $(".contact-mobile ul").show();
        }
        else {
            $(this).removeClass('activeMenu');
            $(".logo").css({"top": "-54px"});
            $(".slicknav_menu").css({"background-color": "#ffffff"});
            $(".slicknav_btn").css({"background-color": "#ffffff"});
            $(".slicknav_icon-bar").css({"background-color": "#000000"});
            $(".contact-mobile .phone-mobile").show();
            $(".contact-mobile ul").hide();
        }
    });


    tab($('.tab-click-service'), $('.tab-pane-service'));
});

var tab = function (menuTab, contentTab) {

    menuTab.click(function () {
        menuTab.parent().removeClass('active');
        contentTab.hide().removeClass('active');
        var href = $(this).data('tab');
        $(this).parent().addClass('active');
        $(href).show().addClass('active');
    });
};