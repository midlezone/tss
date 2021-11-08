<?php if (count($banners)) { ?>
    <ul>
        <?php
        foreach ($banners as $banner) {
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $src = $banner['banner_src'];
            $link = $banner['banner_link'];
            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                ?>
                <li>
                    <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                        <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                    </a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <?php
} 
  