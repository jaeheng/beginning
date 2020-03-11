<?php
/**
 * 2列布局列表
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}

// <!--面包屑导航-->
require_once View::getView('components/bread');
doAction('index_loglist_top'); ?>

<!--双栏列表-->
<div class="main container">
    <ul class="log_list log_list_2" id="log_list">
    <?php
    if (!empty($logs)):
        foreach($logs as $value):
            $imgsrc = getImgFromDesc($value['content']);
            ?>
        <li class="log_list_item">
            <a href="<?php echo $value['log_url']; ?>" class="pic-link"><img class="lazyload" src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo $imgsrc;?>" alt="<?php echo $value['log_title']; ?>"></a>
            <h2 class="title"><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>

            <div class="info">
                <?php echo gmdate('Y/m/d', $value['date']); ?>
                <span class="pull-right">
                    <i class="iconfont icon-view"></i> <?php echo nineplus($value['views']); ?>
                </span>
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
<!--双栏列表-->

<?php
include View::getView('footer');
?>
