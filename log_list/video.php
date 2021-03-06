<?php
/**
 * 视频模式列表
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
// 面包屑导航
require_once View::getView('components/bread');
doAction('index_loglist_top'); ?>

<!--双栏列表-->
<div class="main container">
    <ul class="log_list log_list_mv" id="log_list">
        <?php
        if (!empty($logs)):
            foreach ($logs as $index => $value):
                $imgsrc = getImgFromDesc($value['content']);
                ?>
                <li class="log_list_item active">
                    <a href="<?php echo $value['log_url']; ?>" class="img-link">
                        <img class="lazyload" src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo $imgsrc;?>" alt="<?php echo $value['log_title']; ?>">
                        <div class="play">
                            <i class="iconfont icon-play"></i>
                        </div>
                    </a>
                    <h2 class="info">
                        <a href="<?php echo $value['log_url']; ?>"><?php echo topflag($value['top'], $value['sortop']) . $value['log_title']; ?></a>
                        <span class="fr"><i class="iconfont icon-tongji"></i><?php echo smartNum($value['views']); ?></span>
                    </h2>
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
        <?php echo $page_url;?>
        <?php if ($total_pages > $page):?>
            <a class="next" href="<?php echo $pageurl . ($page + 1);?>">下一页</a>
        <?php endif;?>
    </div>
    <!--分页 ／-->
</div>
<!--双栏列表-->

<?php include View::getView('footer'); ?>
