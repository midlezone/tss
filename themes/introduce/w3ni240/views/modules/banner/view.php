<?php
if (count($banners)) {
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];

        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            ?>
            <div class="col-xs-4 box-dvnb">
                <div class="box-img">
                    <a href="<?php $link ?>" title="<?php echo $banner['banner_name']; ?>">
                        <img src="<?php echo $src; ?>" alt="<?php echo $banner['banner_name']; ?>"/>
                    </a>
                </div>
                <div class="title-products">
                    <h2><a href="<?php echo $link ?>" title="<?php echo $banner['banner_name'] ?>"><?php echo $banner['banner_name'] ?></a></h2>
                </div>
            </div>
            <?php
        }
    }
}