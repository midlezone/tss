<?php if (count($banners)) { ?>
    <div class="box-banner-con">
        <div class="row">
            <?php foreach ($banners as $banner) { ?>
                <div class="col-xs-4 banner-con">
                    <div class="hover-sp">
                        <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>" class="a-btn-2 black">
                            <span class="a-btn-2-text">xem chi tiết</span> </a>
                        <a href="<?php echo $banner['banner_link'] ?>" class="bg-sp"></a>
                    </div>
                    <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
                        <img src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
