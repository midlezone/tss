<?php if (count($banners)) { ?>
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php if ($show_widget_title) { ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <!--<h4 class="modal-title" id="myModalLabel"></h4>-->
                    </div>
                <?php } ?>
                <div class="modal-body">
                    <?php
                    foreach ($banners as $banner) {
                        $height = $banner['banner_height'];
                        $width = $banner['banner_width'];
                        $src = $banner['banner_src'];
                        $link = $banner['banner_link'];
                        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                            ?>
                            <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                                <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> max-width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                            </a>
                        <?php } else {
                            ?>
                            <a style="display: block;" href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                                <object <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width ?>" <?php } ?> >
                                    <param name="wmode" value="transparent">
                                    <param name="movie" value="<?php echo $src ?>">
                                    <embed <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width ?>" <?php } ?> src="<?php echo $src ?>" wmode="transparent">
                                </object>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
