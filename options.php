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
    'searchId' => array(
        'type' => 'text',
        'name' => '单独搜索页面',
        'multi' => false,
        'default' => $config['searchId'],
        'description' => '填写应用了 page/search 页面模版的页面ID'
    )
);