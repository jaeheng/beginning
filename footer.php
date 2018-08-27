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
                <p>Email: <a href="mailto:<?php echo _g('email'); ?>" class="fr"><?php echo _g('email'); ?></a></p>
                <p>Weibo: <a href="<?php echo _g('weibo'); ?>" class="fr"><?php echo _g('weibo'); ?></a></p>
                <p><?php if (Option::get('rss_output_num')): ?>
                        <a href="<?php echo BLOG_URL; ?>rss.php" title="RSS订阅">RSS订阅</a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <?php widget_link('友情链接'); ?>
    </div>
</footer>
<!--footer ／-->

<!--版权信息-->
<div class="copyright">
    Copyright &copy; <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> |
    <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> | Powered
    by <a href="http://www.emlog.net" title="采用emlog系统<?php echo Option::EMLOG_VERSION;?>" target="_blank">Emlog</a> |
    Theme by <a href="http://zhangziheng.com" target="_blank">beginning <?php echo $beginningVersion;?></a>
    <?php echo $footer_info; ?>
    <?php doAction('index_footer'); ?>
</div>
<!--版权信息 ／-->

<!--网站小工具-->
<div class="site-tools">
    <a href="<?php echo _g('gift');?>" class="item" target="_blank">
        <i class="iconfont icon-gift"></i>
    </a>
    <?php foreach (getconfig('qrcode') as $value) : ?>
    <a href="javascript:;" class="item">
        <i class="iconfont <?php echo $value['icon'];?>"></i>
        <div class="popup">
            <img src="<?php echo $value['url']; ?>" alt="<?php echo $value['title']; ?>">
            <h3 class="title"><?php echo $value['title']; ?></h3>
        </div>
    </a>
    <?php endforeach;?>
    <a href="<?php echo 'http://wpa.qq.com/msgrd?v=3&uin=' . _g('qq') . '&site=qq&menu=yes';?>" class="item" target="_blank">
        <i class="iconfont icon-qq"></i>
    </a>
    <div class="item active gotoup" id="gotoup"><i class="iconfont icon-up"></i></div>
</div>
<!--网站小工具 ／-->
<script src="<?php echo TEMPLATE_URL;?>/static/vendor/echarts.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>/static/vendor/prettify.js" type="text/javascript"></script>
<link href="<?php echo TEMPLATE_URL; ?>/static/vendor/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo TEMPLATE_URL; ?>/static/vendor/jquery-ias.min.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>/static/vendor/layer/layer.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>/static/vendor/lazyload.min.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL;?>/static/js/main.min.js?version=<?php echo $beginningVersion;?>"></script>
</body>
</html>