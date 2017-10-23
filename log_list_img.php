<?php
/**
 * 图片模式列表
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
    <ul class="log_list log_list_img">
        <?php
        if (!empty($logs)):
            foreach ($logs as $value):
                $imgsrc = getImgFromDesc($value['content']);
                ?>
                <li class="log_list_item">
                    <a href="<?php echo $value['log_url']; ?>" class="img-link"
                       style="background-image: url('<?php echo $imgsrc;?>')" title="<?php echo $value['log_title']; ?>">
                        <h2 class="title"><?php echo $value['log_title']; ?> <span
                                    style="float: right;font-size: 14px;">上传于: <?php echo gmdate('Y-n-j', $value['date']); ?></span>
                        </h2>
                    </a>
                </li>
                <?php
            endforeach;
        else:
            ?>
            <li style="background-color: #fff;padding: 30px;">未找到 <br>抱歉，没有符合您查询条件的结果。</li>
        <?php endif; ?>
        <li class="clear"></li>
    </ul>
    <!--分页-->
    <div class="pagination" id="pagenavi">
        <?php echo $page_url; ?>
    </div>
    <!--分页 ／-->
</div>
<!--双栏列表-->

<?php include View::getView('footer'); ?>