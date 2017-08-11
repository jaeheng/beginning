<?php
/**
 * 侧边栏组件、页面模块
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<?php
//widget：blogger
function widget_blogger($title)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:" . $user_cache[1]['mail'] . "\">" . $user_cache[1]['name'] . "</a>" : $user_cache[1]['name']; ?>
    <div class="widget widget-user">
        <h3><?php echo $title; ?></h3>
        <ul id="bloggerinfo">
            <div id="bloggerinfoimg">
                <?php if (!empty($user_cache[1]['photo']['src'])): ?>
                    <img src="<?php echo BLOG_URL . $user_cache[1]['photo']['src']; ?>"
                         width="<?php echo $user_cache[1]['photo']['width']; ?>"
                         height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger"/>
                <?php endif; ?>
            </div>
            <p><b><?php echo $name; ?></b>
                <?php echo $user_cache[1]['des']; ?></p>
        </ul>
    </div>
<?php } ?>
<?php
//widget：日历
function widget_calendar($title)
{ ?>
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
            <?php foreach ($tag_cache as $value): ?>
                <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章" class="widget-tag"><?php echo $value['tagname']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>

<?php
//widget：热门标签
function widget_hot_tag($num = 10)
{
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
    ?>
    <div class="widget widget-topic">
        <h3>热门话题</h3>
        <div class="widget-inner">
            <?php $i = 0;
            foreach ($tag_cache as $value): $i++;
                if ($i > $num) break; ?>
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
            foreach ($sort_cache as $value):
                if ($value['pid'] != 0) continue;
                ?>
                <li>
                    <a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>
                        (<?php echo $value['lognum'] ?>)</a>
                </li>
                <?php if (!empty($value['children'])): ?>
                <?php
                $children = $value['children'];
                foreach ($children as $key):
                    $value = $sort_cache[$key];
                    ?>
                    <li>
                        <a href="<?php echo Url::sort($value['sid']); ?>">| <?php echo $value['sortname']; ?>
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
        <h3><?php echo $title; ?></h3>
        <ul id="twitter">
            <?php foreach ($newtws_cache as $value): ?>
                <?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="' . BLOG_URL . str_replace('thum-', '', $value['img']) . '" target="_blank">&nbsp;</a>'; ?>
                <li><?php echo $value['t']; ?><?php echo $img; ?><p><?php echo smartDate($value['date']); ?></p></li>
            <?php endforeach; ?>
            <?php if ($istwitter == 'y') : ?>
                <p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
            <?php endif; ?>
        </ul>
    </div>
<?php } ?>
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
                        <img class="avatar" src="<?php echo getGravatar($value['mail']); ?>">
                        <i class="username"><?php echo $value['name']; ?></i>
                        <span class="time"><?php echo $time; ?></span>
                        <p class="comment-content"><?php echo $value['content']; ?></p>
                    </div>
                    <div class="comment-refer">
                        <i class="iconfont icon-yinhao"></i>
                        <span class="t">来源<a href="<?php echo $url; ?>"
                                             target="_blank"><?php echo $log['log_title']; ?></a></span>
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
    $randLogs = $Log_Model->getLogsForHome("order by views desc", $page = 1, $index_hotlognum);
    ?>
    <div class="widget widget-hot">
        <h3><?php echo $title; ?></h3>
        <ul id="hotlog">
            <?php foreach ($randLogs as $value): ?>
                <li>
                    <a href="<?php echo Url::log($value['gid']); ?>">
                        <img src="<?php echo getImgFromDesc($value['content']); ?>"
                             alt="<?php echo $value['title']; ?>">
                        <h4><?php echo $value['title']; ?></h4>
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
function widget_search($title)
{ ?>
    <div class="widget widget-search">
        <h3><?php echo $title; ?></h3>
        <ul id="logsearch">
            <form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
                <input name="keyword" class="input" style="width: 100%;box-sizing: border-box;border: 1px solid #eee;"
                       placeholder="search.." type="text"/>
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
        <ul id="record">
            <?php foreach ($record_cache as $value): ?>
                <li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>
                        (<?php echo $value['lognum']; ?>)</a></li>
            <?php endforeach; ?>
        </ul>
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
    <div class="widget">
        <h3><?php echo $title; ?></h3>
        <div class="widget-inner">
            <?php foreach ($link_cache as $value): ?>
                <a class="label label-tag" href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>"
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
//blog：编辑
function editflg($logid, $author)
{
    $editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="' . BLOG_URL . 'admin/write_log.php?action=edit&gid=' . $logid . '" target="_blank">编辑</a>' : '';
    echo $editflg;
}

?>
<?php
//blog：分类
function blog_sort($blogid)
{
    global $CACHE;
    $log_cache_sort = $CACHE->readCache('logsort');
    if (!empty($log_cache_sort[$blogid])) {
        echo '<a href="';
        echo Url::sort($log_cache_sort[$blogid]['id']);
        echo '">';
        echo $log_cache_sort[$blogid]['name'];
        echo "</a>";
    } else {
        echo '未分类';
    }
}

//blog：文章标签
function blog_tag($blogid)
{
    global $CACHE;
    $log_cache_tags = $CACHE->readCache('logtags');
    if (!empty($log_cache_tags[$blogid])) {
        $tag = '';
        foreach ($log_cache_tags[$blogid] as $value) {
            $tag .= "<a href='" . Url::tag($value['tagurl']) . "' class='label label-tag'>#" . $value['tagname'] . '#</a>';
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
    <?php if ($prevLog): ?>
    <div class="prev">
        <i class="iconfont icon-left"></i>
        上一篇
        <h3><a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title']; ?></a></h3>
    </div>
<?php endif; ?>
    <?php if ($nextLog): ?>
    <div class="next">
        下一篇
        <i class="iconfont icon-right"></i>
        <h3><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title']; ?></a></h3>
    </div>
<?php endif; ?>
<?php } ?>
<?php
//blog：评论列表
function blog_comments($comments)
{
    extract($comments);
    if ($commentStacks): ?>
        <a name="comments"></a>
        <h3 class="comment-header">评论：</h3>
    <?php endif; ?>
    <?php
    $isGravatar = Option::get('isgravatar');
    foreach ($commentStacks as $cid):
        $comment = $comments[$cid];
        $comment['poster'] = $comment['url'] ? '<a href="' . $comment['url'] . '" target="_blank">' . $comment['poster'] . '</a>' : $comment['poster'];
        ?>
        <div class="comment" id="comment-<?php echo $comment['cid']; ?>">
            <a name="<?php echo $comment['cid']; ?>"></a>
            <?php if ($isGravatar == 'y'): ?>
                <div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>"/></div><?php endif; ?>
            <div class="comment-info">
                <div class="poster"><?php echo $comment['poster']; ?> </div>
                <span class="comment-time"><?php echo
                    $comment['date']; ?></span>
                <div class="comment-content"><?php echo $comment['content']; ?></div>
                <div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>"
                                              onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
            </div>
            <?php blog_comments_children($comments, $comment['children']); ?>
        </div>
    <?php endforeach; ?>
    <div class="pagination" id="pagenavi">
        <?php echo $commentPageUrl; ?>
    </div>
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
                <div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>"/></div><?php endif; ?>
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
            <div class="comment-post" id="comment-post">
                <div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);"
                                                                                    onclick="cancelReply()">取消回复</a>
                </div>
                <h3 class="comment-header">发表评论:<a name="respond"></a></h3>
                <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom"
                      id="commentform">
                    <input type="hidden" name="gid" value="<?php echo $logid; ?>"/>
                    <?php if (ROLE == ROLE_VISITOR): ?>
                        <div class="form-group">
                            <label for="comname">昵称</label>
                            <input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22"
                                   tabindex="1" placeholder="昵称">
                        </div>
                        <div class="form-group">
                            <label for="commail">邮件地址 (选填)</label>
                            <input type="text" name="commail" maxlength="128" value="<?php echo $ckmail; ?>" size="22"
                                   tabindex="2" placeholder="填写邮件方便联系">
                        </div>
                        <div class="form-group">
                            <label for="comurl">个人主页 (选填)</label>
                            <input type="text" name="comurl" maxlength="128" value="<?php echo $ckurl; ?>" size="22"
                                   tabindex="3">
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="comment">评论内容</label>
                        <textarea name="comment" id="comment" rows="5" tabindex="4" placeholder="请文明评论"></textarea>
                    </div>
                    <p><?php echo $verifyCode; ?> <input type="submit" id="comment_submit" value="发表评论" class="btn"
                                                         tabindex="6"/></p>
                    <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
                </form>
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
 * @author jaeheng <jaeheng@126.com>
 * @return array [article, viewNum, commentsNum]
 */
