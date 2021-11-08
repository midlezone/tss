<?php if (count($images)) { ?>
    <div class="box album">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><a href="/album"><?php echo $widget_title ?></a></h2>
            </div>
        <?php } ?>
        <div class="box-cont">
            <div id="demo">
                <div class="span12">
                    <div id="owl-demo" class="owl-carousel">
                        <?php foreach ($images as $image) { ?>
                            <div class="item">
                                <div class="box-img">
                                    <a href="<?php echo Yii::app()->createUrl('/media/album/detail', array('id' => $image['album_id'])); ?>">
                                        <img alt="<?php echo $image['name'] ?>" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's350_350/' . $image['name']; ?>"/>
                                    </a>
                                </div>
                                <div class="title-library">
                                    <h3>
                                        <a href="<?php echo Yii::app()->createUrl('/media/album/detail', array('id' => $image['album_id'])); ?>"><?php echo $image['name'] ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php } ?>
                    </div> 
                    <div class="customNavigation">
                        <a class="btn prev"></a>
                        <a class="btn next"></a>
                        <a class="btn play">Autoplay</a>
                        <a class="btn stop">Stop</a>
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
<?php } ?>
