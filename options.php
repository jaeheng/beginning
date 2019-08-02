<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$config = include('config.php');

$options = array(
    'weibo' => array(
        'type' => 'text',
        'name' => '微博链接',
        'default' => $config['weibo'],
    ),
    'email' => array(
        'type' => 'text',
        'name' => 'email',
        'default' => $config['email'],
    ),
    'qq' => array(
        'type' => 'text',
        'name' => 'QQ',
        'default' => $config['qq'],
    ),
    'gift' => array(
        'type' => 'text',
        'name' => '侧边栏礼物图标链接',
        'default' => $config['gift'],
    ),
    'relief' => array(
        'type' => 'text',
        'name' => '免责声明',
        'multi' => true,
        'default' => $config['relief'],
    ),
    'reward' => array(
        'type' => 'radio',
        'name' => '开启打赏',
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
        'default' => $config['reward'],
    ),
    'cms' => array(
        'type' => 'radio',
        'name' => '聚合首页',
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
        'default' => $config['cms'],
    ),
    'cmsAd' => array(
        'type' => 'text',
        'name' => '聚合首页广告链接',
        'multi' => false,
        'default' => $config['cmsAd'],
        'description' => '为空则不显示该广告'
    ),
    'homeNotice' => array(
        'type' => 'text',
        'name' => 'EM6首页欢迎语',
        'multi' => false,
        'default' => $config['homeNotice'],
        'description' => 'emlog6.0.0没有微语，用这句话代替'
    ),
    'dashboardDir' => array(
        'type' => 'text',
        'name' => '后台文件夹',
        'multi' => false,
        'default' => $config['dashboardDir'],
        'description' => '如果你修改了后台文件夹名称，需要修改此项'
    ),
    'logo' => array(
        'type' => 'radio',
        'name' => '开启Logo',
        'default' => $config['logo'],
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
    ),
    'iasEnable' => array(
        'type' => 'radio',
        'name' => '无限滚动加载数据',
        'default' => $config['iasEnable'],
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
    ),
    'displayLoginBtn' => array(
        'type' => 'radio',
        'name' => '是否显示登录入口',
        'default' => $config['displayLoginBtn'],
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'relationLog' => array(
        'type' => 'radio',
        'name' => '是否显示相关文章',
        'default' => $config['relationLog'],
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'showAuthor' => array(
        'type' => 'radio',
        'name' => '是否显示作者信息',
        'default' => $config['showAuthor'],
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'showRep' => array(
        'type' => 'radio',
        'name' => '是否显示转载说明',
        'default' => $config['showRep'],
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    )
);
