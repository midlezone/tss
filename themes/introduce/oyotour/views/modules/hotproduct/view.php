<?php if (count($products)) { ?>

    <div class="customer news-product">
        <div class="container">
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
                            <div class="item">
                                <div class="product-cont">
									
                                    <div class="box-img">
										<div class="p-ribbon hot">
											Hot
										</div>
                                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                            <img class="img-zoom" alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>"> 
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
                                            <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a>
                                        </h4>
                                        
										<div class="body_item">
											<p class="day_night"><i class="fa fa-clock-o"></i>  Thời Gian: <?php echo $product['code'] ?></p>
											<p><span class="transport"><i class="fa fa-arrow-circle-o-right"></i>  Phương Tiện: <i class="fa fa-plane"></i>											
												</span></p>
										</div>
										<div class="price">
                                             <?php if($product['price'] == '0.00'): ?>
												<span>Liên Hệ</span>
											<?php else: ?>
												<span><?php echo $product['price_text']; ?></span>
											<?php endif; ?>
                                        </div>
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
            var owl = $("#owl-demo");
            owl.owlCarousel({
                 itemsCustom: [
                    [0, 1],
                    [300, 1],
                    [500, 2],
                    [600, 3],
                    [800, 4],
                    [1000, 4],
                    [1200, 5],
                    [1400, 6]
                ],
                navigation: true,
                autoPlay: true	,
            });
        });
    </script>
</div>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>

