<?php if (count($products)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <?php if ($widget_title) { ?>
                <h2><?php echo $widget_title ?></h2> 

            <?php } ?>
        </div>
        <div class="line"> </div>
    <?php } ?>
    <div class="cont">
        <div class="container ">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">
                    <?php foreach ($products as $product) { ?>
                        <div class="item">
                            <div class="box-img">
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                    <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's250_250/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                </a> 
                            </div>
                            <div class="box-info-pro">
                                <h4>
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                </h4>
                                <div class="product-price-all clearfix clearfix">
                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                        <div class="product-price">
                                            <?php echo Yii::t('product', 'price'); ?>:
                                            <?php echo $product['price_text']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
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
                });
            });
        </script>
        <div class="ProductAction1 clearfix">
            <div class="ProductActionAdd1"> 
                <a href="<?php echo Yii::app()->createUrl('/economy/product'); ?>" class="a-btn-2-a" title="Xem toàn bộ các tour du lịch">
                    <span class="a-btn-2-text-a">Xem toàn bộ các tour du lịch</span>
                </a>
            </div>
        </div>
    </div>

<?php } ?>