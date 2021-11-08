<?php if ($banners && count($banners)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><a onclick="javascript:void(0)"><?php echo $widget_title ?></a></h2>
        </div>
    <?php } ?>
    <div class="cont">
        <div id="demo" >
            <div class="row">
                <div class="span12">
                    <div id="owl-demo" class="owl-carousel owl-demo">
                        <?php foreach ($banners as $banner) { ?>
                            <div class="item ">
                                <div class="box-img">
                                    <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
                                        <img <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> src="<?php echo $banner['banner_src']; ?>" >
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


