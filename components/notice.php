<?php
/**
 * 首页轮播消息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}

// 版本差异：5.3.1 以上的将微语去掉了，这里比较下版本去掉“网站公告”
if (version_compare(Option::EMLOG_VERSION, '5.3.1')) {
    echo '<div class="container"><div class="site-notice">' . _g('homeNotice') . '</div></div>';
    return false;
}
$notice = getNotices();
?>
<!--动态轮播提醒-->
<div class="container">
    <div class="site-notice" id="site-notice">
        <ul>
            <?php foreach ($notice['list'] as $value) : ?>
            <li>
                <a href="<?php echo $notice['isTwitter'] ? BLOG_URL . 't' : '#';?>">
                    <i class="iconfont icon-notice"></i> <?php echo subString(strip_tags($value['t']), 0, 50);?>
                </a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!--动态轮播提醒 /-->