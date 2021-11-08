<?php 
if (count($products)) {
    ?>

    <div class="featured-products">
        <div class="title">
            <?php if ($show_widget_title) { ?>
                <h2><a><?php echo $widget_title; ?></a></h2>
            <?php } ?>
        </div>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">
                    <?php foreach ($products as $product) { ?>
                        <div class="item">
                            <div class="box-img">
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                    <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>"> 
                                </a> 
                            </div>
                            <div class="box-more">
                                <div class="list-content-title"> 
                                    <h3>
                                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                    </h3>
                                </div>
                                <?php if ($product['price'] && $product['price'] > 0) { ?>
                                    <div class="price-products">
                                        <span>Giá:</span><?php echo $product['price_text']; ?>
                                    </div>
                                <?php } ?>                       
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php $themUrl = Yii::app()->theme->baseUrl; ?>
        <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo");
                owl.owlCarousel({
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 2],
                        [700, 3],
                        [1000, 4],
                        [1200, 4],
                        [1400, 4],
                        [1600, 4]
                    ],
                    navigation: true,
                    autoPlay: true,
                    navigationText: [
                        "<i class='icon-chevron-left icon-white'></i>",
                        "<i class='icon-chevron-right icon-white'></i>"
                    ],
                });
            });
        </script>
    </div>
<?php } ?>