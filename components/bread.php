<?php
/**
 * 面包屑导航
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}

$breadTitle = '';
$desc = '';
$background = getRandomDarkColor();

if (isset($tag)) {
    $breadTitle = "包含“ $tag ”话题的文章";
} elseif (isset($sortid)) {
    $background = blog_sort_color($sortid);
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort');
    $pid = $sort_cache[$sortid]['pid'];
    if($pid != 0) {
        $breadTitle = $sort_cache[$pid]['sortname'] . ' / ' . $sort_cache[$sortid]['sortname'];
    } else {
        $breadTitle = $sort_cache[$sortid]['sortname'];
    }
    $desc = '<p class="desc">' . $sort_cache[$sortid]['description'] . '</p>';
} elseif (isset($keyword)) {
    $breadTitle = "包含搜索词 “ $keyword ” 的文章";
} elseif (isset($record)) {
    $breadTitle = "您查看的是 “ $record ” 年月的文章";
} elseif (isset($log_title)) {
    $breadTitle = $log_title;
}

?>

<header class="bread-header" style="background: <?php echo $background;?>;">
    <div class="container">
        <div class="title"><?php echo $breadTitle; ?></div>
        <?php echo $desc;?>
    </div>
</header>


<!--面包屑导航-->
<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="bread-item">首页</a>
        <a class="bread-item"><?php echo $breadTitle; ?></a>
    </div>
</div>
<!--面包屑导航-->