function getSystemInfo()
{
    $articleNumSql = "select count(*) as article from " . DB_PREFIX . "blog where hide = 'n' and checked = 'y' and type = 'blog'";
    $viewNumSql = "SELECT sum(views) as views FROM  " . DB_PREFIX . "blog where type = 'blog' and hide = 'n' and checked = 'y'";
    $commentsNumSql = "SELECT count(*) as comments FROM " . DB_PREFIX . "comment";

    $db = Database::getInstance();
    $articleNum = $db->fetch_array($db->query($articleNumSql));
    $viewNum = $db->fetch_array($db->query($viewNumSql));
    $commentsNum = $db->fetch_array($db->query($commentsNumSql));
    return array(
        'articelNum' => $articleNum['article'],
        'viewNum' => $viewNum['views'] ? $viewNum['views'] : 0,
        'commentsNum' => $commentsNum['comments']
    );
}

/**
 * 获取一段html中的第一个图片
 * @param $content
 * @return string img
 */
function getImgFromDesc($content)
{
    preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
    return !empty($img[1]) ? $img[1][0] : TEMPLATE_URL . 'dist/images/article.jpg';
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
    return !empty($photo) ? BLOG_URL . $photo['src'] : BLOG_URL . 'admin/views/images/avatar.jpg';
}