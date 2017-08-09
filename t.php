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
    <div class="content-wrap">
    <div class="content">
        <div id="tw">
            <ul>
            <?php
            foreach($tws as $val):
            $author = $user_cache[$val['author']]['name'];
            $avatar = empty($user_cache[$val['author']]['avatar']) ?
                        BLOG_URL . 'admin/views/images/avatar.jpg' :
                        BLOG_URL . $user_cache[$val['author']]['avatar'];
            $tid = (int)$val['id'];
            $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
            ?>
            <li class="li">
            <div class="main_img"><img src="<?php echo $avatar; ?>" /></div>
            <div class="post1">
                <span><?php echo $author; ?></span><br />
                <?php echo $val['t'].'<br/>'.$img;?>
                <div class="bttome">
                    <p class="post"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复(<span id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></span>)</a></p>
                    <p class="time"><?php echo $val['date'];?> </p>
                </div>
                <ul id="r_<?php echo $tid;?>" class="r"></ul>
                <?php if ($istreply == 'y'):?>
                    <div class="huifu" id="rp_<?php echo $tid;?>">
                        <textarea id="rtext_<?php echo $tid; ?>" placeholder="回复碎语"></textarea>
                        <div class="tbutton">
                            <div class="tinfo" style="display:<?php if(ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER){echo 'none';}?>">
                                昵称：<input type="text" id="rname_<?php echo $tid; ?>" value="" />
                                <span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /></span>
                            </div>
                            <div class="submit">
                            <?php echo $rcode; ?>
                            <input class="btn" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" value="回复" />
                            </div>
                            <div class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span></div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            </li>
            <?php endforeach;?>
            <li id="pagenavi" class="pagination"><?php echo $pageurl;?></li>
            </ul>
        </div>
    </div>
    </div>
    <?php include View::getView('side'); ?>
    <div class="clearfix"></div>
</div>
<?php
 include View::getView('footer');
?>