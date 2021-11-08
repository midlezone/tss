<?php if (count($banners)) { ?>
<div class="banner-menu">
    <?php foreach ($banners as $banner) { ?>
    <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
        <img src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>" />
    </a>
    <?php } ?>
</div>
<?php } ?>