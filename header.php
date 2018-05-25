<?php
/*
Template Name:beginning-pro
Description:简洁，多种布局，金v闪亮你的自媒体之路 <br /> 提交bug: http://zhangziheng.com/play/451.html
Version:2.0.1
Author:jaeheng
Author Url:http://www.zhangziheng.com
Sidebar Amount:1
*/
if (!defined('EMLOG_ROOT')) exit('error!');
require_once View::getView('module');
$systemInfo = getSystemInfo();
$version = 'v1.1';
$siteKey = $site_key;
$siteDescription = $site_description;
$siteTitle = $site_title;
$blogName = $blogname;
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo $siteKey; ?>"/>
    <meta name="description" content="<?php echo $siteDescription; ?>"/>
    <meta name="generator" content="emlog"/>
    <title><?php echo $siteTitle; ?></title>
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php"/>
    <link rel="stylesheet" href="//at.alicdn.com/t/font_228781_v0kbuphltovo0f6r.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>static/css/style.css?version=<?php echo $version; ?>">
    <script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
</head>
<body <?php echo _g('showHeader') ? '' : 'class="headerFixed"'; ?>>
<!--[if lte IE 8]>
<div id="browsehappy">
    您正在使用的浏览器版本过低，请<a href="https://browsehappy.com/" target="_blank">
    <strong>升级您的浏览器</strong></a>，获得最佳的浏览体验！
</div>
<![endif]-->

<?php doAction('index_head'); ?>
<!--头部区域-->
<?php if (_g('showHeader')): ?>
<header id="header" class="header">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="avatar">
            <div class="img"><img src="<?php echo getAuthorAvatar(); ?>" alt="<?php echo $blogName; ?>"></div>
            <i class="gold-v"></i>
        </a>
        <h1 class="username">
            <?php echo $blogName; ?>
            <a href="<?php echo _g('weibo'); ?>" target="_blank">
                <img src="<?php echo TEMPLATE_URL; ?>/static/images/weibo_48_48.png" alt="weibo">
            </a>
        </h1>
        <div class="userdesc"><?php echo $bloginfo; ?></div>
        <ul class="count">
            <li class="item">
                <span class="tit">文章</span>
                <span class="num"><?php echo $systemInfo['articelNum']; ?></span>
            </li>
            <li class="item">
                <span class="tit">留言</span>
                <span class="num"><?php echo $systemInfo['commentsNum']; ?></span>
            </li>
            <li class="item">
                <span class="tit">阅读</span>
                <span class="num"><?php echo $systemInfo['viewNum']; ?></span>
            </li>
        </ul>
    </div>
</header>
<?php endif; ?>
<!--头部区域 ／-->

<!--导航-->
<div class="nav">
    <div class="container">
        <a href="javascript:;" class="icon-menu" id="open-menu">
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
        </a>
        <?php blog_navi(); ?>
        <form action="<?php echo BLOG_URL; ?>index.php" method="get" class="pull-right search" id="search-form">
            <input type="search" name="keyword" class="input" value="<?php echo $keyword; ?>" placeholder="search..."/>
        </form>
    </div>
</div>
<!--导航 ／-->