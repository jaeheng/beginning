<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<!--面包屑导航-->
<div class="breadthumb">
    <div class="container">
        <a href="<?php echo BLOG_URL;?>" class="bread-item">首页</a>
        <a class="bread-item">碎语</a>
    </div>
</div>
<!--面包屑导航-->

<div class="main container">
    <div id="tw" class="tw">
        <ul>
            <?php
            foreach($tws as $val):
                $author = $user_cache[$val['author']]['name'];
                $avatar = empty($user_cache[$val['author']]['avatar']) ?
                    BLOG_URL . 'admin/views/images/avatar.jpg' :
                    BLOG_URL . $user_cache[$val['author']]['avatar'];
                $tid = (int)$val['id'];
                $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank" class="img"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
                ?>
                <li class="li">
                    <div class="time"><?php echo $val['date'];?> </div>
                    <div class="avatar"><img src="<?php echo $avatar; ?>" /></div>
                    <div class="text"><?php echo $author; ?>: <?php echo $val['t'].'<br/>'.$img;?></div>
                </li>
            <?php endforeach;?>
        </ul>
        <div class="pagination">
            <?php echo $pageurl;?>
        </div>
    </div>
</div>
<?php
 include View::getView('footer');
?>
