<?php if (count($albums)) { ?>
    <div class="intro-project">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <?php echo $widget_title; ?>
                </h2>
            </div>
        <?php } ?>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">
                    <?php foreach ($albums as $album) { ?>
                        <div class="item">
                            <div class="box-img">
                                <a class="img" href="<?php echo $album['link']; ?>" >
                                    <img src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's280_280/' . $album['avatar_name']; ?>" />
                                </a>   
                            </div>
                            <div class="box-body">
                                <div class="box-title">  
                                    <a class="img" href="<?php echo $album['link']; ?>">
                                        <h3><?php echo $album['album_name']; ?> </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src='<?php echo Yii::app()->theme->baseUrl; ?>/js/owl.carousel.min.js'></script>
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo");
                owl.owlCarousel({
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 2],
                        [1000, 3],
                        [1200, 4],
                        [1400, 4],
                        [1600, 4]
                    ],
                    navigation: false,
                    autoPlay: true
                });
            });
        </script>   
    </div>
<?php } ?>