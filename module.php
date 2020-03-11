<?php
/**
 * 侧边栏组件、页面模块
 */

if (!defined('EMLOG_ROOT')) {
    exit('error!');
}

/**
 * 没安装模板设置插件，则给出提示
 * 如果安装了模板设置插件(tpl_options: http://www.emlog.net/plugin/144)
 * 则_g函数会存在，此时会从该插件中读取配置项
 * 不存在则会给出提示
 */
if (!function_exists('_g')) {
    require_once View::getView('components/no_setting_plugin');
}

/**
 * 后台文件夹名称
 * 从配置文件或者模板设置插件中读取，默认admin,一般不用修改
 */
define('DASHBOARD_DIR', _g('dashboardDir'));

/**
 * 模板的版本
 * @Date 2020年02月17日
 */
define('TPL_VERSION', 'v1.0');

/**
 * 获取Gravatar头像
 * @param $email
 * @param int $s
 * @param string $d
 * @param string $g
 * @return string
 */
function _getGravatar($email, $s = 40, $d = 'mm', $g = 'g') {
    $hash = md5($email);
    return "//cn.gravatar.com/avatar/$hash?s=$s&d=$d&r=$g";
}

/**
 * 判断是否为作者页面
 * @return bool
 */
function _isAuthorPage () {
    $url = $_SERVER['REQUEST_URI'];
    return strpos($url, 'author') !== false;
}

//widget：blogger
function widget_blogger($title)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    if (_isAuthorPage()) return; # 作者页面可不显示
    ?>
    <div class="widget widget-user" id="bloggerinfo">
        <a href="<?php echo BLOG_URL . DASHBOARD_DIR;?>" target="_blank">
            <?php if (!empty($user_cache[1]['photo']['src'])): ?>
                <img src="<?php echo BLOG_URL . $user_cache[1]['photo']['src']; ?>"
                     width="<?php echo $user_cache[1]['photo']['width']; ?>"
                     height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" class="img-l"/>
            <?php else:?>
                <div class="img-l">
                    <?php echo $user_cache[1]['name'][0]; ?>
                </div>
            <?php endif; ?>
        </a>

        <div class="desc">
            <div class="username"><?php echo $user_cache[1]['name']; ?></div>
            <div class="author-follow">
                <!--打赏-->
                <?php if (_g('reward')): ?>
                    <i class="iconfont icon-coffee layer-reward" data-url="<?php echo TEMPLATE_URL; ?>"></i>
                <?php endif;?>
                <!--/打赏-->

                <?php if (!empty(_g('weibo'))): ?>
                    <a href="<?php echo _g('weibo'); ?>" title="<?php echo _g('weibo'); ?>" target="_blank"><i class="iconfont icon-weibo"></i></a>
                <?php endif; ?>

                <?php if (Option::get('rss_output_num')): ?>
                    <a href="<?php echo BLOG_URL; ?>rss.php" title="RSS订阅" target="_blank"><i class="iconfont icon-rss1"></i></a>
                <?php endif; ?>
            </div>
            <p><?php echo $user_cache[1]['des']; ?></p>
        </div>
    </div>
