(function (window, $) {
    "use strict";

    /**
     * 打开或关闭相应的元素
     * @param type true:打开 false:关闭
     * @param dom
     */
    var display = function (type, dom) {
        type ? dom.show() : dom.hide()
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
        display(true, menu);
    });

    var gotoup = $('#gotoup');

    /**
     * 页面滚动400px后显示gotoup按钮
     */
    $(window).on('scroll', function () {
        var topHeight = window.pageYOffset|| document.documentElement.scrollTop || document.body.scrollTop;

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
        $('body,html').animate({scrollTop:0},1000);
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
            })
        }, 5000);
    }

    // 存档折线图
    var archiveChart = document.getElementById('archive-chart');
    var data = $(archiveChart).data('value')
    var myChart = window.echarts.init(archiveChart)
    myChart.showLoading()
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
                data: data.x
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
        series: [
            {
                name: '文章数量',
                type: 'line',
                itemStyle : {
                    normal : {
                        color:'#333',
                        lineStyle:{
                            color:'#666'
                        }
                    }
                },
                data: data.y
            }
        ]
    }
    myChart.setOption(option)
    myChart.hideLoading()
    myChart.on('click', function (e) {
        window.location.href = '/?record=' + e.name
    })

})(window, jQuery);
