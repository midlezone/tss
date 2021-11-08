<div class="bannergroup-style-2" id="<?php echo $id; ?>">
    <div class="ivslider" style="height: 436px;">
        <?php
        foreach ($banners as $banner) {
            if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                continue;
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            ?>
            <div data-iview:image="<?php echo $banner['banner_src']; ?>" data-iview:transition="block-random,zigzag-top,zigzag-bottom,strip-right-fade,strip-left-fade">
                <?php if ($banner['banner_description']) { ?>
                    <?php echo $banner['banner_description']; ?>                    
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>