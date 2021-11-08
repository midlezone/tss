
    <div class="customer news-product">
        <div class="container">
          
			 <?php
				foreach ($cateinhome as $cat) {
					if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
					continue;
			?>
			  <?php if ($show_widget_title) { ?>
				 <div class="title-m">
						<h2>
							<a title="Về chúng tôi" href="/gioi-thieu">
								<?php echo $cat['cat_name']; ?></a>
						</h2>
				</div>
            <?php } ?>
			
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo" class="owl-carousel">
						<?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                             <div class="item">
                                <div class="product-cont">
                                    <div class="box-img">
                                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                            <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>"> 
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
                               
                                    </div>

                                    
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			<?php } ?>
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

