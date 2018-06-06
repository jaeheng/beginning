<?php 
/**
 * 自定义404页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>错误提示-页面未找到</title>
<style type="text/css">
body {
	background-color:#F7F7F7;
	font-family: Arial;
	font-size: 12px;
}
html, body, .main {
    margin: 0;
    padding: 0;
    height: 100%;
}
.notfound .t404 {
    font-size: 150px;
    font-family: sans-serif;
    letter-spacing: 20px;
    animation: notfound 2s infinite;
}
.notfound {
    height: 100%;
    background-color: #369;
    color: #fff;
    text-align: center;
    padding-top: 200px;
    box-sizing: border-box;
}
.el-button {
    display: inline-block;
    line-height: 1;
    white-space: nowrap;
    cursor: pointer;
    background: #fff;
    border: 1px solid #dcdfe6;
    color: #606266;
    -webkit-appearance: none;
    text-align: center;
    box-sizing: border-box;
    outline: none;
    margin: 0;
    transition: .1s;
    font-weight: 500;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    padding: 12px 20px;
    font-size: 14px;
    border-radius: 4px;
}
.el-button:hover {
    color: #263570;
    border-color: #bec2d4;
    background-color: #e9ebf1;
}
</style>
</head>
<body>
<div class="main">
    <div class="notfound">
        <div class="t404">
            404
        </div>
        <p>找不到网页 Page Not Found</p>
        <a href="javascript:history.back(-1);">
            <button type="button" class="el-button el-button--default">
                <span>返回上一页</span>
            </button>
        </a>
    </div>
</div>
</body>
</html>