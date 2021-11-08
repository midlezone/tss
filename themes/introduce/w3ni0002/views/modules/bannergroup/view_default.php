<?php if ($banners && count($banners)) { ?>
    <div id="doitac">
        <!--end-script-->
        <span class="title"><?php echo $widget_title; ?></span>
        <div class="next">
            <a class="tiep jcarousel-control-next" href="#"></a>
            <a class="quaylai jcarousel-control-prev" href="#"></a>
        </div>   
        <div class="doitac-boder-top jcarousel">
            <ul class="djc">
                <?php
                foreach ($banners as $banner) {
                    if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                        continue;
                    $height = $banner['banner_height'];
                    $width = $banner['banner_width'];
                    ?>
                    <li>
                        <a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?>>
                            <img src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> />
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>