<?php
/**
 * 阅读文章页面
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>

<!--面包屑导航-->
<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="bread-item">首页</a>
        <a class="bread-item"><?php echo $log_title; ?></a>
    </div>
</div>
<!--面包屑导航-->

<div class="main container">
    <div class="content-wrap">
        <div class="content" id="content">
            <div class="panel echo-log">
                <div class="panel-body">
                    <h1 class="log-title"><?php echo $log_title; ?><?php editable($logid, $author); ?></h1>
                    <div class="log-info">
                        <span><?php blog_author($author); ?></span>
                        <span><i class="iconfont icon-time"></i><?php echo gmdate('Y-m-d h:i:s', $date); ?></span>
                        <span><i class="iconfont icon-comment"></i><a href="#comments" class="comments"><?php echo $comnum; ?></a></span>
                        <span><i class="iconfont icon-view"></i><i class="view"><?php echo $views; ?></i></span>
                    </div>
                    <div class="log-body" id="log-body">
                        <?php echo $log_content; ?>

                        <div class="tags"><?php blog_tag($logid, true); ?></div>
                    </div>
                    <div class="copyright-notice">
                        <i class="iconfont icon-zhuanfa"></i>
                        <p>转载请注明出处:
                            <a href="<?php echo BLOG_URL;?>" target="_blank"><?php echo $blogname;?></a></p>
                        <p>本文的链接地址:
                            <a href="<?php echo Url::log($logid);?>" target="_blank"><?php echo Url::log($logid);?></a></p>
                    </div>
                    <div style="padding-top: 10px;">
                        <?php doAction('log_related', $logData); ?>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body neighbor">
                    <?php neighbor_log($neighborLog); ?>
                </div>
            </div>

            <!--相关文章-->
            <?php
            if (_g('relationLogs')):
            $relationLogs = getRelationLogs($sortid); ?>
            <div class="panel">
                <div class="panel-heading">
                    您可能对以下文章感兴趣
                </div>
                <div class="panel-body">
                    <div class="relation-log">
                        <ul>
                            <?php foreach($relationLogs as $value):?>
                                <li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/相关文章-->
            <?php endif;?>

            <?php blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark); ?>
            <?php blog_comments($comments); ?>
        </div>
    </div>
    <?php include View::getView('side'); ?>
    <div class="clearfix"></div>
</div>

<!--相册-->
<div class="album" id="album">
    <div class="shadow"></div>
    <div class="pic" id="album-pic"></div>
    <div class="ctrl" id="album-ctrl">
        <i class="iconfont icon-left" id="prev"></i>
        <i class="iconfont icon-right" id="next"></i>
        <i class="iconfont icon-close" id="close-album"></i>
    </div>
</div>
<!--相册 /-->
<?php include View::getView('footer'); ?>
