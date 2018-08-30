<?php
/**
 * 自建页面模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="product">
    <div class="jumbotron">
        <div class="container">
            <h2 class="title">Beginning模版 for Emlog</h2>
            <p class="slogan">简洁大方，多种布局可供选择,非常适合个人博客</p>
            <a href="https://pan.baidu.com/s/13CMLBAkm7TrGI5vuR2Z-Kg" target="_blank" class="btn btn-blue">立即下载</a>
            <span class="version">当前版本v2.5.4</span>
            <img src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo TEMPLATE_URL?>static/images/preview.png" class="preview lazyload" style="background: #fff;">
        </div>
    </div>
    <div class="container p-content log-body" style="padding: 0 15px;">
        <?php echo $log_content; ?>
    </div>
</div>
<?php
include View::getView('footer');
?>
