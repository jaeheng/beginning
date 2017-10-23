(function (window) {
    "use strict";
    /**
     * 获取 dom 元素
     * @param tag
     * @returns {*}
     */
    var $ = function (tag) {
        var dom = 0;
        if (typeof tag === 'object') {
            return tag;
        } else if (tag.indexOf('#') > -1) {
            dom = document.getElementById(tag.split('#')[1]);
        }
        return dom;
    };

    /**
     * 绑定事件
     * @param event
     * @param dom
     * @param func
     */
    window.on = function (event, dom, func) {
      if (window.addEventListener) {
          dom.addEventListener(event, func);
      } else {
          dom.attachEvent('on' + event, func);
      }
    };

    /**
     * 打开或关闭相应的元素
     * @param type true:打开 false:关闭
     * @param dom
     */
    var display = function (type, dom) {
        if (type) {
            dom.style.display = 'block';
        } else {
            dom.style.display = 'none';
        }
    };

    var menu = $('#menu');

    /**
     * 非手机模式要保证显示菜单
     */
    window.on('resize', window, function () {
        var isMobile = document.body.clientWidth < 960;
        display(!isMobile, menu);
    });

    /**
     * 点击页面时，手机需要将菜单隐藏，PC 不用
     */
    window.on('click', document, function () {
        var isMobile = document.body.clientWidth < 960;
        display(!isMobile, menu);
    });

    /**
     * 点击菜单按钮， 打开菜单
     * 需阻止冒泡，要不就触发了document的click事件, 又把菜单给隐藏了
     */
    window.on('click', $('#open-menu'), function (e) {
        e.stopPropagation();
        display(true, menu);
    });

    var gotoup = $('#gotoup');

    /**
     * 页面滚动400px后显示gotoup按钮
     */
    window.on('scroll', window, function () {
        var topHeight = window.pageYOffset|| document.documentElement.scrollTop || document.body.scrollTop;

        if (topHeight > 400) {
            gotoup.style.display = 'block';
        } else {
            gotoup.style.display = 'none';
        }
    });

    /**
     * 回到顶部
     */
    window.on('click', gotoup, function () {
        var time = setInterval(function () {
            var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
            document.body.scrollTop = document.documentElement.scrollTop = scrollTop - 50;
            if (scrollTop < 1) {
                clearInterval(time);
            }
        }, 1);
    });

    // 首页动态提醒轮播
    var siteNotice = $('#site-notice');
    if (siteNotice) {
        var time = 1;
        var ul = siteNotice.children[0];
        var lis = ul.children;
        var len = lis.length;
        setInterval(function () {
            if (time >= len) {
                time = 0;
            }
            ul.style.top = -24 * time++ + 'px';
        }, 5000);
    }

})(window);
