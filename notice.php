<?php
/**
 * 首页轮播消息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!--动态轮播提醒-->
<div class="container">
    <div class="site-notice" id="site-notice">
        <ul>
            <?php foreach ($config['notice'] as $value) : ?>
            <li><a href="<?php echo $value['url'];?>"><i class="iconfont icon-notice"></i> <?php echo $value['title'];?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!--动态轮播提醒-->