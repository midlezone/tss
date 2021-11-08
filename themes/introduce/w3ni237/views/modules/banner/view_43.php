<?php
if (count($banners)) {
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];
        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            ?>
            <div class="col-sm-4 box-product1">
                <div class="box-img">
                    <a href="<?php echo $link; ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name']; ?>">
                        <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                    </a>
                </div>
            </div>
            <?php
        }
    }
} 