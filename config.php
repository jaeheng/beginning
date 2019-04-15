<?php
if (!defined('EMLOG_ROOT')) exit('error!');

$config = array(
    /* 微博链接 */
    'weibo' => 'http://weibo.com/theheng',

    /* email */
    'email' => 'demo@test.com',

    /* 文章详情页面中的免责声明 */
    'relief' => '免责声明：本文仅代表作者个人观点，与本网站无关。其原创性以及文中陈述文字和内容未经本站证实，对本文以及其中全部或者部分内容、文字的真实性、完整性、及时性本站不作任何保证或承诺，请读者仅作参考，并请自行核实相关内容。',

    /* 右侧小工具中的qq临时会话链接  */
    'qq' => 'qqhao',

    /* 右侧小工具中的礼物图标的链接 */
    'gift' => BLOG_URL,

    /* 是否开启打赏功能: 注意，开启打赏功能之前需将打赏二维码替换成自己的， 路径为 beginning/images/reward.jpg */
    'reward' => true,

    /**
     * 右侧小工具中的二维码数据
     * 可设置多个，复制第二层array即可
     */
    'qrcode' => array(
        array(
            'url' => TEMPLATE_URL . 'static/images/wechatPay.png', // 这个表示 qrcode.png图片地址在beginning/images/qrcode.png
            'title' => '赞赏作者 (微信)',
            'icon' => 'icon-coffee' // 图标详情可见：TODO:图标库页面
        )
    ),
    'cms' => false, // 是否开启聚合首页
    'cmsAd' => '', // 聚合首页banner广告链接
    'logo' => false,
    'iasEnable' => true,
    'displayLoginBtn' => true,
    'relationLog' => true,
    'showAuthor' => true,
    'showRep' => true
);
