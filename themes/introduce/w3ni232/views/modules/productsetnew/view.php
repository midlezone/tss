<?php if (count($products)) { 
?>

    <div class="customer news-product">
        <div class="container">
            <?php if ($show_widget_title) { ?>
                <div class="title clearfix">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            <?php } ?>
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo1" class="owl-carousel">
                        <?php
                        foreach ($products as $product) {
                            ?>
                            <div class="item">
                                <div class="product-cont">
                                    <div class="box-img">
                                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                            <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>"> 
                                        </a>
                                        <?php if ($product['isnew'] && $product['isnew'] > 0) { ?>
                                            <i class="icon-new"></i>
                                        <?php } ?>
                                        <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                            <i class="icon-sale"></i>
                                        <?php } ?>
                                    </div>
                                    <div class="box-info">
                                        <h4>
                                            <a href="#" title="#"><?php echo $product['name'] ?></a>
                                        </h4>
                                        <div class="price">
                                            <span><?php echo $product['price_text']; ?></span>
                                        </div>
                                        <?php if ($product['state'] == 1) { ?>
                                            <div class="status">
                                                <span>Còn hàng</span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="status">
                                                <span>Hết hàng</span>
                                            </div>
                                        <?php } ?>
                                    </div>


                                </div>
                            </div>
                        <?php } ?>
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
                    [1400, 5],
                    [1600, 6]
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script>
</div>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>

