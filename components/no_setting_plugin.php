<?php
/**
 * 没有安装模板设置插件时的提醒
 * @author jaeheng
 */

if (!defined('EMLOG_ROOT')) {
    exit('error!');
} ?>

    <style>
        .no-setting {
            width: 500px;
            margin: 100px auto 0;
            border: 10px solid #FF9800;
            padding: 20px;
            border-radius: 10px;
        }

        .no-setting h3 {
            text-align: center;
            color: red;
            margin-bottom: 2em;
        }

        .no-setting p {
            border-bottom: 1px dashed #ff9800;
            padding-bottom: 10px;
        }

        .no-setting code {
            background: #f0f0f0;
            padding: 3px 5px;
            border-radius: 4px;
        }

        .no-setting a {
            text-decoration: none;
            color: #2196F3;
            font-size: 14px;
        }
    </style>

    <div class="no-setting">
        <h3>请安装模板设置插件：</h3>

        <p>- 插件文件在 <code>beginning/plugins</code> 目录</p>
        <p>- 将模板文件解压到 <code>content/plugins</code> 目录</p>
        <p>- 在 <code>emlog后台->插件</code> 中开启模板设置插件</p>

        有疑问请联系 <code>QQ:459269125</code> <br/><br/>
        <strong>模板设置插件下载: </strong>
        <a href="http://www.emlog.net/plugin/144" target="_blank">下载</a>
    </div>


<?php
// 结束程序
die;
?>