<?php } ?>
<?php
//widget：日历
function widget_calendar($title)
{?>
    <div class="widget widget-calendar">
        <h3><?php echo $title; ?></h3>
        <div id="calendar">
        </div>
        <script>sendinfo('<?php echo Calendar::url(); ?>', 'calendar');</script>
    </div>
<?php } ?>
<?php
//widget：标签
function widget_tag($title)
{
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags'); ?>

    <div class="widget widget-tags">
        <h3><?php echo $title; ?></h3>
        <div class="widget-inner">
            <?php foreach ($tag_cache as $value):
                $tag = $_GET['tag'];
                ?>
                <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章" class="widget-tag <?php echo $tag === $value['tagname'] ? 'active' : '';?>">
                    <i class="iconfont icon-tag"></i>
                    <?php echo $value['tagname']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>

<?php
/**
 * 热门标签
 * @param int $num 数量
 */
function widget_hot_tag($num = 10)
{
    $tag_cache = getHotTag($num);
    ?>
    <div class="widget widget-topic">
        <h3>热门话题</h3>
        <div class="widget-inner">
            <?php foreach ($tag_cache as $value): ?>
                <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"
                   class="topic-item">#<?php echo $value['tagname']; ?>#</a>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>

<?php
//widget：分类
function widget_sort($title)
{
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort'); ?>

    <div class="widget widget-sorts">
        <h3><?php echo $title; ?></h3>
        <ul id="blogsort">
            <?php
            $sid = $_GET['sort'];
            foreach ($sort_cache as $value):
                if ($value['pid'] != 0) continue;

                ?>
                <li class="<?php echo $sid == $value['sid'] ? 'active' : '';?>">
                    <a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>
                        (<?php echo $value['lognum'] ?>)</a>
                </li>
                <?php if (!empty($value['children'])): ?>
                <?php
                $children = $value['children'];
                foreach ($children as $key):
                    $value = $sort_cache[$key];
                    ?>
                    <li class="<?php echo $sid == $value['sid'] ? 'active' : '';?>">
                        <a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>
                            (<?php echo $value['lognum'] ?>)</a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php
//widget：最新微语
function widget_twitter($title)
{
    global $CACHE;
    $newtws_cache = $CACHE->readCache('newtw');
    $istwitter = Option::get('istwitter');
    ?>
    <div class="widget widget_twitter">
        <h3><?php echo $title; ?>
            <?php if ($istwitter == 'y') : ?>
                <a href="<?php echo BLOG_URL . 't/'; ?>" class="more">更多<?php echo $title; ?></a>
            <?php endif; ?>
        </h3>
        <ul id="twitter">
            <?php foreach ($newtws_cache as $value): ?>
                <?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="' . BLOG_URL . str_replace('thum-', '', $value['img']) . '" target="_blank"> <img src="' . TEMPLATE_URL . 'static/images/dna.svg" data-src="' . BLOG_URL . str_replace('thum-', '', $value['img']) . '" class="img lazyload"></a>'; ?>
                <li><?php echo $value['t']; ?><?php echo $img; ?><p><?php echo smartDate($value['date']); ?></p></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>

<?php
// 最新碎语，用于首页的轮播提醒
function getNotices()
{
    global $CACHE;
    $newtws_cache = $CACHE->readCache('newtw');
    $istwitter = Option::get('istwitter');
    return array(
        'list' => $newtws_cache,
        'isTwitter' => $istwitter
    );
} ?>
<?php
//widget：最新评论
function widget_newcomm($title)
{
    global $CACHE;
    $com_cache = $CACHE->readCache('comment');
    ?>
    <div class="widget widget-comment">
        <h3><?php echo $title; ?></h3>
        <ul>
            <?php
            foreach ($com_cache as $value):
                $url = Url::comment($value['gid'], $value['page'], $value['cid']);
                $log = getOneLogByGid($value['gid']);
                $time = gmdate('Y-n-j', $value['date']);
                ?>
                <li>
                    <div class="comment-inner">
                        <img class="avatar lazyload" src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo _getGravatar($value['mail']); ?>">
                        <i class="username"><?php echo $value['name']; ?></i>
                        <span class="time"><?php echo $time; ?></span>
                        <p class="comment-content"><?php echo $value['content']; ?></p>
                    </div>
                    <div class="comment-refer">
                        <i class="iconfont icon-yinhao"></i>
                        <span class="t">><a href="<?php echo $url; ?>" target="_blank"><?php echo $log['log_title']; ?></a></span>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php
//widget：最新文章
function widget_newlog($title)
{
    global $CACHE;
    $newLogs_cache = $CACHE->readCache('newlog');
    ?>
    <div class="widget widget-newlog">
        <h3><?php echo $title; ?></h3>
        <ul id="newlog">
            <?php foreach ($newLogs_cache as $value): ?>
                <li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php
//widget：热门文章
function widget_hotlog($title)
{
    $index_hotlognum = Option::get('index_hotlognum');
    $Log_Model = new Log_Model();
    $hotlogs = $Log_Model->getLogsForHome("order by views desc", $page = 1, $index_hotlognum);
    ?>
    <div class="widget widget-hot">
        <h3><?php echo $title; ?></h3>
        <ul id="hotlog">
            <?php foreach ($hotlogs as $value):
                $imgsrc = getFirstAtt($value['logid']);
                if (!$imgsrc) {
                  $imgsrc = getImgFromDesc($value['content']);
                }
                ?>
                <li>
                    <a href="<?php echo Url::log($value['gid']); ?>">
                        <img class="lazyload" src="<?php echo TEMPLATE_URL;?>static/images/dna.svg" data-src="<?php echo $imgsrc; ?>"
                             alt="<?php echo $value['title']; ?>">
                        <h4>
                            <?php echo $value['title']; ?>
                        </h4>
                        <p class="info">
                            <span class="time"><?php echo gmdate('Y-n-j', $value['date']); ?></span>
                            <i class="iconfont icon-tongji"></i> <span class="view"><?php echo $value['views']; ?></span>
                        </p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php
//widget：随机文章
function widget_random_log($title)
{
    $index_randlognum = Option::get('index_randlognum');
    $Log_Model = new Log_Model();
    $randLogs = $Log_Model->getRandLog($index_randlognum); ?>
    <div class="widget widget-random-log">
        <h3><?php echo $title; ?></h3>
        <ul id="randlog">
            <?php foreach ($randLogs as $value): ?>
                <li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php
//widget：搜索
function widget_search($title) {
    $keyword = $_GET['keyword'];
    ?>
    <div class="widget widget-search">
        <h3><?php echo $title; ?></h3>
        <ul id="logsearch">
            <form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
                <input name="keyword" class="input" placeholder="search.." type="text" value="<?php echo $keyword;?>"/>
            </form>
        </ul>
    </div>
<?php } ?>
<?php
//widget：归档
function widget_archive($title)
{
    global $CACHE;
    $record_cache = $CACHE->readCache('record');
    ?>
    <div class="widget widget-archive">
        <h3><?php echo $title; ?></h3>
        <?php if (count($record_cache) < 5):?>
        <ul id="record">
            <?php foreach ($record_cache as $value): ?>
                <li><a href="<?php echo Url::record($value['date']); ?>">
                        <?php echo $value['record']; ?>
                        (<?php echo $value['lognum']; ?>)</a></li>
            <?php endforeach; ?>
        </ul>
            <?php else: ?>
            <?php
                $myChartData = array();
                foreach ($record_cache as $value) {
                    $myChartData['x'][] = $value['date'];
                    $myChartData['y'][] = $value['lognum'];
                }
            ?>
            <div id="archive-chart" style="height: 250px;width: 100%;" data-value='<?php echo json_encode($myChartData);?>'></div>
            <script src="<?php echo TEMPLATE_URL;?>/static/vendor/echarts.min.js"></script>
            <script type="text/javascript">
                $(function () {
                   // 存档折线图
                    var archiveChart = document.getElementById('archive-chart');
                    if (archiveChart) {
                        var data = $(archiveChart).data('value');
                        var myChart = window.echarts.init(archiveChart);
                        myChart.showLoading();
                        var option = {
                            calculable: true,
                            tooltip: {
                                trigger: 'axis',
                                axisPointer: {
                                    type: 'shadow'
                                }
                            },
                            xAxis: [
                                {
                                    type: 'category',
                                    data: data.x.reverse()
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    scale: true,
                                    name: '已发布'
                                }
                            ],
                            dataZoom: [
                                {
                                    show: true,
                                    type: 'slider'
                                }
                            ],
                            grid: {
                                left: '15%',
                                right: '15%'
                            },
                            series: [
                                {
                                    name: '文章数量',
                                    type: 'line',
                                    itemStyle: {
                                        normal: {
                                            color: '#333',
                                            lineStyle: {
                                                color: '#666'
                                            }
                                        }
                                    },
                                    data: data.y.reverse()
                                }
                            ]
                        };
                        myChart.setOption(option);
                        myChart.hideLoading();
                        myChart.on('click', function (e) {
                            var url = '<?php echo Url::record('666666');?>';
                            url = url.replace('666666', e.name);
                            window.location.href = url;
                        });
                    }
                });
            </script>
        <?php endif; ?>
    </div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content)
{ ?>
    <div class="widget">
        <h3><?php echo $title; ?></h3>
        <ul>
            <?php echo $content; ?>
        </ul>
    </div>
<?php } ?>
<?php
//widget：链接
function widget_link($title)
{
    global $CACHE;
    $link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
    ?>
    <div class="widget widget-link">
        <h3><?php echo $title; ?></h3>
        <div class="widget-inner">
            <?php
            foreach ($link_cache as $value):
                ?>
                <a class="log-tag" href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>"
                   target="_blank"><?php echo $value['link']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>
<?php
//blog：导航
function blog_navi()
{
    global $CACHE;
    $navi_cache = $CACHE->readCache('navi');
    ?>
    <ul class="menu" id="menu">
        <?php
        foreach ($navi_cache as $value):
            if ($value['pid'] != 0) {
                continue;
            }
            $newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
            $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
            $current = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'menu-item active' : 'menu-item';
            ?>
            <li class="<?php echo $current; ?>">
                <a href="<?php echo $value['url']; ?>" <?php echo $newtab; ?>><?php echo $value['naviname']; ?></a>
                <?php if (!empty($value['children'])) : ?>
                    <ul class="sub-menu">
                        <?php foreach ($value['children'] as $row) {
                            echo '<li><a href="' . Url::sort($row['sid']) . '">' . $row['sortname'] . '</a></li>';
                        } ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($value['childnavi'])) : ?>
                    <ul class="sub-menu">
                        <?php foreach ($value['childnavi'] as $row) {
                            $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                            echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'] . '</a></li>';
                        } ?>
                    </ul>
                <?php endif; ?>

            </li>
        <?php endforeach; ?>
    </ul>
<?php } ?>
<?php
/**
 * 如果登录的用户是管理员，或是本篇文章的作者，则可编辑
 * @param $gid int 本篇文章id
 * @param $author int 本篇文章作者uid
 */
function editable($gid, $author)
{
    $editable = ROLE == ROLE_ADMIN || $author == UID ? '<a href="' . BLOG_URL . DASHBOARD_DIR . '/write_log.php?action=edit&gid=' . $gid . '" target="_blank" class="edit"><i class="iconfont icon-edit"></i></a>' : '';
    echo $editable;
}

/**
 * 获取分类颜色
 * @param $sortid
 * @return mixed|string
 */
function blog_sort_color ($sortid) {
    $colors = array('#5d6e75', '#3870a8', '#4ba2ff', '#4f5356', '#e0a64c', '#177cb0', '#2e4e7e', '#057748', '#f05654', '#725e82');
    $color = $colors[intval($sortid % count($colors))];
    return $color ? $color : '#5d6e75';
}
//blog：分类
function blog_sort($blogid)
{
    global $CACHE;
    $log_cache_sort = $CACHE->readCache('logsort');

    if (!empty($log_cache_sort[$blogid])) {
        $sortid = $log_cache_sort[$blogid]['id'];
        $color = blog_sort_color($sortid);
        echo '<a href="';
        echo Url::sort($sortid);
        echo '" class="log-tag" style="background-color: ' . $color . '">';
        echo $log_cache_sort[$blogid]['name'];
        echo "</a>";
    } else {
        echo '<span class="log-tag" style="background-color: #54a8ff">未分类</span>';
    }
}

//blog：文章标签
function blog_tag($blogid, $btag = false)
{
    $tagModel = new Tag_Model();
    $log_cache_tags = $tagModel->getTag($blogid);
    if (!empty($log_cache_tags)) {
        $tag = '';
        if ($btag) {
            $tag = '<div class="b-tag"> <i class="iconfont icon-tag"></i> ';
        }
        foreach ($log_cache_tags as $value) {
            $tag .= "<a href='" . Url::tag($value['tagname']) . "'>" . $value['tagname'] . '</a> · ';
        }
        $tag = rtrim($tag, "·");
        if ($btag) {
            $tag .= '</div>';
        }
        echo $tag;
    }
}

?>
<?php
//blog：文章作者
function blog_author($uid)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $author = $user_cache[$uid]['name'];
    $mail = $user_cache[$uid]['mail'];
    $des = $user_cache[$uid]['des'];
    $title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
    echo '<a href="' . Url::author($uid) . "\" $title class='user'>$author</a>";
}

function get_author_by_uid($uid)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    return $user_cache[$uid];
}

?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog)
{
    extract($neighborLog); ?>
        <div class="prev">
            <i class="iconfont icon-left"></i>
            上一篇
            <?php if ($prevLog): ?>
            <h3><a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title']; ?></a></h3>
            <?php else: ?>
            <h3>往前没有了~</h3>
            <?php endif; ?>
        </div>
        <div class="next">
            下一篇
            <i class="iconfont icon-right"></i>
            <?php if ($nextLog): ?>
            <h3><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title']; ?></a></h3>
            <?php else: ?>
            <h3>往后没有了~</h3>
            <?php endif; ?>
        </div>
<?php } ?>
<?php
//blog：评论列表
function blog_comments($comments)
{
    extract($comments);
    if ($commentStacks): ?>
    <div class="panel comment-box">
        <div class="panel-heading">
            <a name="comments"></a>
            <h3 class="comment-header">评论列表：</h3>
        </div>
        <div class="panel-body">
            <?php
            $isGravatar = Option::get('isgravatar');
            foreach ($commentStacks as $cid):
            $comment = $comments[$cid];
            $comment['poster'] = $comment['url'] ? '<a href="' . $comment['url'] . '" target="_blank">' . $comment['poster'] . '</a>' : $comment['poster'];
            ?>
            <div class="comment" id="comment-<?php echo $comment['cid']; ?>">
                <a name="<?php echo $comment['cid']; ?>"></a>
                <?php if ($isGravatar == 'y'): ?>
                    <div class="avatar"><img src="<?php echo _getGravatar($comment['mail']); ?>"/></div><?php endif; ?>
                <div class="comment-info">
                    <div class="poster"><?php echo $comment['poster']; ?> </div>
                    <span class="comment-time"><?php echo
                        $comment['date']; ?></span>
                    <div class="comment-content"><?php echo $comment['content']; ?></div>
                    <div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>"
                                                  onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
                </div>
            </div>
            <?php blog_comments_children($comments, $comment['children']); ?>
        <?php endforeach; ?>
            <div class="pagination" id="pagenavi">
                <?php echo $commentPageUrl; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php } ?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children)
{
    $isGravatar = Option::get('isgravatar');
    foreach ($children as $child):
        $comment = $comments[$child];
        $comment['poster'] = $comment['url'] ? '<a href="' . $comment['url'] . '" target="_blank">' . $comment['poster'] . '</a>' : $comment['poster'];
        ?>
        <div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>">
            <a name="<?php echo $comment['cid']; ?>"></a>
            <?php if ($isGravatar == 'y'): ?>
                <div class="avatar"><img src="<?php echo _getGravatar($comment['mail']); ?>"/></div><?php endif; ?>
            <div class="comment-info">
                <b><?php echo $comment['poster']; ?> </b><br/><span
                        class="comment-time"><?php echo $comment['date']; ?></span>
                <div class="comment-content"><?php echo $comment['content']; ?></div>
                <?php if ($comment['level'] < 4): ?>
                    <div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>"
                                                  onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>
                    </div><?php endif; ?>
            </div>
            <?php blog_comments_children($comments, $comment['children']); ?>
        </div>
    <?php endforeach; ?>
<?php } ?>
<?php
//blog：发表评论表单
function blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark)
{
    if ($allow_remark == 'y'): ?>
        <div id="comment-place">
            <div class="panel" id="comment-post">
                <div class="panel-heading">
                    <h3 class="comment-header">发表评论<a name="respond"></a>
                    <a href="javascript:void(0);" id="cancel-reply" style="display: none;" class="fr" onclick="cancelReply()">取消回复</a>
                    </h3>
                </div>
                <div class="comment-post panel-body">
                    <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom"
                          id="commentform">
                        <input type="hidden" name="gid" value="<?php echo $logid; ?>"/>
                        <?php if (ROLE == ROLE_VISITOR): ?>
                            <div class="form-group">
                                <label for="comname">昵称</label>
                                <input type="text" class="input" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22"
                                       tabindex="1" placeholder="昵称">
                            </div>
                            <div class="form-group">
                                <label for="commail">邮件地址 (选填)</label>
                                <input type="text" class="input" name="commail" maxlength="128" value="<?php echo $ckmail; ?>" size="22"
                                       tabindex="2" placeholder="填写邮件方便联系">
                            </div>
                            <div class="form-group">
                                <label for="comurl">个人主页 (选填)</label>
                                <input type="text" class="input" name="comurl" maxlength="128" value="<?php echo $ckurl; ?>" size="22"
                                       tabindex="3">
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="comment">评论内容</label>
                            <textarea name="comment" class="input" id="comment" rows="5" tabindex="4" placeholder="请文明评论"></textarea>
                        </div>
                        <?php if (!empty($verifyCode)):?>
                        <div class="form-group">
                            <label for="comment">验证码</label>
                            <div class="verify-code">
                                <?php echo $verifyCode; ?>
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <button type="submit" id="comment_submit" class="btn">发表评论</button>
                        </div>
                        <input type="hidden" name="pid" id="comment-pid" value="0" size="22"/>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome()
{
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL) {
        return true;
    } else {
        return FALSE;
    }
}

// 由gid获取文章信息
function getOneLogByGid($gid)
{
    $log = new Log_Model();
    return $log->getOneLogForHome($gid);
}

/**
 * 获取系统信息，包括文章数，阅读量，留言数
 * @param $uid
 * @return array
 */
function getSystemInfo($uid)
{
    $db = Database::getInstance();
    $blogMap = "hide = 'n' and checked = 'y' and type = 'blog'";
    if ($uid) {
        $blogMap .= ' and author = ' . $uid;
    }
    $articleNumSql = "select count(*) as article from " . DB_PREFIX . "blog where " . $blogMap;
    $viewNumSql = "SELECT sum(views) as views FROM  " . DB_PREFIX . "blog where " . $blogMap;
    $data = array();
    if (!$uid) {
        $commentsNumSql = "SELECT count(*) as comments FROM " . DB_PREFIX . "comment";
        $commentsNum = $db->fetch_array($db->query($commentsNumSql));
        $data['commentsNum'] = $commentsNum['comments'];
    }

    $articleNum = $db->fetch_array($db->query($articleNumSql));
    $viewNum = $db->fetch_array($db->query($viewNumSql));

    $data['articelNum'] = $articleNum['article'];
    $data['viewNum'] = $viewNum['views'] ? $viewNum['views'] : 0;

    return $data;
}

/**
 * 获取第一个上传的图片附件,没有则返回默认图片
 */
function getFirstAtt ($blogid) {
    $db = Database::getInstance();
    $sql = 'select * from ' . DB_PREFIX . 'attachment where blogid = ' . $blogid . ' and mimetype like "image%"';
    $query = $db->query($sql);
    $filepath = '';
    while($res = $db->fetch_array($query)) {
        if ($res['thumfor'] > 0) {
            $filepath = $res['filepath'];
            break;
        }
        if (empty($filepath)) {
            $filepath = $res['filepath'];
        }
    }
    if (empty($filepath)) {
        return false;
    }
    return BLOG_URL . $filepath;
}

/**
 * 获取一段html中的第一个图片
 * @param $content
 * @return string img
 */
function getImgFromDesc($content)
{
    preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
    return !empty($img[1]) ? $img[1][0] : TEMPLATE_URL . 'static/images/default.jpg';
}

/**
 * 获取某用户的头像
 * @param int $uid 用户的id
 * @return string 头像的URL, 如该用户没有头像会返回一个默认头像
 */
function getAuthorAvatar($uid = 1)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $photo = $user_cache[$uid]['photo'];
    return !empty($photo) ? BLOG_URL . $photo['src'] : BLOG_URL . DASHBOARD_DIR . '/views/images/avatar.jpg';
}

/**
 * 根据分类id，获取该分类下的文章列表
 * @param $sid
 * @param int $perPageNum
 * @return array
 */
function getArticleBySortID ($sid, $perPageNum = 20) {
    $log = new Log_Model();
    return $log->getLogsForHome('and sortid = "' . $sid . '" order by sortop desc, gid desc', 1, $perPageNum);
}

/**
 * 获取分类列表
 * @param $except array 要排除的分类id数组
 * @return array
 */
function getSorts ($except = array()) {
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort');
    $data = array();
    foreach ($sort_cache as $key => $item) {
        if (!in_array($key,$except)) {
            $data[$key] = $item;
        }
    }
    return $data;
}

/**
 * 根据分类id，获取该分类下的置顶文章
 * @param $sid
 * @param int $perPageNum
 * @return array
 */
function getTopArticle ($sid = 0, $perPageNum = 20) {
    $log = new Log_Model();
    $map = 'and top = "y"';
    if ($sid) {
        $map = 'and sortid = "' . $sid . '" and sortop = "y"';
    }
    return $log->getLogsForHome($map, 1, $perPageNum);
}

/**
 * 获取到热门标签的数据
 * @param int $num
 * @return mixed
 */
function getHotTag ($num = 10) {
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags');
    $sort = array(
        'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
        'field' => 'usenum',       //排序字段
    );
    $arrSort = array();
    foreach ($tag_cache AS $uniqid => $row) {
        foreach ($row AS $key => $value) {
            $arrSort[$key][$uniqid] = $value;
        }
    }
    if (!empty($arrSort) && $sort['direction']) {
        array_multisort($arrSort[$sort['field']], constant($sort['direction']), $tag_cache);
    }
    return array_slice($tag_cache, 0, $num);
}

/**
 * 获取随机的标签
 * @param int $num
 * @return array
 */
function getRandomTags ($num = 10) {
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags');
    
    $data = array();
    $len = count($tag_cache);
    $num = $num > $len ? $len : $num;

    for($i = 0; $i < $num; $i++) {
        $len = count($tag_cache);
        $index = rand(1, $len);
        $data[] = $tag_cache[$index-1];
        array_splice($tag_cache, $index-1, 1);
    }
    return $data;
}

/**
 * 获取随机banner图片
 * @return string
 */
function getRandomHeaderBg () {
    $len = count(scandir(TEMPLATE_PATH . 'static' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'banner')) - 2;
    $index = rand(1, $len);
    return "background-image: url('" . TEMPLATE_URL . "static/images/banner/banner{$index}.jpg');";
}

/**
 * 减少数字得显示
 * @param int $num
 * @return int|string
 */
function smartNum ($num = 0) {
    $num = intval($num);
    if ($num > 9999999) {
        return round($num / 10000000, 2) . 'kw';
    } elseif ($num > 999999) {
        return round($num / 1000000, 2) . 'm';
    } elseif ($num > 9999) {
        return round($num / 10000, 2) . 'w';
    } elseif ($num > 999) {
        return round($num / 1000, 2) . 'k';
    } else {
        return $num;
    }
}

/**
 * 获取随机的一个深颜色
 * @return mixed
 */
function getRandomDarkColor () {
    $colors = array('#5d6e75', '#3870a8', '#4ba2ff', '#4f5356', '#e0a64c', '#177cb0', '#2e4e7e', '#057748', '#f05654', '#725e82');
    $len = count($colors) - 1;
    $index = rand(0, $len);
    return $colors[$index];
}

/**
 * 根据uid获取用户信息
 * @param $uid
 * @return mixed
 */
function bloggerInfo($uid)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $author = $user_cache[$uid];
    if (empty($author['avatar'])) {
        $author['avatar'] = TEMPLATE_URL . 'static/images/default_avatar.png';
    } else {
        $author['avatar'] = BLOG_URL . $author['avatar'];
    }
    return $author;
}

/**
 * 999+
 * @param $num
 * @return int|string
 */
function nineplus ($num) {
    return $num > 999 ? '999+' : $num;
}

/**
 * 获取相关文章（分类中的热门文章）
 */
function getRelationLogs($sid, $num = 10)
{
    $log = new Log_Model();
    $logs = $log->getLogsForHome('and sortid = "' . $sid . '" order by views desc', 1, $num);
    $data = array();
    foreach ($logs as $row) {
        $row['gid'] = intval($row['gid']);
        $row['title'] = htmlspecialchars($row['title']);
        $row['url'] = Url::log($row['gid']);
        $data[] = $row;
    }
    return $data;
}

/**
 * 返回置顶标志
 * @param string $top
 * @param string $sortop
 * @param string $type
 * @return string
 */
function topflag ($top = "y", $sortop = "n", $type = "text") {
    if ($top === "y" || $sortop === "y") {
        return "<span class='topflag'>【置顶】</span>";
    }
    return "";
}