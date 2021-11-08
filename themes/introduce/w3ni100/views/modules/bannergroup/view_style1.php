<?php if ($banners && count($banners)) { ?>
    <div class="jcarousel-wrapper-none">
        <div class="script jcarousel">
            <ul>
                <?php
                foreach ($banners as $banner) {
                    if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                        continue;
                    $height = $banner['banner_height'];
                    $width = $banner['banner_width'];
                    ?>
                    <li style="<?php echo ($height) ? 'height:' . $height . 'px;' : 'height:404px;' ?><?php echo ($width) ? 'width:' . $width . 'px;' : '' ?> "><a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?>>
                            <img src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> />
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!--end-script-->
<?php } ?>