<?php
/**
 * 搜索页面
 * Author: jaeheng <jaeheng@qq.com>
 */
if (!defined('EMLOG_ROOT')) exit('error!');?>

<!--面包屑导航-->
<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="bread-item">首页</a>
        <a class="bread-item">搜索 “ <?php echo $keyword;?> ” </a>
    </div>
</div>
<!--面包屑导航-->

<div class="container search-list">
    <?php doAction('index_loglist_top'); ?>
    <h1>包含搜索词 “ <?php echo $keyword;?> ” 的文章</h1>

    <p style="color: rgba(0,0,0,.3);">共搜索到 <?php echo $lognum;?> 篇文章</p>
    <ul class="search-list-ul" id="log_list" style="min-height: 400px;">
        <?php
        if (!empty($logs)):
            foreach($logs as $value):
                $isLock = !empty($value['password']);
                ?>
                <li class="search-list-item">
                    <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
                        <?php if ($isLock):?>
                            <i class="iconfont icon-lock"></i>
                        <?php
                        endif;
                        echo $value['log_title'];
                        ?>
                    </a>

                    <div class="pull-right">
                        <?php blog_sort($value['logid']); ?>
                        <?php echo gmdate('Y-m-d', $value['date']); ?>
                    </div>
                </li>
            <?php
            endforeach;
        else:
            ?>
            <li style="margin-top: 30px;">未找到 <br/>抱歉，没有符合您查询条件的结果。 <br/> <br/> <br/> <a href="<?php echo BLOG_URL;?>" class="btn btn-blue">回到首页</a></li>
        <?php endif;?>
    </ul>
    <!--分页-->
    <div class="pagination">
        <?php echo $page_url;?>
        <?php if ($total_pages > $page):?>
            <a class="next" href="<?php echo $pageurl . ($page + 1);?>">下一页</a>
        <?php endif;?>
    </div>
    <!--分页 ／-->
</div>

<?php include View::getView('footer'); ?>
