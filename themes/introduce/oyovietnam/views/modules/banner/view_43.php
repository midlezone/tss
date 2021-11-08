<div class="doi-tac well animated fadeOutDown"  data-sb="fadeInDown" data-sb-hide="fadeOutDown">
    <div class="container">
        <div class="box-js">
            <div class="js">
                <div class="jcarousel-wrapper"> <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a> <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
                    <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                        <ul style="left: -220.376328959382px; top: 0px;">
                            <?php
                            foreach ($banners as $banner) {
                                $height = $banner['banner_height'];
                                $width = $banner['banner_width'];
                                $src = $banner['banner_src'];
                                $link = $banner['banner_link'];
                                if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                                    ?>
                                    <li> 
                                        <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name'] ?>">
                                            <img src="<?php echo $src ?>" alt="<?php echo $banner['banner_name'] ?>" />
                                        </a>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
