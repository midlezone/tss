<?php if (count($products)) { ?>
    <div class="featured-products box-right products-lq">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
        <div id="demo">
            <div id="owl-demo" class="owl-carousel">
                <?php foreach ($products as $product) { ?>
                    <div class="item ">
                        <div class="box-cont">
                            <div class="box-img"> 
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                    <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's280_280/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                </a> 
                            </div>
                            <div class="product-information clearfix">
                                <div class="title-products">
                                    <h3><a href="<?php echo $product['link'] ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></h3>
                                </div>
                                <div class="products-left">
                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                        <div class="price-products"><?php echo $product['price_text']; ?></div>
                                    <?php } ?>
                                    <?php if ($product['state']) { ?>
                                        <div class="status"><?php echo Yii::t('product', 'in_stock') ?></div>
                                    <?php } ?>
                                </div>
                                <div class="products-right">
                                    <div class="ProductActionAdd"> 
                                        <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $pid)); ?>" title="<?php echo Yii::t('shoppingcart', 'order') ?>" class="a-btn-2"> 
                                            <span class="a-btn-2-text">Đặt hàng</span> 
                                        </a> 
                                    </div>
                                </div>
                            </div>
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
                    [0, 3],
                    [450, 3],
                    [600, 3],
                    [700, 3],
                    [1000, 3],
                    [1200, 3],
                    [1400, 4],
                    [1600, 5]
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script> 
<?php } ?>