<?php
/**
 * 2列布局列表
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
$hotTags = getRandomTags();
?>
<!--// 搜索框-->
<div class="container">
    <form action="<?php echo BLOG_URL; ?>index.php" method="get" class="search-form">
        <h2>站内搜索</h2>
        <input type="search" name="keyword" class="input" value="<?php echo $keyword; ?>" placeholder="search..."/>
        <button class="btn">搜索</button>
        <div style="margin-top: 50px;">
            <?php foreach ($hotTags as $value): ?>
                <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"
                   class="tag"># <?php echo $value['tagname']; ?> #</a>
            <?php endforeach;?>
        </div>
    </form>
</div>
<!--// 热门标签-->

<?php include View::getView('footer'); ?>