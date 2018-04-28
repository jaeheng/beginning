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
    'showHeader' => array(
        'type' => 'radio',
        'name' => '显示头部',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
        'default' => $config['showHeader'],
    ),
    'reward' => array(
        'type' => 'radio',
        'name' => '开启打赏',
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
        'default' => $config['reward'],
    )
);