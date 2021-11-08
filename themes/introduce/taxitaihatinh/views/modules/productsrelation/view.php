<?php if (count($products)) { ?>
    <div class="related">
        <div class="customer">
            <?php if ($show_widget_title) { ?>
               
				<div class="title-m">
						<h2>
							<a title="Về chúng tôi" href="/gioi-thieu">
								<?php echo $widget_title; ?></a>
						</h2>
				</div>
            <?php } ?>
            <div class="cont">

                <div id="owl-demo121212" class="list grid">
                    <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="list-item">
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>">
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
       
    </div>
</div>

