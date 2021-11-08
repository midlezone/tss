<?php if (count($albums)) { ?>
    <div class="box album">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
        <div class="box-cont">
            <div id="demo">
                <div class="span12">
                    <div id="owl-demo" class="owl-carousel">
                        <?php foreach ($albums as $album) { ?>
                            <div class="item">
                                <div class="box-img">
								
                                    <a target="_blank" href=" <?php echo $album['album_description'] ?>">
                                        <img alt="<?php echo $album['album_name'] ?>" src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's500_500/' . $album['avatar_name']; ?>"/>
                                    </a>
                                </div>
                                <div class="title-library1">
									<span><?php echo $album['album_name'] ?></span>
								
                                </div>
                            </div>
                        <?php } ?>
                    </div> 
                   
                </div>
            </div>   
        </div>  
    </div>
    <?php
    $themUrl = Yii::app()->theme->baseUrl;
    ?>
    <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                autoPlay: 3000,
                items: 1,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3],
                autoPlay: true,
            });

        });
    </script>
<?php }
?>
