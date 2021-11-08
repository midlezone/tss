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
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's1000_1000/' . $product['avatar_name'] ?>">
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
                                            
                                        </div>
                                       
                                            <div class="ProductActionAdd clearfix">                                                  
                                                <a id="link-store-boomtouch-01" class="boomsilk-view-details" href="<?php echo $product['link']; ?>">View Details</a>
                                            </div>
                                       
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

