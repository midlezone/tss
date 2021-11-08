<?php if (count($cateinhome)) { ?>
    <!--<div class="newcategoryinhome well animated fadeOutDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown">-->
    <?php
    foreach ($cateinhome as $cat) {
        ?>
        <div class="intro-project">
            <div class="title">
                <h2>
                    <a href="<?php echo $cat['link']; ?>">
                        <?php echo $cat['cat_name']; ?>
                        <div class="view"></div>
                    </a>
                </h2>
            </div>
            <?php
            if (isset($data[$cat['cat_id']]['listnews'])) {
                $listnews = $data[$cat['cat_id']]['listnews'];
                ?>
                <?php if (count($listnews)) { ?>
                    <div class="cont">
                        <div id="demo">
                            <div id="owl-demo" class="owl-carousel">
                                <?php foreach ($listnews as $news) { ?>
                                    <div class="item">
                                        <div class="box-img">
                                            <a title="<?php echo $news['news_title']; ?>" href="<?php echo $news['link']; ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                            </a>
                                        </div>
                                        <div class="box-body">
                                            <div class="box-title">  
                                                <a title="<?php echo $news['news_title']; ?>" href="<?php echo $news['link']; ?>">
                                                    <h3><?php echo $news['news_title']; ?> </h3>
                                                </a>
                                            </div>
                                            <?php if ($news['news_description']) { ?>
                                                <div class="box-content">  
                                                    <p>
                                                        <?php echo $news['news_description']; ?>
                                                    </p>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.carousel.css' rel='stylesheet' type='text/css' />
                        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.theme.css' rel='stylesheet' type='text/css' />
                        <script type="text/javascript" src='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.carousel.min.js'></script>
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
                                    autoPlay: true,
                                });
                            });
                        </script>   
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>  
    <!--</div>-->
<?php } ?>