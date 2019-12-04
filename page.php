<?php
/**
 * 自建页面模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
    <!--面包屑导航-->
    <div class="breadthumb">
        <div class="container">
            <a href="<?php echo BLOG_URL;?>" class="bread-item">首页</a>
            <a href="" class="bread-item"><?php echo $log_title; ?></a>
        </div>
    </div>
    <!--面包屑导航-->

    <div class="main container">
        <div class="content-wrap">
            <div class="content" id="content">
                <div class="panel echo_log">
                    <div class="panel-body">
                        <h2 class="log-title"><?php echo $log_title; ?><?php editable($logid, $author); ?></h2>
                        <div class="log-info">
                            <span><?php blog_author($author); ?></span>
                            <span><i class="iconfont icon-time"></i><?php echo gmdate('Y-m-d h:i:s', $date); ?></span>
                            <span><i class="iconfont icon-comment"></i><a href="#comments" class="comments"><?php echo $comnum; ?></a></span>
                            <span><i class="iconfont icon-view"></i><i class="view"><?php echo $views; ?></i></span>
                        </div>
                        <div class="log-body" id="log-body">
                            <?php echo $log_content; ?>
                        </div>
                    </div>
                </div>
                <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
                <?php blog_comments($comments); ?>
            </div>
        </div>
        <?php include View::getView('side');?>
        <div class="clearfix"></div>
    </div>
<?php
include View::getView('footer');
?>