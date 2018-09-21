<?php
/**
 * 面包屑导航
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!--面包屑导航-->
<?php if (isset($tag)):?>
<header class="bread-header" style="background: <?php echo getRandomDarkColor();?>;">
    <div class="container">
        <div class="title">包含“ <?php echo $tag; ?> ”话题的文章</div><!-- 标签 -->
    </div>
</header>
<?php elseif (isset($sortid)): ?>
<header class="bread-header" style="background: <?php echo getRandomDarkColor();?>;">
    <div class="container">
    <?php global $CACHE; $sort_cache = $CACHE->readCache('sort'); ?>
    <?php  $pid = $sort_cache[$sortid]['pid'];?>
    <?php if($pid != 0):?>
        <div class="title"><?php echo $sort_cache[$pid]['sortname'];?> / <?php echo $sort_cache[$sortid]['sortname']; ?></div><!-- 父分类/子分类 -->
    <?php else:?>
        <div class="title"><?php echo $sort_cache[$sortid]['sortname']; ?></div><!-- 分类 -->
    <?php endif;?>
        <p class="desc"><?php print_r($sort_cache[$sortid]['description']);?></p>
    </div>
</header>
<?php elseif (isset($keyword)):?>
<header class="bread-header" style="background: <?php echo getRandomDarkColor();?>;">
    <div class="container">
        <div class="title">包含搜索词 “<?php echo $keyword; ?>” 的文章</div><!-- 搜索词 -->
    </div>
</header>
<?php elseif (isset($record)):?>
    <header class="bread-header" style="background: <?php echo getRandomDarkColor();?>;">
        <div class="container">
            <div class="title">您查看的是 “ <?php echo $record; ?> ” 年月的文章</div><!-- 归档 -->
        </div>
    </header>
<?php elseif (isset($log_title)):?>
    <header class="bread-header" style="background: <?php echo getRandomDarkColor();?>;">
        <div class="container">
            <div class="title"><?php echo $log_title; ?></div><!-- 归档 -->
        </div>
    </header>
<?php endif;?>
