<?php if (count($banners)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h3><?php echo $widget_title ?></h3>
        </div>
    <?php } ?>
    <div class="body">
        <?php
        foreach ($banners as $banner) {
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $src = $banner['banner_src'];
            $link = $banner['banner_link'];
            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                ?>
                <div class="item">
                    <div class="item-title">
                        <div class="item-title-img">
                            <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                        </div>
                        <div class="item-content">
                            <p><?php echo $banner['banner_description'] ?></p>
                        </div>
                    </div>
                    <div class="item"></div>
                </div>
            <?php }
        } ?>
    </div>
<?php } ?>