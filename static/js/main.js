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

    // 存档折线图
    var archiveChart = document.getElementById('archive-chart');
    if (archiveChart) {
        var data = $(archiveChart).data('value');
        var myChart = window.echarts.init(archiveChart);
        myChart.showLoading();
        var option = {
            calculable: true,
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            xAxis: [
                {
                    type: 'category',
                    data: data.x.reverse()
                }
            ],
            yAxis: [
                {
                    type: 'value',
                    scale: true,
                    name: '已发布'
                }
            ],
            dataZoom: [
                {
                    show: true,
                    type: 'slider'
                }
            ],
            grid: {
                left: '15%',
                right: '15%'
            },
            series: [
                {
                    name: '文章数量',
                    type: 'line',
                    itemStyle: {
                        normal: {
                            color: '#333',
                            lineStyle: {
                                color: '#666'
                            }
                        }
                    },
                    data: data.y.reverse()
                }
            ]
        };
        myChart.setOption(option);
        myChart.hideLoading();
        myChart.on('click', function (e) {
            window.location.href = '/?record=' + e.name;
        });
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

    var ias = jQuery.ias({
        container:  '#log_list',
        item:       '.log_list_item',
        pagination: '#pagenavi',
        next:       '#pagenavi .next'
    });
    ias.extension(new IASTriggerExtension({
        html: '<button class="btn btn-primary btn-block">加载更多</button>', // optionally
    }));
    ias.extension(new IASSpinnerExtension({
        html: '<div class="log-loading">Loading...</div>', // optionally
    }));
    ias.extension(new IASNoneLeftExtension({
        text: '<div class="log-loading">加载完毕!</div>', // optionally
    }));
})(window, jQuery);