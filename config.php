<?php
if (!defined('EMLOG_ROOT')) exit('error!');

$config = array(
    /* footer中的微博链接 */
    'weibo_url' => 'http://weibo.com/theheng',

    /* footer中的email */
    'email' => 'jaeheng@126.com',

    /* 文章详情页面中的免责声明 */
    'relief' => '免责声明：本文仅代表作者个人观点，与本网站无关。其原创性以及文中陈述文字和内容未经本站证实，对本文以及其中全部或者部分内容、文字的真实性、完整性、及时性本站不作任何保证或承诺，请读者仅作参考，并请自行核实相关内容。',

    /* 右侧小工具中的二维码数据 */
    'qrcode' => array(
        array(
            'url' => TEMPLATE_URL . 'images/qrcode.jpg',
            'title' => '关注公众号'
        ),
        array(
            'url' => TEMPLATE_URL . 'images/qrcode2.jpg',
            'title' => '访问小程序'
        )
    ),

    /* 右侧小工具中的qq临时会话链接  */
    'qq' => 'http://wpa.qq.com/msgrd?v=3&uin=459269125&site=qq&menu=yes',

    /* 右侧小工具中的礼物图标的链接 */
    'gift' => BLOG_URL,

    'notice' => array(
        array('title' => 'Welcome to my blog, thank you', 'url' => 'http://www.zhangziheng.com?post=1'),
        array('title' => '欢迎光临子恒博客', 'url' => 'http://www.zhangziheng.com?post=1')
    )
);