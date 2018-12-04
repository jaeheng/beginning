<?php
/**
 * 3列布局列表
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}

if (blog_tool_ishome()) {
    require_once View::getView('components/notice');
} else {
    // <!--面包屑导航-->
    require_once View::getView('components/bread');
}
doAction('index_loglist_top'); ?>

<!--双栏列表-->
<div class="main container">
    <div class="content-wrap">
        <div class="content">
            <ul class="log_list log_list_three" id="log_list">
                <?php
                if (!empty($logs)):
                    foreach($logs as $value):
                        $isLock = !empty($value['password']);
                        $imgsrc = getImgFromDesc($value['content']);
                        ?>
                        <li class="log_list_item">
                            <div class="x-info">
                                <div class="item">
                                    <span class="views"><?php echo nineplus($value['comnum']); ?></span>
                                    评论
                                </div>
                                <div class="item">
                                    <span class="views"><?php echo nineplus($value['views']); ?></span>
                                    浏览
                                </div>
                            </div>
                            <h2 class="title"><a href="<?php echo $value['log_url']; ?>">
                                    <?php if ($isLock):?>
                                        <i class="iconfont icon-lock"></i>
                                    <?php
                                    endif;
                                    echo $value['log_title'];
                                    ?>
                                </a></h2>
                            <div class="info">
                                <?php blog_sort($value['logid']); ?>
                                <span class="pull-right"><?php echo gmdate('n.j', $value['date']); ?></span>
                                <?php blog_tag($value['logid']);?>
                            </div>
                        </li>
                    <?php
                    endforeach;
                else:
                    ?>
                    <li style="background-color: #fff;padding: 30px;">未找到 <br>抱歉，没有符合您查询条件的结果。</li>
                <?php endif;?>
                <li class="clear"></li>
            </ul>
            <!--分页-->
            <div class="pagination" id="pagenavi">
                <?php echo $page_url;?>
                <?php if ($total_pages > $page):?>
                    <a class="next" href="<?php echo $pageurl . ($page + 1);?>">下一页</a>
                <?php endif;?>
            </div>
            <!--分页 ／-->
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <?php widget_sort('网站板块'); ?>
        <?php widget_newcomm('最新评论'); ?>
    </div>
    <div class="clearfix"></div>
</div>
<!--双栏列表-->
<?php
include View::getView('footer');
?>
