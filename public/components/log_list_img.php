<div class="main container">
    <ul class="log_list log_list_img">
<?php
for ($i = 1; $i < 11; $i++) {
?>
        <li class="log_list_item">
            <a href="/echo_log.php">
                <img src="dist/images/<?php echo 'imglist' . $i . '.jpg'; ?>">
            </a>
            <h3>标题-发现多彩的世界 <span style="float: right;font-size: 14px;">上传于: 2017/02/12</span></h3>
        </li>

<?php } ?>
    </ul>
    <!--分页-->
    <div class="pagination">
        <span>1</span>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
    </div>
    <!--分页 ／-->
</div>
