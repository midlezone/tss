<div class="sp-main-sp">
    <?php if ($products && count($products)) { ?>
        <?php
        foreach ($products as $pro) {
            $link = Yii::app()->createUrl('/economy/product/detail', array('id' => $pro['id'], 'alias' => $pro['alias']));
            ?>
            <div class="boder-sp-main-sp">
                <div class="sp">
                    <a href="<?php echo $link; ?>">
                        <img src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's330_330/' . $pro['avatar_name'] ?>">
                    </a>
                    <p class="sp-name-sp">
                        <a href="<?php echo $link; ?>"><?php echo $pro['name'] ?></a>
                    </p>
                </div>
            </div>
        <?php } ?>
        <div style="clear:both"></div>

    <?php } else { ?>
        <p style="padding-top: 10px;">
            <?php echo Yii::t('product', 'havenoproduct') ?>
        </p>
    <?php } ?>
</div>
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