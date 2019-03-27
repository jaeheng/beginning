<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
include('config.php');

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
        'name' => '侧边栏礼物图标',
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
    )
);
