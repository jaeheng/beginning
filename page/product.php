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
            <p class="slogan">简洁大方，多种布局可供选择</p>
            <a href="javascript:;" class="btn btn-blue">立即下载</a>
            <span class="version">当前版本v2.5.3</span>
            <img src="<?php echo TEMPLATE_URL?>static/images/preview.png" class="preview">
        </div>
    </div>
    <div class="container p-content">
        <?php echo $log_content; ?>
    </div>
</div>
<?php
include View::getView('footer');
?>
