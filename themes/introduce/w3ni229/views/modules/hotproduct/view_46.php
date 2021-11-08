<?php if (count($products)) { ?>
    <div class="">
        <?php if ($show_widget_title) { ?>
            <div class="title clearfix">
                <h2><?php echo $widget_title; ?></h2>
            </div>
        <?php } ?>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">
                    <?php
                    foreach ($products as $product) {
                        ?>
                    <div class="item" style="">
                            <div class="box-img">
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>" class="hover-banner"> </a>
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                    <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's350_350/' . $product['avatar_name'] ?>"> 
                                </a> 
                            </div>
                            <div class="box-info">
                                <div class="title-about">
                                    <h3>
                                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                    </h3>
                                </div>
                                <div class="more-about">
                                    <p><?php echo $product['product_sortdesc'] ?>        
                                    </p>
                                </div>
                                <div class="view">
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>">More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php } ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 3],
                    [1200, 3],
                    [1400, 3],
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script>   

</div>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>

