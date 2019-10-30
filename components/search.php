<?php
/**
 * 搜索页面
 * Author: jaeheng <jaeheng@qq.com>
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
// 面包屑导航
require_once View::getView('components/bread');
doAction('index_loglist_top'); ?>

<div class="container">
    <div class="search">
        <ul class="log_list" id="log_list" style="min-height: 400px;">
            <?php
            if (!empty($logs)):
                foreach($logs as $value):
                    $isLock = !empty($value['password']);
                    $imgsrc = getFirstAtt($value['logid']);
                    if (!$imgsrc) {
                        $imgsrc = getImgFromDesc($value['content']);
                    }
                    ?>
                    <li class="log_list_item">
                        <a href="<?php echo $value['log_url']; ?>" class="pic-link">
                            <img class="lazyload" src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo $imgsrc;?>" alt="<?php echo $value['log_title']; ?>">
                        </a>
                        <h2 class="title">
                            <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
                                <?php if ($isLock):?>
                                    <i class="iconfont icon-lock"></i>
                                <?php
                                endif;
                                echo $value['log_title'];
                                ?>
                            </a>
                        </h2>

                        <div class="info">
                            <?php blog_sort($value['logid']); ?>
                            <i class="iconfont icon-view"></i> <span class="view"><?php echo $value['views']; ?></span>
                            <span class="pull-right"><?php echo gmdate('Y-m-d', $value['date']); ?></span>
                            <div class="b-tag"><?php blog_tag($value['logid']);?></div>
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
            <?php if ($total_pages > $page):?>
                <a class="next" href="<?php echo $pageurl . ($page + 1);?>">下一页</a>
            <?php endif;?>
        </div>
        <!--分页 ／-->
    </div>
</div>

<?php include View::getView('footer'); ?>