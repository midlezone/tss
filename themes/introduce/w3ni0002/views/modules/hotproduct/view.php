<?php if (count($products)) { ?>
    <div class="phot" style="overflow: hidden;">
        <?php if ($show_widget_title) { ?>
            <span class="wtitle"><?php echo $widget_title; ?></span>
        <?php } ?>
        <?php
        foreach ($products as $pro) {
            $link = Yii::app()->createUrl('economy/product/detail', array('id' => $pro['id'], 'alias' => $pro['alias']));
            ?>
            <div class="post">
                <div class="box-top">
                    <i class="icon-post"></i>
                    <a href="<?php echo $link; ?>">
                        <?php echo $pro['name']; ?>
                    </a>
                </div>
                <div class="box" align="center">
                    <span class="box-img">
                        <a href="<?php echo $link; ?>">
                            <?php if ($pro['avatar_path'] && $pro['avatar_name']) { ?>
                                <img src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's220_220/' . $pro['avatar_name'] ?>" />
                            <?php } ?>
                        </a>
                    </span>
                    <p class="box-description">
                        <?php echo $pro['product_sortdesc']; ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>