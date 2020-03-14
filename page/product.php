<?php
/**
 * 自建页面模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="product">
    <div class="jumbotron" style="background-color: #07111B;">
        <div class="container">
            <h2 class="title">Beginning for Emlog</h2>
            <p class="slogan">简洁大方，多种布局可供选择,非常适合个人博客,兼容官方Emlog6.0.0 <br />最新更新日期: 2020/03/14 </p>
            <a href="https://pan.baidu.com/s/1Qv9XOPxpfWv5EoX4gsPjLg" target="_blank" class="btn btn-blue">立即下载</a>
            <span class="version">当前版本:v2.6.1 提取码:78ke</span>
            <img src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo TEMPLATE_URL?>/preview.jpg" class="preview lazyload" style="background: #fff;">
        </div>
    </div>
    <div class="container p-content log-body" style="padding: 0 15px;">
        <?php echo $log_content; ?>
    </div>
</div>
<?php
include View::getView('footer');
?>
