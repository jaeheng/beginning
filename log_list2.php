<?php
/**
 * 2列布局列表
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}

if (blog_tool_ishome()) {
    require_once View::getView('notice');
} else {
    // <!--面包屑导航-->
    require_once View::getView('bread');
}
doAction('index_loglist_top'); ?>

<!--双栏列表-->
<div class="main container">
    <ul class="log_list log_list_2">
    <?php
    if (!empty($logs)):
        foreach($logs as $value):
            $imgsrc = getImgFromDesc($value['content']);
            ?>
        <li class="log_list_item">
            <a href="<?php echo $value['log_url']; ?>" class="pic-link"><img src="<?php echo $imgsrc;?>" alt="<?php echo $value['log_title']; ?>"></a>
            <h2 class="title"><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>

            <div class="info">
                <i class="iconfont icon-time"></i> <span class="time"><?php echo gmdate('Y-n-j', $value['date']); ?></span>
                <i class="iconfont icon-view"></i> <span class="views"><?php echo $value['views']; ?></span>
                <?php editflg($value['logid'],$value['author']); ?>
            </div>
            <p class="description">
                <?php echo subString(strip_tags($value['log_description']),0,200);?>
            </p>
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
    </div>
    <!--分页 ／-->
</div>
<!--双栏列表-->

<?php
include View::getView('footer');
?>