$(function () {
    // target-open
    var isMobile = document.body.clientWidth < 960;

    // 全部打开或关闭
    // type ? '打开' : '关闭'
    var toggleOpenAll = function (type) {
        var toggleOpenDoms = $('.toggle-open');
        if (type) {
            toggleOpenDoms.each(function () {
                $('#' + $(this).data('target')).show();
            })
        } else {
            toggleOpenDoms.each(function () {
                $('#' + $(this).data('target')).slideUp(100);
            })
        }
    };

    $(window).resize(function (e) {
        isMobile = document.body.clientWidth < 960;
        toggleOpenAll(!isMobile)
    });

    // 点击其它地方， 关闭已经通过toggle-open打开的元素
    $(document).on('click', function () {
        if(isMobile) {
            toggleOpenAll(false)
        }
    });

    // 点击toggle-open的目标元素不触发toggle
    $('.toggle-open').each(function () {
        $('#' + $(this).data('target')).click(function (e) {
            e.stopPropagation();
        })
    });

    // 点击.toggle-open自己的时候阻止冒泡， 不触发slideup
    $(document).on('click', '.toggle-open', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var _this = $(this);
        var target = $('#' + _this.data('target'));
        target.slideToggle(100);
    });
});