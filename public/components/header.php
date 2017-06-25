<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>演示页面</title>
    <link rel="stylesheet" href="//at.alicdn.com/t/font_5erwxi32ywlv7vi.css">
    <link rel="stylesheet" href="dist/css/style.css?version=v1.0.0">
</head>
<body>
<!--[if lte IE 8]>
<div id="browsehappy" style="text-align:center;background:#ff0;">您正在使用的浏览器版本过低，请<a href="http://browsehappy.com/" target="_blank"><strong>升级您的浏览器</strong></a>，获得最佳的浏览体验！</div>
<![endif]-->

<!--头部区域-->
<header id="header" class="header">
    <div class="container">
        <a href="/" class="avatar">
            <div class="img"><img src="dist/images/logo.png" alt="头像"></div>
            <i class="gold-v"></i>
        </a>
        <div class="userinfo">
            <h1 class="username">
                戴墨镜的刘备
                <a href="http://weibo.com/theheng" target="_blank"><img src="dist/images/weibo_48_48.png" alt="weibo"></a>
            </h1>
            <h3 class="userdesc">演员， 自媒体人</h3>
            <ul class="count">
                <li class="item">
                    <div class="num">234</div>
                    文章
                </li>
                <li class="item">
                    <div class="num">2309213</div>
                    阅读量
                </li>
                <li class="item">
                    <div class="num">4526</div>
                    留言
                </li>
            </ul>
        </div>
        <div class="third-entry">
            <img src="dist/images/payme.png" alt="wechat">
            <p>关注微信公众号</p>
        </div>
    </div>
</header>
<!--头部区域 ／-->
<?php
    $sn = $_SERVER['SCRIPT_NAME'];
?>
<!--导航-->
<div class="menu-box">
    <div class="container">
        <a href="javascript:;" class="icon-menu toggle-open" data-target="menu">
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
            <i class="icon-menu-item"></i>
        </a>
        <!--菜单部分-->
        <ul class="menu" id="menu">
            <li class="menu-item <?php echo $sn === '/index.php' ? 'active' : '';?>"><a href="/index.php">首页</a></li>
            <li class="menu-item <?php echo $sn === '/log_list_2.php' ? 'active' : '';?>"><a href="/log_list_2.php">二栏布局</a></li>
            <li class="menu-item <?php echo $sn === '/log_list_3.php' ? 'active' : '';?>"><a href="/log_list_3.php">三栏布局</a></li>
            <li class="menu-item <?php echo $sn === '/log_list_img.php' ? 'active' : '';?>"><a href="/log_list_img.php">图片列表</a></li>
            <li class="menu-item <?php echo $sn === '/log_list_mv.php' ? 'active' : '';?>"><a href="/log_list_mv.php">视频列表</a></li>
            <li class="menu-item">
                <a href="/index.php">下拉菜单</a>
                <ul class="sub-nav">
                    <li><a href="/index.php">EMLOG模版</a></li>
                    <li><a href="/index.php">EMLOG插件</a></li>
                    <li><a href="/index.php">EMLOG教程</a></li>
                </ul>
            </li>
        </ul>
        <!--菜单部分 /-->
        <form action="" method="get" class="pull-right search" id="search-form">
            <input type="search" class="input" placeholder="搜索" />
        </form>
    </div>
</div>
<!--导航 ／-->