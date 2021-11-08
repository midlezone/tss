<?php if (count($banners)) { ?>
    <div class="banner-main">
        <div class="container">
            <div class="row">
                <?php
                foreach ($banners as $banner) {
                    $height = $banner['banner_height'];
                    $width = $banner['banner_width'];
                    $src = $banner['banner_src'];
                    $link = $banner['banner_link'];
                    if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                        ?>
                        <div class="col-sm-6">
                            <div class="box-banner-main">
                                <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                                    <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> max-width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>