<div class="bannergroup-style-2" id="<?php echo $id; ?>">
    <div class="ivslider">
        <?php
        foreach ($banners as $banner) {
            if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                continue;
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            ?>
            <div data-iview:image="<?php echo $banner['banner_src']; ?>" data-iview:transition="block-random,zigzag-top,zigzag-bottom,strip-right-fade,strip-left-fade">
                <?php if ($banner['banner_description']) { ?>
                    <div class="iview-caption" data-transition="wipedown" vertical="bottom" data-x="50" data-y="50">
                        <?php echo $banner['banner_description']; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>