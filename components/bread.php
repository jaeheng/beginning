<?php
/**
 * 面包屑导航
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}

$breadTitle = '';
$desc = '';
$background = getRandomDarkColor();

if (isset($tag)) {
    $breadTitle = "<a class='bread-item'>包含“ $tag ”话题的文章</a>";
} elseif (isset($sortid)) {
    $background = blog_sort_color($sortid);
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort');
    $pid = $sort_cache[$sortid]['pid'];
    if($pid != 0) {
        $breadTitle = '<a href="' . Url::sort($pid) .  '" class="bread-item">' . $sort_cache[$pid]['sortname'] . '</a> / ' . $sort_cache[$sortid]['sortname'];
    } else {
        $breadTitle = "<a class='bread-item'>" . $sort_cache[$sortid]['sortname'] . "</a>";
    }
    $desc = '<p class="desc">' . $sort_cache[$sortid]['description'] . '</p>';
} elseif (isset($keyword)) {
    $breadTitle = "<a class='bread-item'>包含搜索词 “ $keyword ” 的文章</a>";
} elseif (isset($record)) {
    $breadTitle = "<a class='bread-item'>您查看的是 “ $record ” 年月的文章</a>";
} elseif (isset($log_title)) {
    $breadTitle = $log_title;
}

?>
<?php //if (!empty($breadTitle)):?>
<!--<header class="bread-header" style="background: --><?php //echo $background;?><!--">-->
<!--    <div class="container">-->
<!--        <div class="title">--><?php //echo strip_tags($breadTitle); ?><!--</div>-->
<!--        --><?php //echo $desc;?>
<!--    </div>-->
<!--</header>-->
<?php //endif; ?>

<!--面包屑导航-->
<?php if (!empty($breadTitle)):?>
<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="bread-item">首页</a>
        <?php echo $breadTitle; ?>
    </div>
</div>
<?php endif;?>
<!--面包屑导航-->
