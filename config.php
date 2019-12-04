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
    /* Logo模式: 1仅logo 2logo+网站名称 3 仅网站名称 */
    'logo' => 2,
    /* 是否显示登录入口 */
    'displayLoginBtn' => true,
    /* 是否显示相关文章 */
    'relationLog' => true,
    /* 是否显示作者信息 */
    'showAuthor' => true,
    /* 是否显示转载说明 */
    'showRep' => true,
    /* 是否显示彩带背景 */
    'showEffect' => true,
    /* 后台文件夹：如果你修改了后台文件夹名称，需要修改此项(此配置项并不会帮你修改后台文件夹) */
    'dashboardDir' => 'admin'
);
