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
        <a href="" class="bread-item"><?php echo $log_title; ?></a>
    </div>
</div>
<!--面包屑导航-->

<div class="main container">
    <div class="content-wrap">
        <div class="content" id="content">
            <div class="panel echo_log">
                <div class="panel-body">
                    <h2 class="log-title"><?php echo $log_title; ?></h2>
                    <div class="log-info">
                        <span><i class="iconfont icon-user"></i><?php blog_author($author); ?></span>
                        <span><i class="iconfont icon-time"></i><?php echo gmdate('Y-n-j', $date); ?></span>
                        <span><i class="iconfont icon-comment"></i><a href="#comments"><?php echo $comnum; ?></a></span>
                        <span><i class="iconfont icon-view"></i><?php echo $views; ?></span>
                        <?php editflg($logid, $author); ?>
                    </div>
                    <div class="log-body" id="log-body">
                        <?php echo $log_content; ?>
                    </div>
                    <p class="tags">Tags: <?php blog_tag($logid); ?></p>
                    <div style="border-top: 1px solid #eee;padding-top: 10px;">
                        <?php doAction('log_related', $logData); ?>
                    </div>

                    <div class="relief">
                        <?php echo _g('relief'); ?>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <?php $the_author = get_author_by_uid($author); ?>
                    作者: <?php blog_author($author); ?>
                    <span class="pull-right"
                          style="font-size: 12px;">本文发布于<?php echo gmdate('Y-n-j h:i:s', $date); ?></span>
                </div>
                <div class="panel-body author">
                    <img src="<?php echo !empty($the_author['avatar']) ? BLOG_URL . $the_author['avatar'] : TEMPLATE_URL . 'static/images/default_avatar.png'; ?>"
                         alt="<?php echo $the_author['name']; ?>" class="avatar">
                    <p class="author-desc"><?php echo $the_author['des']; ?></p>
                    <a href="<?php echo _g('weibo'); ?>"><img
                                src="<?php echo TEMPLATE_URL; ?>/static/images/weibo_48_48.png" alt="作者的微博"
                                class="icon"></a>
                    <!--打赏-->
                    <?php if (_g('reward')): ?>
                        <button class="btn btn-danger i-reward" data-url="<?php echo TEMPLATE_URL; ?>">
                            <i class="iconfont icon-dashang"></i> 赞赏作者
                        </button>
                    <?php endif;?>
                    <!--/打赏-->
                </div>
            </div>

            <div class="panel">
                <div class="panel-body neighbor">
                    <?php neighbor_log($neighborLog); ?>
                </div>
            </div>

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
