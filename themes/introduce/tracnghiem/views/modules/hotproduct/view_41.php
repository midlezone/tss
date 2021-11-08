<?php if (count($products)) { ?>
    <div class="hot-prd">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title ?></h2>
            </div>
            <div class="line"></div>
        <?php } ?>
        <div class="cont">
            <div class="container">
                <div id="demo">
                    <div id="owl-demo1" class="owl-carousel">
                        <?php foreach ($products as $product) { ?>
                            <div class="item">
                                <div class="box-img">
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's250_250/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                    </a> 
                                </div>   
                                <div class="box-info-pro">
                                    <h4> <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                    </h4>
                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                        <div class="price-products">
                                            <span class="title_price"><?php echo Yii::t('product', 'price'); ?>:</span>
                                            <?php echo $product['price_text']; ?>
                                        </div>
                                    <?php } ?>
                                </div>             
                            </div>
                        <?php } ?>
                    </div>
                    <div class="customNavigation">
                        <a class="btn prev"></a>
                        <a class="btn next"></a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo1");
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
            $(".next").click(function () {
                owl.trigger('owl.next');
            })
            $(".prev").click(function () {
                owl.trigger('owl.prev');
            })
        });
    </script>    
</div>
