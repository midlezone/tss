<?php if (count($banners)) { ?>
    <ul class="social">
        <?php
        foreach ($banners as $banner) {
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $src = $banner['banner_src'];
            $link = $banner['banner_link'];
            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                ?>
                <li>
                    <i>
                        <a target="_black" href="<?php echo $link; ?>">
                            <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> max-width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                        </a>
                    </i>
                </li>
                <?php
            }
        }
        ?>
    </ul>
<?php } ?>