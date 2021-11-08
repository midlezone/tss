<?php
if (count($banners)) {
    foreach ($banners as $banner) {
        ?>
        <div class="col-sm-6">
            <a <?php echo Banners::getTarget($banner) ?> href="<?php echo $banner['banner_link'] ?>">
                <img <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>">
            </a>
        </div>
        <?php
    }
}
