<?php if (count($products)) { ?>
    <div class="related">
        <div class="customer">
            <?php if ($show_widget_title) { ?>
                <div class="title clearfix">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            <?php } ?>
            <div class="cont">

                <div id="owl-demo12" class="list grid">
                    <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="list-item">
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                                        </a>
                                    </div>
                                    <div class="list-content-body">
                                        <span class="list-content-title">
                                            <h3>
                                                <a href="<?php echo $product['link']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </h3>
                                        </span>
                                        <div class="product-price-all clearfix">
                                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                <div class="product-price">
                                                    <span><?php echo $product['price_text']; ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                                <div class="product-price-market">
                                                    <?php echo $product['price_market_text']; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
                                        <?php } else {
                                            ?>
                                            <div class="ProductActionAdd clearfix"> 
                                                <a class="a-btn-2 addtocart">
                                                    <span class="a-btn-2-text">Liên hệ</span>
                                                </a> 
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo12");
                owl.owlCarousel({
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 2],
                        [700, 3],
                        [1000, 3],
                        [1200, 3],
                    ],
                    navigation: true,
                    autoPlay: true,
                });
            });
        </script>
    </div>
</div>

