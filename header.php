<?php
/*
Template Name:Beginning
Description:简洁,时尚,科技,实用 <br /> <a href="https://blog.phpat.com/481.html" target="_blank">模板介绍页</a>
Version:2.6.2
Author:jaeheng
Author Url:http://www.phpat.com
Sidebar Amount:1
*/

if (!defined('EMLOG_ROOT')) exit('error!');
/**
 * 模板的版本
 * @Date 2020年03月14日
 */
define('TPL_VERSION', 'v2.6.2');

require_once View::getView('module');
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo $site_key; ?>"/>
    <meta name="description" content="<?php echo $site_description; ?>"/>
    <meta name="generator" content="emlog"/>
    <title><?php echo $site_title; ?></title>
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php"/>
    <link rel="stylesheet" href="//at.alicdn.com/t/font_228781_etra1u0garl.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>static/css/style.css?version=<?php echo TPL_VERSION; ?>">
    <script src="<?php echo TEMPLATE_URL; ?>/static/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo TEMPLATE_URL; ?>/static/vendor/common-tpl.js"></script>
</head>
<body class="headerFixed">
<!--[if lte IE 8]>
<div id="browsehappy">
    您正在使用的浏览器版本过低，请<a href="https://browsehappy.com/" target="_blank">
    <strong>升级您的浏览器</strong></a>，获得最佳的浏览体验！
</div>
<![endif]-->

<?php doAction('index_head'); ?>

<!--搜索栏-->
<form action="<?php echo BLOG_URL; ?>index.php" method="get" class="search" id="search-form">
    <input type="search" name="keyword" class="search-input" value="<?php echo $keyword; ?>"
           placeholder="请输入关键字，按Enter搜索" id="keyword" required/>
</form>
<!--搜索栏 /-->

<!--导航-->
<div class="nav" id="nav">
    <div class="container">
        <a href="javascript:;" class="icon-menu" id="open-menu">
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
        </a>
        <a href="<?php echo BLOG_URL; ?>" class="logo">
            <!--            //    Logo模式: 1仅logo 2logo+网站名称 3 仅网站名称-->
            <?php
            $logoMode = _g('logo');
            $logUrl = _g('logo_url');
            if ($logoMode == 1):?>
                <img src="<?php echo $logUrl; ?>" alt="<?php echo $blogname; ?>">
            <?php elseif ($logoMode == 2): ?>
                <img src="<?php echo $logUrl; ?>" alt="<?php echo $blogname; ?>">
                <?php echo $blogname; ?>
            <?php else: ?>
                <?php echo $blogname; ?>
            <?php endif; ?>
        </a>

        <?php blog_navi(); ?>
        <?php if (_g('displayLoginBtn')): ?>
            <div class="pull-right login-entry">
                <?php if (ISLOGIN):
                    global $CACHE;
                    $user_cache = $CACHE->readCache('user');
                    $name = $user_cache[UID]['name'];
                    ?>
                    <ul class="menu" id="menu">
                        <li class="menu-item bold"><a href="<?php echo BLOG_URL; ?>/admin/article.php?action=write"><i
                                        class="iconfont icon-write"></i> 写文章</a></li>
                        <li class="menu-item">
                            <a href="<?php echo BLOG_URL; ?>/admin"><?php echo $name; ?></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo BLOG_URL; ?>/admin/comment.php">管理评论</a></li>
                                <li class="divider"><a href="<?php echo BLOG_URL; ?>/admin">后台管理</a></li>
                                <li><a href="<?php echo BLOG_URL; ?>/admin/account.php?action=logout">退出登录</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <a href="<?php echo BLOG_URL; ?>/admin/account.php?action=signin">登录</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<!--导航 /-->
