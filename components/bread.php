<?php
/**
 * 面包屑导航
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!--面包屑导航-->
<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="bread-item" title="返回首页">首页</a><!-- 首页 -->
        <?php if (isset($tag)):?>
            <a class="bread-item">包含“ <?php echo $tag; ?> ”话题的文章</a><!-- 标签 -->
        <?php elseif (isset($sortid)): ?>
            <?php global $CACHE; $sort_cache = $CACHE->readCache('sort'); ?>
            <?php  $pid = $sort_cache[$sortid]['pid'];?>
            <?php if($pid != 0):?>
                <a class="bread-item" href="<?php echo Url::sort($pid); ?>"><?php echo $sort_cache[$pid]['sortname'];?></a>
                <a class="bread-item" href="<?php echo Url::sort($sortid); ?>"><?php echo $sort_cache[$sortid]['sortname']; ?></a><!-- 父分类/子分类 -->
            <?php else:?>
                <a class="bread-item" href="<?php echo Url::sort($sortid); ?>"><?php echo $sort_cache[$sortid]['sortname']; ?></a><!-- 分类 -->
            <?php endif;?>
        <?php elseif (isset($author)): ?>
            <a class="bread-item">作者：<?php echo blog_author($author); ?> 的文章</a><!-- 作者 -->
        <?php elseif (isset($keyword)):?>
            <a class="bread-item">包含搜索词 “<?php echo $keyword; ?>” 的文章</a><!-- 搜索词 -->
        <?php elseif (isset($record)):?>
            <a class="bread-item">您查看的是 “ <?php echo $record; ?> ” 年月的文章</a><!-- 归档 -->
        <?php elseif (isset($log_title)):?>
            <a class="bread-item"><?php echo $log_title; ?></a><!-- 归档 -->
        <?php endif;?>
    </div>
</div>