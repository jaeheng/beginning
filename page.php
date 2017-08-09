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
                            <i class="iconfont icon-user"></i>
                            <?php blog_author($author); ?>
                            <i class="iconfont icon-time"></i> <?php echo gmdate('Y-n-j', $date); ?>
                            <i class="iconfont icon-comment"></i> <a href="#comments"><?php echo $comnum;?></a>
                            <i class="iconfont icon-view"></i> <?php echo $views;?>
                            <?php editflg($logid,$author); ?>
                        </div>
                        <div class="log-body">
                            <?php echo $log_content; ?>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <?php $the_author = get_author_by_uid($author);?>
                        作者: <?php blog_author($author); ?>
                        <span class="pull-right">本文最后编辑于<?php echo gmdate('Y-n-j h:i:s', $date); ?></span>
                    </div>
                    <div class="panel-body author">
                        <img src="<?php echo $the_author['avatar'];?>" alt="<?php echo $the_author['name'];?>" class="avatar">
                        <p class="author-desc"><?php echo $the_author['des'];?></p>
                        <a href="<?php echo $config['weibo_url'];?>"><img src="<?php echo TEMPLATE_URL;?>/dist/images/weibo_48_48.png" alt="作者的微博" class="icon"></a>
                    </div>
                </div>
                <div class="panel comment-box">
                    <div class="panel-body">
                        <?php blog_comments($comments); ?>
                        <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include View::getView('side');?>
        <div class="clearfix"></div>
    </div>
<?php
include View::getView('footer');
?>