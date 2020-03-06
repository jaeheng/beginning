(function (window, $) {
    "use strict";

    /**
     * 打开或关闭相应的元素
     * @param type true:打开 false:关闭
     * @param dom
     */
    var display = function (type, dom) {
        return type ? dom.show() : dom.hide();
    };

    var menu = $('#menu');

    /**
     * 非手机模式要保证显示菜单
     */
    $(window).resize(function () {
        var isMobile = document.body.clientWidth < 960;
        display(!isMobile, menu);
    });

    /**
     * 点击页面时，手机需要将菜单隐藏，PC 不用
     */
    $(document).on('click', function () {
        var isMobile = document.body.clientWidth < 960;
        display(!isMobile, menu);
    });

    /**
     * 点击菜单按钮， 打开菜单
     * 需阻止冒泡，要不就触发了document的click事件, 又把菜单给隐藏了
     */
    $('#open-menu').on('click', function (e) {
        e.stopPropagation();

        display(($(menu).css('display') !== 'block'), menu);
    });

    var gotoup = $('#gotoup');

    /**
     * 页面滚动400px后显示gotoup按钮
     */
    $(window).on('scroll', function () {
        var topHeight = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

        if (topHeight > 400) {
            display(true, gotoup);
        } else {
            display(false, gotoup);
        }
    });

    /**
     * 回到顶部
     */
    gotoup.on('click', function () {
        $('body,html').animate({scrollTop: 0}, 1000);
    });

    // 首页动态提醒轮播
    var siteNotice = $('#site-notice');
    if (siteNotice) {
        var time = 1;
        var ul = siteNotice.find('ul');
        var lis = siteNotice.find('li');
        var len = lis.length;
        setInterval(function () {
            if (time >= len) {
                time = 0;
            }
            ul.css({
                top: -24 * time++ + 'px'
            });
        }, 5000);
    }

    // 图片相册
    var album = $('#album');

    // 阻止图片链接跳转
    var logBody = $('#log-body');

    logBody.find('img').parent('a').click(function (e) {
        e.preventDefault();
    });
    // 点击图片后将文章中图片复制到相册盒子
    logBody.on('click', 'img', function (e) {
        e.stopPropagation();
        var activeSrc = $(e.target).attr('src');
        var imgs = logBody.find('img');
        var imgDom = [];
        imgs.each(function (index, item) {
            var src = $(item).attr('src');
            var img = '';
            if (activeSrc === src) {
                img = "<img src='" + src + "' class='active' />";
            } else {
                img = "<img src='" + src + "' />";
            }
            if ($.inArray(img, imgDom) === -1){
                imgDom.push(img);
            }
        });
        $('#album-pic').html(imgDom.join(''));
        album.fadeIn(100);
    });

    // 相册的控制逻辑
    var albumCtrl = $('#album-ctrl');
    var albumPic = $('#album-pic');
    albumCtrl.on('click', '#next', function () {
        var albumPicImg = albumPic.find('img');
        if (albumPicImg.length < 2) {
            return false;
        }
        var activeImg = $('#album-pic').find('img.active');
        if (activeImg.next().length) {
            activeImg.next().attr('class', 'active');
        } else {
            $(albumPicImg[0]).attr('class', 'active');
        }
        activeImg.removeClass('active');
    });

    albumCtrl.on('click', '#prev', function () {
        var albumPicImg = albumPic.find('img');
        if (albumPicImg.length < 2) {
            return false;
        }
        var activeImg = $('#album-pic').find('img.active');
        if (activeImg.prev().length) {
            activeImg.prev().attr('class', 'active');
        } else {
            $(albumPicImg[albumPicImg.length - 1]).addClass('active');
        }
        activeImg.removeClass('active');
    });

    albumCtrl.on('click', '#close-album', function () {
        album.hide();
    });
    album.on('click', '.shadow', function () {
        album.fadeOut(100);
    });

    // 滑动过 nav 之后， nav 贴到顶部
    var body = $('body');
    var nav = body.find('.nav');
    if (!body.hasClass('headerFixed')) {
        $(window).scroll(function (e) {
            var top = $(this).scrollTop();
            if (top > 200) {
                body.addClass('headerFixed');
            } else {
                body.removeClass('headerFixed');
            }
        });
    }
    prettyPrint();

    //弹出一个页面层
    $('.layer-reward').on('click', function(){
        var url = $(this).data('url');
        // //tab层
        layer.tab({
            area: ['323px', '320px'],
            shadeClose: true,
            tab: [{
                title: '微信',
                content: '<img src="' + url + '/static/images/wechatPay.png" style="display: block;margin: 0 auto;" height="256" alt="微信打赏">'
            }, {
                title: '支付宝',
                content: '<img src="' + url + '/static/images/alipay.jpg" style="display: block;margin: 0 auto;" height="256" alt="打赏作者">'
            }]
        });
    });

    var searchInput = $('.search-input');
    var searchForm = $('#search-form');
    searchInput.focus(function () {
        searchForm.addClass('active');
    });
    searchInput.blur(function () {
        searchForm.removeClass('active');
    });

    lazyload();

    /**
     * 搜索时判断关键字是否为空
     */
    $('#submit-btn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var keyword = $('#keyword').val();
        if (keyword === '') {
            layer.msg('关键字不可为空');
        } else {
            searchForm.submit();
        }
    });

    $('body').css({
        paddingTop: $('#nav').height()
    });


    $('#search-trigger').click(function (e) {
        e.preventDefault();
        searchForm.show();
        searchForm.find('input').val('').focus();
    });

    searchForm.find('input').blur(function () {
        searchForm.hide();
        $(this).val('');
    });
})(window, jQuery);
