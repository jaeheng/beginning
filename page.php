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
                        <h3 class="log-title"><?php echo $log_title; ?></h3>
                        <div class="log-info">
                            <span><i class="iconfont icon-user"></i><?php blog_author($author); ?></span>
                            <span><i class="iconfont icon-time"></i><i class="date"><?php echo gmdate('Y-n-j', $date); ?></i></span>
                            <span><i class="iconfont icon-comment"></i><a href="#comments" class="comments"><?php echo $comnum; ?></a></span>
                            <?php editflg($logid, $author); ?>
                        </div>
                        <div class="log-body" id="log-body">
                            <?php echo $log_content; ?>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <?php
                        $the_author = get_author_by_uid($author);?>
                        作者: <?php blog_author($author); ?>
                        <span class="pull-right">本文最后编辑于<?php echo gmdate('Y-n-j h:i:s', $date); ?></span>
                    </div>
                    <?php if (_g('showAuthor')): ?>
                    <div class="panel-body author">
                        <img src="<?php echo !empty($the_author['avatar']) ? BLOG_URL . $the_author['avatar'] : TEMPLATE_URL . 'static/images/default_avatar.png'; ?>" alt="<?php echo $the_author['name'];?>" class="avatar">
                        <p class="author-desc"><?php echo $the_author['des'];?></p>
                    </div>
                    <?php endif;?>
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