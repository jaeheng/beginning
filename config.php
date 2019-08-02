<?php
/**
 * Author: jaeheng <jaeheng@qq.com>
 * 模板配置文件
 */
if (!defined('EMLOG_ROOT')) exit('error!');

return array(
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
    /* 是否开启聚合首页 */
    'cms' => false,
    /* 聚合首页banner广告链接 */
    'cmsAd' => '',
    /* 开启Logo: true开启 false不开启 */
    'logo' => false,
    /* 是否无限滚动加载数据 */
    'iasEnable' => true,
    /* 是否显示登录入口 */
    'displayLoginBtn' => true,
    /* 是否显示相关文章 */
    'relationLog' => true,
    /* 是否显示作者信息 */
    'showAuthor' => true,
    /* 是否显示转载说明 */
    'showRep' => true,
    /* 首页欢迎语 */
    'homeNotice' => '首页欢迎语,emlog6.0.0没有微语，用这句话代替,可配置',
    /* 后台文件夹：如果你修改了后台文件夹名称，需要修改此项 */
    'dashboardDir' => 'admin'
);
