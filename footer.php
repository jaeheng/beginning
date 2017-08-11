<?php
/**
 * 页面底部信息
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<!--footer-->
<footer class="footer">
    <div class="container">
        <?php widget_hot_tag(); ?>
        <div class="widget">
            <h3>联系我们</h3>
            <div class="widget-inner">
                <p>Email: <a href="mailto:<?php echo $config['email']; ?>"><?php echo $config['email']; ?></a></p>
                <p>Weibo: <a href="<?php echo $config['weibo_url']; ?>"><?php echo $config['weibo_url']; ?></a></p>
                <p><?php if (Option::get('rss_output_num')): ?>
                        <a href="<?php echo BLOG_URL; ?>rss.php" title="RSS订阅">RSS订阅</a>
                    <?php endif; ?>
                    <?php doAction('index_footer'); ?>
                </p>
            </div>
        </div>
        <?php widget_link('合作伙伴'); ?>
    </div>
</footer>
<!--footer ／-->

<!--版权信息-->
<div class="copyright">
    Copyright &copy; <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> && <a href="http://zhangziheng.com"
                                                                                          target="_blank">jaeheng</a> |
    <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?> | Powered
    by <a href="http://www.emlog.net" title="采用emlog系统" target="_blank">emlog</a>
</div>
<!--版权信息 ／-->

<!--网站小工具-->
<div class="site-tools">
    <a href="<?php echo $config['gift'];?>" target="_blank" class="item"><i class="iconfont icon-gift"></i></a>
    <?php foreach ($config['qrcode'] as $value) : ?>
    <a href="javascript:;" class="item">
        <i class="iconfont icon-qrcode"></i>
        <div class="popup">
            <img src="<?php echo $value['url']; ?>" alt="<?php echo $value['title']; ?>">
            <h3 class="title"><?php echo $value['title']; ?></h3>
        </div>
    </a>
    <?php endforeach;?>
    <a href="http://wpa.qq.com/msgrd?v=3&uin=459269125&site=qq&menu=yes" class="item" target="_blank">
        <i class="iconfont icon-qq"></i>
    </a>
    <div class="item active gotoup" id="gotoup"><i class="iconfont icon-up"></i></div>
</div>
<!--网站小工具 ／-->
<script>
    !function(n){"use strict";var o=function(n){var o="";return"object"==typeof n?n:(n.indexOf("#")>-1&&(o=document.getElementById(n.split("#")[1])),o)};n.on=function(o,t,e){n.addEventListener?t.addEventListener(o,e):t.attachEvent("on"+o,e)};var t=function(n,o){o.style.display=n?"block":"none"},e=o("#menu");n.on("resize",n,function(){var n=document.body.clientWidth<960;t(!n,e)}),n.on("click",document,function(){var n=document.body.clientWidth<960;t(!n,e)}),n.on("click",o("#open-menu"),function(n){n.stopPropagation(),t(!0,e)});var c=o("#gotoup");n.on("scroll",n,function(){var o=n.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop;c.style.display=o>400?"block":"none"}),n.on("click",c,function(){var n=setInterval(function(){document.body.scrollTop-=50,0===document.body.scrollTop&&clearInterval(n)},1)});var i=o("#site-notice");if(i){var l=1,r=i.children[0],d=r.children,u=d.length;setInterval(function(){l>=u&&(l=0),r.style.top=-24*l+++"px"},5e3)}}(window);
</script>
</body>
</html>