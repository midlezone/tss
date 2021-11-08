<div class="padding10">
    <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
</div>
<div class="tt-main-tt">
    <?php if (count($data)) { ?>
        <?php
        foreach ($data as $ne) {
            $link = Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias']));
            $avatar = ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name'];
            ?>
            <div class="post-tt-main">
                <a class="n-title" href="<?php echo $link; ?>">
                    <?php
                    echo $ne['news_title'];
                    ?>
                </a>
                <div style="overflow: hidden;">
                    <div class="post1-tt">
                        <a href="<?php echo $link ?>">
                            <img src="<?php echo $avatar; ?>">
                        </a>
                    </div>
                    <p>
                        <?php echo $ne['news_sortdesc']; ?>
                    </p>
                    <p><a href="<?php echo $link; ?>">Xem Tiếp...</a></p>
                </div>
            </div><!--end-post-tt-main-->
        <?php } ?>
    <?php } ?>
</div>
<div class='list-move-sp'>
    <?php
    $this->widget('common.extensions.LinkPager.LinkPager', array(
        'itemCount' => $totalitem,
        'pageSize' => $pagesize,
        'header' => '',
        'showfirstPage' => false,
        'showlastPage' => false,
        'htmlOptions' => array('class' => 'sp-list-move-sp',), // Class for ul
        'selectedPageCssClass' => 'active',
    ));
    ?>
</div>