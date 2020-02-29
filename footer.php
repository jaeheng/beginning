<?php
/**
 * 页面底部信息
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<?php
if (blog_tool_ishome()) {
    doAction('only_index_footer');
}
?>
<!--footer-->
<footer class="footer">
    <div class="container">
        <?php widget_hot_tag(15); ?>
        <div class="widget">
            <h3>联系我们</h3>
            <div class="widget-inner">
                <?php if (!empty(_g('email'))): ?>
                    <p>
                        <i class="iconfont icon-email"></i>
                        <a href="mailto:<?php echo _g('email'); ?>" title="Email" target="_blank"><?php echo _g('email'); ?></a>
                    </p>
                <?php endif; ?>
                <?php if (!empty(_g('weibo'))): ?>
                    <p>
                        <i class="iconfont icon-weibo"></i>
                        <a href="<?php echo _g('weibo'); ?>" title="<?php echo _g('weibo'); ?>" target="_blank"><?php echo _g('weibo'); ?></a>
                    </p>
                <?php endif; ?>
                <?php if (Option::get('rss_output_num')): ?>
                    <p>
                        <i class="iconfont icon-rss"></i>
                        <a href="<?php echo BLOG_URL; ?>rss.php" title="RSS订阅" target="_blank">RSS订阅</a>
                    </p>
                <?php endif; ?>
                <?php if (!empty( _g('qq'))):?>
                    <p>
                        <i class="iconfont icon-qq"></i>
                        <a href="<?php echo 'http://wpa.qq.com/msgrd?v=3&uin=' . _g('qq') . '&site=qq&menu=yes';?>" target="_blank"><?php echo _g('qq');?></a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php widget_link('友情链接'); ?>
    </div>
</footer>
<!--footer ／-->

<!--版权信息-->
<div class="copyright">
    Copyright &copy; <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>
    <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>  Powered
    by <a href="http://www.emlog.net" title="采用emlog系统<?php echo Option::EMLOG_VERSION;?>" target="_blank">Emlog</a>
    <br>
    Theme by <a href="https://blog.zhangziheng.com" target="_blank">z-Pro <?php echo TPL_VERSION;?></a>
    <?php echo $footer_info; ?>
    <?php doAction('index_footer'); ?>
</div>
<!--版权信息 ／-->

<!--网站小工具-->
<div class="site-tools">
    <a href="javascript:;" class="item" target="_blank" id="search-trigger">
        <i class="iconfont icon-search"></i>
    </a>
    <?php
    if (_g('reward')): ?>
    <a href="javascript:;" class="item layer-reward" data-url="<?php echo TEMPLATE_URL; ?>">
        <i class="iconfont icon-coffee"></i>
    </a>
    <?php
    endif;
    ?>
    <div class="item active gotoup" id="gotoup"><i class="iconfont icon-up"></i></div>
</div>
<!--网站小工具 ／-->
<script src="<?php echo TEMPLATE_URL; ?>static/vendor/prettify.js" type="text/javascript"></script>
<link href="<?php echo TEMPLATE_URL; ?>static/vendor/prettify.css" rel="stylesheet" type="text/css" />

<script src="<?php echo TEMPLATE_URL; ?>static/vendor/layer/layer.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/vendor/lazyload.min.js" type="text/javascript"></script>
<?php if(_g('showEffect')):?>
<script src="<?php echo TEMPLATE_URL; ?>static/vendor/effect.js" type="text/javascript"></script>
<?php endif;?>
<script src="<?php echo TEMPLATE_URL;?>static/js/main.min.js?version=<?php echo TPL_VERSION;?>"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/vendor/jquery-ias.min.js" type="text/javascript"></script>
<script>
  $(function () {
    var ias = $.ias({
      container:  '#log_list',
      item:       '.log_list_item',
      pagination: '#pagenavi',
      next:       '#pagenavi .next'
    });
    ias.extension(new IASSpinnerExtension({
      html: '<div class="log-loading">Loading...</div>',
    }));
    ias.extension(new IASNoneLeftExtension({
      text: '<div class="log-loading">加载完毕!</div>',
    }));
    ias.on('rendered', function (items) {
      lazyload()
    });
  })
</script>
</body>
</html>
