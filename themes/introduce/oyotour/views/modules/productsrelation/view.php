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
                <div class="item">
                                <div class="product-cont">
									
                                    <div class="box-img">
										
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
                                            <a href="#" title="#"><?php echo $product['name'] ?></a>
                                        </h4>
                                        
										<div class="body_item">
											<p class="day_night"><i class="fa fa-clock-o"></i>  Thời Gian: <?php echo $product['code'] ?></p>
											<p><span class="transport"><i class="fa fa-arrow-circle-o-right"></i>  Phương Tiện: <i class="fa fa-plane"></i>											
												</span></p>
										</div>
										<div class="price">
                                            <span><?php echo $product['price_text']; ?></span>
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

