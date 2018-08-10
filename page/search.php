<?php
/**
 * 2列布局列表
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
$hotTags = getRandomTags(20);
$sorts = getSorts();
?>
<!--// 搜索框-->
<div class="container">
    <form action="<?php echo BLOG_URL; ?>index.php" method="get" class="search-form">
        <h2><i class="iconfont icon-search"></i>站内搜索</h2>
        <input type="search" name="keyword" class="input" value="<?php echo $keyword; ?>" placeholder="search..."/>
        <button class="btn">搜索</button>
        <div class="quick-search">
            <?php foreach ($hotTags as $value): ?>
                <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"
                   class="log-tag"># <?php echo $value['tagname']; ?> #</a>
            <?php endforeach;?>
            <?php foreach ($sorts as $value):?>
                <a href="<?php echo Url::sort($value['sid']);?>" class="log-tag"><?php echo $value['sortname'];?></a>
            <?php endforeach;?>
        </div>
    </form>
</div>
<!--// 热门标签-->

<?php include View::getView('footer'); ?>