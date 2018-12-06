<?php
/*
Template Name:beginning
Description:简洁，多种布局 <br /> <a href="http://zhangziheng.com/play/451.html" target="_blank">提交bug</a>
Version:2.5.6
Author:jaeheng
Author Url:http://www.zhangziheng.com
Sidebar Amount:1
*/
if (!defined('EMLOG_ROOT')) exit('error!');
require_once View::getView('module');
$beginningVersion = 'v2.5.4';
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
    <link rel="stylesheet" href="//at.alicdn.com/t/font_228781_6v4cf620dm.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>static/css/style.css?version=<?php echo $beginningVersion; ?>">
    <script src="<?php echo TEMPLATE_URL;?>/static/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo TEMPLATE_URL;?>/static/vendor/common-tpl.js" type="text/javascript"></script>
</head>
<body class="headerFixed">
<!--[if lte IE 8]>
<div id="browsehappy">
    您正在使用的浏览器版本过低，请<a href="https://browsehappy.com/" target="_blank">
    <strong>升级您的浏览器</strong></a>，获得最佳的浏览体验！
</div>
<![endif]-->

<?php doAction('index_head'); ?>

<!--导航-->
<div class="nav">
    <div class="container">
        <a href="javascript:;" class="icon-menu" id="open-menu">
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
        </a>
        <?php blog_navi(); ?>
        <?php if(_g('displayLoginBtn')):?>
            <div class="pull-right login-entry">
                <?php if (ISLOGIN):
                    global $CACHE;
                    $user_cache = $CACHE->readCache('user');
                    $name = $user_cache[UID]['name'];
                ?>
                    <a href="<?php echo BLOG_URL;?>/admin/"><?php echo $name;?> 已登录</a>
                <?php else: ?>
                    <a href="<?php echo BLOG_URL;?>/admin/">登录</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<!--导航 /-->
<!--搜索栏-->
<div class="search-bar">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="logo">
            <?php if (_g('logo')):?>
                <img src="<?php echo TEMPLATE_URL; ?>static/images/logo.png" alt="<?php echo $blogname; ?>">
                <?php echo $blogname; ?>
            <?php else: echo $blogname; ?>
            <?php endif;?>
        </a>

        <form action="<?php echo BLOG_URL; ?>index.php" method="get" class="pull-right search" id="search-form">
            <input type="search" name="keyword" class="search-input" value="<?php echo $keyword; ?>" placeholder="search..."/>
            <i class="iconfont icon-search" onclick="document.getElementById('search-form').submit()"></i>
        </form>
    </div>
</div>
<!--搜索栏 /-->
