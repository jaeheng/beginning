<?php
/**
 * 首页轮播消息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
$notice = getNotices();
?>
<!--动态轮播提醒-->
<div class="container">
    <div class="site-notice" id="site-notice">
        <ul>
            <?php foreach ($notice['list'] as $value) : ?>
            <li>
                <a href="<?php echo $notice['isTwitter'] ? BLOG_URL . '/t' : '#';?>">
                    <i class="iconfont icon-notice"></i> <?php echo subString($value['t'], 0, 50);?>
                </a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!--动态轮播提醒 /-->