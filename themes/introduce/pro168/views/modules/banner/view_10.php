<!--Banner Header-->
<?php
if (count($banners)) {
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];
        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            ?>
            <a target='blank'  href="<?php echo $link ?>" title="<?php echo $banner['banner_name'] ?>"> 
                <img src="<?php echo $src ?>" alt="<?php echo $banner['banner_name'] ?>" />
            </a>
        <?php
        }
    }
}
?>


