<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
    'dashboardDir' => array(
        'type' => 'text',
        'name' => '后台文件夹',
        'multi' => false,
        'default' => 'admin',
        'description' => '如果你修改了后台文件夹名称，需要修改此项(此配置项并不会帮你修改后台文件夹) '
    ),
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
    'cms' => array(
        'type' => 'radio',
        'name' => '首页模式',
        'values' => array(
            '0' => '博客',
            '1' => '工作室'
        ),
        'default' => '0',
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
    'logo' => array(
        'type' => 'radio',
        'name' => 'Logo模式',
        'default' => '2',
        'values' => array(
            '2' => 'logo+网站名称',
            '1' => '仅logo',
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
