<?php if (count($banners)) { ?>
    <div class="social">
        <ul class="clearfix">
            <?php foreach ($banners as $banner) { ?>
            <li>
                <a <?php echo Banners::getTarget($banner) ?> href="<?php echo $banner['banner_link'] ?>">
                    <img <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>">
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>