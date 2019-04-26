<?php
/*
 * 作者页面
 */
if (!defined('EMLOG_ROOT')) exit('error!');
$authorInfo = bloggerInfo($author);
$systemInfo = getSystemInfo($author);
$authorInfo['avatar'] = BLOG_URL . $authorInfo['avatar'];
?>
<!--作者头部区域-->
<div class="container">
    <header id="header" class="header" style="<?php echo getRandomHeaderBg();?>">
        <div class="avatar">
            <div class="img">
                <img src="<?php echo $authorInfo['avatar']; ?>" alt="<?php echo $authorInfo['name']; ?>">
            </div>
            <i class="gold-v"></i>
        </div>
        <h1 class="username">
            <?php echo $authorInfo['name']; ?>
        </h1>
        <div class="userdesc"><?php echo $authorInfo['des']; ?></div>
        <ul class="count">
            <li class="item">
                <span class="tit">文章</span>
                <span class="num"><?php echo $systemInfo['articelNum']; ?></span>
            </li>
            <li class="item">
                <span class="tit">阅读</span>
                <span class="num"><?php echo $systemInfo['viewNum']; ?></span>
            </li>
        </ul>
    </header>
</div>
<!--作者头部区域 ／-->
