<?php if (count($products)) {
    ?>
    <?php
    foreach ($products as $pro) {
        $link = Yii::app()->createUrl('/economy/product/detail', array('id' => $pro['id'], 'alias' => $pro['alias']));
        ?>
        <div class="content-post1">
            <p class="post1-tt">
                <a class="n-title" href="<?php echo $link; ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's150_150/' . $pro['avatar_name'] ?>">
                </a>
            </p>
            <p class="title-post">
                <a href="<?php echo $link ?>">
                    <?php
                    echo $pro['name'];
                    ?>
                </a>
            </p>
            <p class="conten-noidung">
                <?php echo $pro['product_sortdesc']; ?>
            </p>
            <a class="read_more" cla href="<?php echo $link; ?>">Xem Tiếp...</a>
        </div><!--end-post-tt-main-->
    <?php } ?>
    <div class='list-move-sp'>
        <?php
        $this->widget('common.extensions.LinkPager.LinkPager', array(
            'itemCount' => $totalitem,
            'pageSize' => $limit,
            'header' => '',
            'showfirstPage' => false,
            'showlastPage' => false,
            'htmlOptions' => array('class' => 'sp-list-move-sp',), // Class for ul
            'selectedPageCssClass' => 'active',
        ));
        ?>
    </div>
<?php } ?>