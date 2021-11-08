
    <div class="customer news-product">
        <div class="container boundary">
          
			 <?php
				foreach ($cateinhome as $cat) {
					if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
					continue;
			?>
			<?php if($cat['cat_id'] == '10028'): ?>
			
			  <?php if ($show_widget_title) { ?>
                <div class="title clearfix col-sm-3 col-md-3 col-lg-3">
                    <h2><?php echo $cat['cat_name']; ?></h2>
                </div>
					<div class="col-sm-9 col-md-9 col-lg-9 text-right group-items">
								<a href="/shop/continent/chau-au-1">Châu Âu</a>
								<a href="/shop/continent/chau-a-2">Châu Á</a>
								<a href="/shop/continent/chau-phi-4">Châu Phi</a>
								<a href="/shop/continent/chau-my-5">Châu Mỹ</a>
					</div>
            <?php } ?>
			
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo1" class="owl-carousel">
						<?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
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
		<?php else: ?>
				<?php if ($show_widget_title) { ?>
                <div class="title clearfix col-sm-3 col-md-3 col-lg-3">
                    <h2><?php echo $cat['cat_name']; ?></h2>
                </div>
					
            <?php } ?>
			
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo2" class="owl-carousel">
						<?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
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
		<?php endif; ?>
	<?php } ?>
        </div>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo1");
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
                autoPlay: true,
            });
        });
    </script>
	 <script>
        $(document).ready(function () {
            var owl = $("#owl-demo2");
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
                autoPlay: true,
            });
        });
    </script>
</div>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>

