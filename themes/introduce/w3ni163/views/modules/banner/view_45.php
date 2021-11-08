<?php if (count($banners)) { 
    foreach ($banners as $banner) {
    ?>
    <div class="banner-full-width">
        <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
            <img src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>" />
        </a>
    </div>
<?php } } ?>
