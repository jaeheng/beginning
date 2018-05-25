<?php
/**
 * 站点首页模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
$sorts = getSorts(array(63));
// TODO:横条广告，以后等可配置了再放开
// include View::getView('components/banner_ad');
?>

<!--置顶博文幻灯片-->

<!--置顶博文幻灯片/-->

<div class="container">
    <div class="cms row">
        <?php
        foreach ($sorts as $key => $value):
            $logs = getArticleBySortID($key, 5);
            ?>
            <div class="col-md-4">
                <div class="cms-item">
                    <h3 class="title">
                        <a href="<?php echo Url::sort($value['sid']);?>"><?php echo $value['sortname'];?></a>
                    </h3>
                    <ul class="cms-log-list">
                        <?php foreach ($logs as $log):?>
                            <li><?php echo $log['title'];?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include View::getView('footer'); ?>