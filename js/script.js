jQuery(document).ready(function () {
    jQuery('.slide-logo').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000
    });
//  Remove html slick-prev, slick-next
    jQuery('.slick-prev').empty();
    jQuery('.slick-next').empty();

//Reset tab-landing
    jQuery('.desktop-version .sub-title').click(function () {
        jQuery('.desktop-version .tab-content .tab-content .tab-pane.active').removeClass("active");
        jQuery('.desktop-version .tab-content .tab-content .tab-landing').addClass("active");
        jQuery('.desktop-version .nav-stacked li').removeClass("active");
    });
    var count = 0;
    jQuery('.main-bxslider').bxSlider({
        auto: true
    });
    jQuery('.portfolio-bxslider').bxSlider({
        minSlides: 1,
        maxSlides: 5,
        slideWidth: 178,
        slideMargin: 20,
        auto: true
    });
    jQuery('.portfolio-bxslider-mobis ul').bxSlider();

    jQuery('.testimonials-bxSlider').bxSlider({
        auto: true,
        adaptiveHeight: true
    });

    jQuery('#menu').slicknav({prependTo: '#main-menu'});

    jQuery(window).resize(function () {
        if (jQuery(this).width() > 992) {
            jQuery(".logo").css({"top": "0"});
            jQuery("body").removeClass('modal-open');
            jQuery('.modal').hide();
            jQuery('.process-list li .content').removeAttr('style');

        } else {
            if (jQuery('.slicknav_btn').hasClass('activeMenu')) {
                jQuery(".logo").css({"top": "0"});
            }
            else {
                jQuery(".logo").css({"top": "-54px"});
            }
        }
    });

    jQuery(".slicknav_btn").click(function () {
        count++;
        if (count % 2 != 0) {
            jQuery(this).addClass('activeMenu');
            jQuery(".slicknav_menu").css({"background-color": "#1ba2db"});
            jQuery(".slicknav_btn").css({"background-color": "#1ba2db"});
            jQuery(".logo").css({"top": "0"});
            jQuery(".slicknav_icon-bar").css({"background-color": "#ffffff"});
            jQuery(".contact-mobile .phone-mobile").hide();
            jQuery(".contact-mobile ul").show();
        }
        else {
            jQuery(this).removeClass('activeMenu');
            jQuery(".logo").css({"top": "-54px"});
            jQuery(".slicknav_menu").css({"background-color": "#ffffff"});
            jQuery(".slicknav_btn").css({"background-color": "#ffffff"});
            jQuery(".slicknav_icon-bar").css({"background-color": "#000000"});
            jQuery(".contact-mobile .phone-mobile").show();
            jQuery(".contact-mobile ul").hide();
        }
    });
    $('.navbar .sub-menu li a').click(function ()
    {
//        var url = window.location.protocol + "//" + window.location.host + $(this).find('a').attr('href');
        location.reload();
//        window.location.replace(url);
    });

    tab(jQuery('.tab-click-service'), jQuery('.tab-pane-service'));
    openEnquire();
    uploadImg();
    fileSelect();
    ajdustDropdownMenu();
    showInfoOurProcess();
});

var tab = function (menuTab, contentTab) {

    menuTab.click(function () {
        menuTab.parent().removeClass('active');
        contentTab.hide().removeClass('active');
        var href = jQuery(this).data('tab');
        jQuery(this).parent().addClass('active');
        jQuery(href).show().addClass('active');
    });
};

var openEnquire = function () {

    var btn = jQuery('.enquire');
    var btnMobile = jQuery('.iconsp-35-enquire-mobile').parent();
    var box = jQuery('.box-enquire');
    var cancel = jQuery('.box-enquire .btn-cancel');

    btn.click(function () {
        jQuery(window).scrollTop(0);
        box.slideToggle();
    });

    btnMobile.click(function () {
        jQuery(window).scrollTop(0);
        box.slideToggle();
        jQuery(".slicknav_btn").trigger('click');
    });
    cancel.click(function () {
        box.slideUp(200);
    });
};

var uploadImg = function () {
    var btnUpload = jQuery('.btn-upload');
    var uploadPanel = jQuery('#upload-panel');
    var close = jQuery('.close-panel');
    var save = uploadPanel.find('.btn-save');
    var check = jQuery('.check-image');

    btnUpload.click(function () {
        uploadPanel.fadeIn(200);
        jQuery(this).css({background: '#000', 'color': '#fff'});
        jQuery(window).scrollTop(0);
    });
    close.click(function () {
        uploadPanel.fadeOut(200).find('input').val('');
        btnUpload.removeAttr('style');

    });
    save.click(function () {
        uploadPanel.fadeOut(200);
        btnUpload.removeAttr('style');
        check.show();
    });
};
var fileSelect = function () {
    var file = jQuery(".fileImage");
    file.change(function () {
        var fileVal = jQuery(this).val().split('\\').pop();
        jQuery(this).parents('label').find('input[type="text"]').val(fileVal);
    });
    jQuery('.delete-img-path').click(function () {
        jQuery(this).parent().find('input').val('');
    });
};

var ajdustDropdownMenu = function () {
    var menu = jQuery('.service-hover');
    menu.each(function () {
        var submenu = jQuery(this).find('.sub-menu');
        var widthMain = jQuery(this).width() / 2;
        var widthSecond = submenu.width() / 2;
        submenu.css({left: -Math.abs(widthSecond - widthMain) / 2});
    });
};
var showInfoOurProcess = function () {
    var process = jQuery('.process-list li');
    process.click(function () {
        if (jQuery(window).width() < 992) {
            jQuery(this).find('.content').slideToggle();
        }
    });
};