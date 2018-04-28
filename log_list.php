<?php
/**
 * 站点首页模板
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

<div class="main container">
    <div class="content-wrap">
        <div class="content" id="content">
            <ul class="log_list" style="min-height: 400px;">
                <?php
                if (!empty($logs)):
                    foreach($logs as $value):
                        $imgsrc = getFirstAtt($value['logid']);
                        if (!$imgsrc) {
                            $imgsrc = getImgFromDesc($value['content']);
                        }
                        ?>
                        <li class="log_list_item">
                            <a href="<?php echo $value['log_url']; ?>" class="pic-link"><img src="<?php echo $imgsrc;?>" alt="<?php echo $value['log_title']; ?>"></a>
                            <h2 class="title">
                                <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
                                    <?php echo $value['log_title']; ?>
                                </a>
                            </h2>
                            <div class="description">
                                <?php echo $value['log_description'];?>
                            </div>

                            <div class="info">
                                <?php blog_sort($value['logid']); ?>
                                <i class="iconfont icon-time"></i> <span class="time"><?php echo gmdate('Y-n-j', $value['date']); ?></span>
                                <i class="iconfont icon-comment"></i> <span class="view"><?php echo $value['comnum']; ?></span>
                                <i class="iconfont icon-tongji"></i> <span class="view"><?php echo $value['views']; ?></span>
                                <a href="<?php echo $value['log_url']; ?>" class="fr">查看文章 <i class="iconfont icon-right"></i></a>
                                <?php editflg($value['logid'],$value['author']); ?>
                            </div>
                        </li>
                        <?php
                    endforeach;
                else:
                    ?>
                    <li style="background-color: #fff;padding: 30px;">未找到 <br>抱歉，没有符合您查询条件的结果。</li>
                <?php endif;?>
            </ul>
            <!--分页-->
            <div class="pagination" id="pagenavi">
                <?php echo $page_url;?>
            </div>
            <!--分页 ／-->
        </div>
    </div>
    <?php include View::getView('side');?>
    <div class="clearfix"></div>
</div>

<?php include View::getView('footer'); ?>