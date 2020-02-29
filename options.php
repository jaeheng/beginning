<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
    'weibo' => array(
        'type' => 'text',
        'name' => '微博链接',
        'default' => '',
    ),
    'email' => array(
        'type' => 'text',
        'name' => 'email',
        'default' => '',
    ),
    'qq' => array(
        'type' => 'text',
        'name' => 'QQ',
        'default' => '',
    ),
    'reward' => array(
        'type' => 'radio',
        'name' => '开启打赏',
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
        'default' => '1',
    ),
    'cms' => array(
        'type' => 'radio',
        'name' => '聚合首页',
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
        'default' => '0',
    ),
    'cmsAd' => array(
        'type' => 'text',
        'name' => '聚合首页广告链接',
        'multi' => false,
        'default' => '',
        'description' => '为空则不显示该广告'
    ),
    'dashboardDir' => array(
        'type' => 'text',
        'name' => '后台文件夹',
        'multi' => false,
        'default' => 'admin',
        'description' => '如果你修改了后台文件夹名称，需要修改此项(此配置项并不会帮你修改后台文件夹) '
    ),
    'logo' => array(
        'type' => 'radio',
        'name' => 'Logo模式',
        'default' => '2',
        'values' => array(
            '1' => '仅logo',
            '2' => 'logo+网站名称',
            '3' => '仅网站名称'
        ),
    ),
    'displayLoginBtn' => array(
        'type' => 'radio',
        'name' => '是否显示登录入口',
        'default' => '1',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'showRep' => array(
        'type' => 'radio',
        'name' => '是否显示转载说明',
        'default' => '1',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'showEffect' => array(
        'type' => 'radio',
        'name' => '是否显示彩带背景',
        'default' => '0',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    )
);
