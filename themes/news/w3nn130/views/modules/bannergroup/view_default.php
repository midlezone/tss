<?php if ($banners && count($banners)) { ?>
    <div class="bannergroup-default bot-box-js" id="<?php echo $id; ?>">
        <!--end-script-->
        <div class="box-js">
            <div class="js">
                <div class="jcarousel-wrapper-none">
                    <div class="script jcarousel">
                        <ul style="left: 0px; top: 0px;">
                            <?php
                            foreach ($banners as $banner) {
                                if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                                    continue;
                                $height = $banner['banner_height'];
                                $width = $banner['banner_width'];
                                ?>
                                <li>
                                    <a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name']; ?>">
                                        <img src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <a class="jcarousel-control-next" href="#"></a>
                        <a class="jcarousel-control-prev" href="#"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php } ?>