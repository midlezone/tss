
<?php if (count($banners)) { ?>
    <div class="partner">
        <div class="container">
            <div class="row eventbox">
                   <div class="title-m">
						<h2>
							<a title="" href="">
								Đối Tác</a>
						</h2>
				</div>
                <div id="partner-body" class="col-sm-12 partner-body" style="clear: both;">
                    <?php
                    foreach ($banners as $banner) {
                        $height = $banner['banner_height'];
                        $width = $banner['banner_width'];
                        $src = $banner['banner_src'];
                        $link = $banner['banner_link'];
                        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                            ?>
                            <div class="item">
                                <a href="<?php echo $link ?>" <?php echo Banners::getTarget($banner) ?>>
                                    <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                </a>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!--Partners-->
<?php } ?>

 <script>
        $(document).ready(function () {
            var owl = $("#partner-body");
            owl.owlCarousel({
                itemsCustom: [
                  
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script>

<?php $themUrl = Yii::app()->theme->baseUrl; ?>
