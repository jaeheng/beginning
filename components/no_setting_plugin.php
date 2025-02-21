<?php
/**
 * 没有安装模板设置插件时的提醒
 * @author jaeheng
 */

if (!defined('EMLOG_ROOT')) exit('error!');
?>
    <!doctype html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="<?= $site_key; ?>"/>
        <meta name="description" content="<?= $site_description; ?>"/>
        <meta name="generator" content="emlog"/>
        <title><?= $site_title; ?></title>
        <link rel="alternate" type="application/rss+xml" title="RSS" href="<?= BLOG_URL; ?>rss.php"/>
        <style>
            .no-setting {
                width: 500px;
                margin: 100px auto 0;
                box-shadow: 0 0 0 10px #4E73DF;
                padding: 20px;
                border-radius: 10px;
                color: #333666;
                box-sizing: border-box;
                background: #fff;
            }

            .no-setting h3 {
                text-align: center;
                color: #4E73DF;
                margin-top: 30px;
                margin-bottom: 30px;
                font-size: 1.5em;
            }

            .no-setting p {
                border-bottom: 1px dashed #4E73DF;
                line-height: 2;
            }

            .no-setting code {
                background: #f0f0f0;
                padding: 3px 5px;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>

    <div class="no-setting">
        <h3>请安装模板设置插件：</h3>

        <p>1. 最新版emlog pro自带模板设置插件</p>
        <p>2. 升级最新版emlog pro，并启用模板设置插件</p>
        <p>3. 模版依赖模板设置插件，请安装</p>
        <p>有疑问请联系 <code>email: phpat@qq.com</code></p>
        <div style="text-align: center">
            <img src="https://blog.phpat.com/content/templates/beginning_pro/static/images/color_pad.jpg" alt="广告">
        </div>
    </div>

    </body>
    </html>
<?php
// 结束程序
die;