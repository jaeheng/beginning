<?php
/**
 * 面包屑导航
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!--面包屑导航-->
<header id="header" class="header breadthumb" style="background: #3e3f40;">
    <div class="container">
        <?php if (isset($tag)):?>
            <div class="title">包含“ <?php echo $tag; ?> ”话题的文章</div><!-- 标签 -->
        <?php elseif (isset($sortid)): ?>
            <?php global $CACHE; $sort_cache = $CACHE->readCache('sort'); ?>
            <?php  $pid = $sort_cache[$sortid]['pid'];?>
            <?php if($pid != 0):?>
                <div class="title"><?php echo $sort_cache[$pid]['sortname'];?> / <?php echo $sort_cache[$sortid]['sortname']; ?></div><!-- 父分类/子分类 -->
            <?php else:?>
                <div class="title"><?php echo $sort_cache[$sortid]['sortname']; ?></div><!-- 分类 -->
            <?php endif;?>
        <?php elseif (isset($author)): ?>
            <div class="title">作者：<?php echo blog_author($author); ?> 的文章</div><!-- 作者 -->
        <?php elseif (isset($keyword)):?>
            <div class="title">包含搜索词 “<?php echo $keyword; ?>” 的文章</div><!-- 搜索词 -->
        <?php elseif (isset($record)):?>
            <div class="title">您查看的是 “ <?php echo $record; ?> ” 年月的文章</div><!-- 归档 -->
        <?php elseif (isset($log_title)):?>
            <div class="title"><?php echo $log_title; ?></div><!-- 归档 -->
        <?php else: ?>
            <div class="title"><?php echo $blogname; ?></div><!-- 默认 -->
        <?php endif;?>
    </div>
</header>