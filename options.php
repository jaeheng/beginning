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
    'logo_url' => array(
        'type' => 'image',
        'name' => '上传Logo',
        'default' => TEMPLATE_URL . '/static/images/logo.png',
    ),
    'displayLoginBtn' => array(
        'type' => 'radio',
        'name' => '是否显示登录入口',
        'default' => '1',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    )
);
