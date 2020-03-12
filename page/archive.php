<?php
/**
 * 归档
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}

$sql = "SELECT blog.gid, blog.title, FROM_UNIXTIME(blog.date) as date, blog.sortid, sort.sortname from " . DB_PREFIX .  "blog as blog JOIN " . DB_PREFIX . "sort as sort on blog.sortid=sort.sid WHERE type='blog' and hide='n' and checked='y' order by gid desc";
$db = Database::getInstance();
$query = $db->query($sql);

$allLogs = array();
while($res = $db->fetch_array($query)) {
    $log = array("gid" => $res["gid"], "title" => $res["title"], "date" => $res["date"]);
    if (isset($allLogs[$res["sortid"]])) {
        $allLogs[$res["sortid"]]["logs"][] = $log;
    } else {
        $allLogs[$res["sortid"]] = array("sortname" => $res["sortname"], "logs" => [$log]);
    }
}
?>

<style>
.archive {
    background-color: #fff;
    box-sizing: border-box;
    padding: 20px 50px;
}
.archive li {
    border-bottom: 1px dashed #ccc;
    line-height: 2.4;
    padding: 0 15px;
}
.archive li:nth-child(2n) {
    background-color: #f9f9f9;
}
.archive li .date {
    float: right;
}
@media all and (max-width: 960px) {
    .archive {
        padding: 15px;
    }
    .archive li {
        list-style: none;
        line-height: 1.5;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .archive li .date {
        float: none;
        display: block;
        margin-top: 15px;
    }
}
</style>

<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL; ?>" class="bread-item">首页</a> > 归档
    </div>
</div>

<div class="container">
    <div class="archive log-body">
        <h1 style="font-weight: bold;">文章归档</h1>
        <?php echo $log_content; ?>
        <?php foreach($allLogs as $sortid => $sort):?>
            <h3><a href="<?php echo Url::sort($sortid);?>"><?php echo $sort["sortname"];?></a></h3>
            <ul>
            <?php foreach($sort["logs"] as $log):?>
                <li>
                    <a href="<?php echo Url::log($log["gid"]);?>"><?php echo $log["title"];?></a>
                    <span class="date"><?php echo $log["date"];?></span>
                </li>
            <?php endforeach;?>
            </ul>
        <?php endforeach;?>
    </div>
</div>


<?php
include View::getView('footer');
?>

