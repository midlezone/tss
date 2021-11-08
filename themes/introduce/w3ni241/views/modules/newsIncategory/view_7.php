<?php if (count($news)) { ?>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <div class="top-main-content clearfix">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><a href="/thiet-bi---su-kien-nc,440"><?php echo $widget_title; ?></a></h2>
            </div>
        <?php } ?>
        <div id="demo">
            <div id="owl-demo" class="owl-carousel">
                <?php foreach ($news as $new) { ?>
                    <div class="item">
                        <div class="list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <?php if ($new['image_path'] && $new['image_name']) { ?>
                                        <div class="list-content-img">
                                            <a href="<?php echo $new['link']; ?>" title="<?php echo $new['news_title']; ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $new['image_path'] . 's200_200/' . $new['image_name']; ?>" alt="<?php echo $new['news_title']; ?>" />
                                            </a>
                                        </div>
                                        <div class="list-content-img-shadow">
                                            <img src="<?php echo $themUrl ?>/css/img/bong.png" alt="#">
                                        </div>
                                    <?php } ?>
                                    <div class="list-content-body clearfix"> 
                                        <h3>
                                            <a href="<?php echo $new['link'] ?>" title="<?php echo $new['news_title']; ?>">
                                                <?php echo $new['news_title']; ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>  
                <?php } ?>
            </div>
        </div>  
        <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo");
                owl.owlCarousel({
                    itemsCustom: [
                        [0, 1],
                        [320, 1],
                        [480, 2],
                        [600, 2],
                        [700, 2],
                        [1000, 3],
                        [1200, 4],
                        [1400, 4],
                        [1600, 4]
                    ],
                    navigation: false,
                    autoPlay: false,
                });
            });
        </script>  
    </div>  
<?php } ?>