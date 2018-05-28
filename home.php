<?php
/**
 * 站点首页模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
// 将搜索分类忽略掉
$searchId = _g('searchId');
$exp = array();
if (!empty($searchId)) {
    $exp[] = $searchId;
}
$sorts = getSorts($exp);
// TODO:横条广告，以后等可配置了再放开
if (!empty(_g('cmsAd'))) {
    include View::getView('components/banner_ad');
}
?>
<link rel="stylesheet" href="<?php echo TEMPLATE_URL;?>static/vendor/swiper-4.2.6.min.css">

<div class="container">
    <?php
        $toplogs = getTopArticle();
        if (count($toplogs) > 0):
    ?>
    <!--置顶博文幻灯片-->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
                foreach ($toplogs as $log):
                    $img = getFirstAtt($log['gid']);
                    $img = $img ? $img : getImgFromDesc($log['content']);
            ?>
            <div class="swiper-slide">
                <a href="<?php echo Url::log($log['gid']);?>" title="<?php echo $log['title'];?>">
                    <div class="log-img">
                        <img src="<?php echo $img;?>" alt="<?php echo $log['title'];?>">
                    </div>
                    <div class="title">
                        <?php echo $log['title'];?>
                    </div>
                </a>
            </div>
            <?php endforeach;?>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>

        <!-- 如果需要导航按钮 -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <!--置顶博文幻灯片/-->
    <?php endif;?>

    <div class="cms row">
        <?php
        foreach ($sorts as $key => $value):
            $logs = getArticleBySortID($key, 5);
            ?>
            <div class="col-md-4">
                <div class="cms-item">
                    <h3 class="title">
                        <a href="<?php echo Url::sort($value['sid']);?>"><?php echo $value['sortname'];?></a>
                    </h3>
                    <ul class="cms-log-list">
                        <?php foreach ($logs as $key => $log):
                            if ($key == 0):
                                $img = getFirstAtt($log['gid']);
                                $img = $img ? $img : getImgFromDesc($log['content']);
                            ?>
                            <li class="first">
                                <a href="<?php echo Url::log($log['gid']);?>"><img src="<?php echo $img;?>" alt="<?php echo $log['title'];?>" class="cover-img"></a>
                                <div class="log-title">
                                    <a href="<?php echo Url::log($log['gid']);?>"><?php echo $log['title'];?></a>
                                </div>
                                <p><?php echo mb_strcut(str_replace('阅读全文&gt;&gt;', '', str_replace('&nbsp;', '', strip_tags($log['log_description'], '<br>'))), 0, 51);?></p>
                            </li>
                            <?php else:?>
                            <li>
                                <a href="<?php echo Url::log($log['gid']);?>"><?php echo $log['title'];?></a>
                            </li>

                        <?php
                            endif;
                            endforeach;
                            ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div style="text-align: center;padding: 40px 0;">~已经到底了~</div>
</div>

<script src="<?php echo TEMPLATE_URL;?>static/vendor/swiper-4.2.6.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            loop: true,

            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
            },

            // 如果需要前进后退按钮
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 4,
            spaceBetween: 30,
            breakpoints: {
                //当宽度小于等于640
                640: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                1000: {
                    slidesPerView: 2,
                    spaceBetween: 15
                }
            }
        })
    </script>
<?php include View::getView('footer'); ?>