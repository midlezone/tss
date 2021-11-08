<?php if (count($banners)) { ?>
    <div class="banner-right">
        <?php foreach ($banners as $banner) { ?>
            <div class="top-banner-right">
                <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
                    <img src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>" />
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>