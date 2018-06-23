$(function(){
    /*左侧导航栏加右竖线*/
    $windowH = $(window).outerHeight(true);
    $hearerH = $('.header').outerHeight(true);
    $footer = $('.footer').outerHeight(true);
    $mainH = $windowH-$hearerH-$footer;
    $rightH = $('.main_info').outerHeight(true);
    if ($mainH > $rightH) {
        $('.main').outerHeight($mainH);
    } else {
        $('.main').outerHeight($rightH);
    }

    $(".tensense_login_screen ul li").each(function(){
        $(this).css("opacity","0");
    });
    $(".tensense_login_screen ul li:first").css("opacity","1");
    var index = 0;
    var t;
    var li = $(".tensense_login_screen ul li");
    var number = li.size();
    function change(index){
        li.css("visibility","visible");
        li.eq(index).siblings().animate({opacity:0},3000);
        li.eq(index).animate({opacity:1},3000);
    }
    function show(){
        index = index + 1;
        if (index<=number-1){
            change(index);
        } else {
            index = 0;
            change(index);
        }
    }
    t = setInterval(show,1000);
    //根据窗口宽度生成图片宽度
    var width = $(window).width();
    if (width > 1000) {
        $(".tensense_login_screen ul img").css("width",width+"px");
    } else {
        $(".tensense_login_screen ul img").css("width","1000px");
    }

    /*点击个人信息拉开操作盘*/
    $('.user_info .operate').hide();
    $('.user_info').hover(function() {
        $('.user_info .operate').toggle();
    },function(){
        $('.user_info .operate').hide();
    });

    //导航栏
    $('.main_nav_extension').hide();
    $('.main_nav_title_big').click(function(){
        var _index = $(this).parent().index();
        $('.main_nav_extension#small' + _index).toggle(500);
        for (var i=0;i<4;i++) {
            if (_index != i) {
                $('.main_nav_extension#small' + i).hide(500);
            }
        }
    });
});

