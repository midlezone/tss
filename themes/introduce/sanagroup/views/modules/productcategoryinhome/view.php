<?php
foreach ($cateinhome as $cat) {
    if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
        continue;
    ?>
    <div class="product">
            <div class="title">
                <h2><a href="<?php echo $cat['link']; ?>"><?php echo $cat['cat_name']; ?></a></h2>
            </div>
        <div class="product-cont">
            <div class="list grid">
                <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's150_150/' . $product['avatar_name'] ?>">
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <div class="product-price-all clearfix">
                                        <div class="list-content-title">
                                            <h3> 
                                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="product-left">
												<?php if ($product['price'] && $product['price'] > 0) { ?>
													<p class="product-price">
														<span class="product-detail-price">
															<?php echo $product['price_text']; ?>
														</span>
														<?php if ($product['include_vat']) { ?>
															<span class="price-inclue-vat">
																(<?php echo Yii::t('product', 'product_include_vat'); ?>)
															</span>
														<?php } ?>
													</p>
												<?php } else { ?>
													<p class="product-info-price">
														<label><?php echo Yii::t('product', 'price'); ?>:</label>
														<span class="product-detail-price">
															<?php echo Product::getProductPriceNullLabel(); ?>
														</span>
													</p>
												<?php } ?>
												<?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
													<p class="product-info-price-market">
														<label><?php echo Yii::t('product', 'oldprice'); ?>:</label>
														<span class="product-detail-price-market">
															<?php echo $product['price_market_text']; ?>
														</span>
													</p>
												<?php } ?>
												<?php if ($product['price_market'] && $product['price'] && $product['price'] < $product['price_market']) { ?>
													<p class="product-info-price-save">
														<label><?php echo Yii::t('product', 'saveprice'); ?>:</label>
														<span class="product-detail-price-save">
															<?php echo ClaProduct::getDiscount($product['price_market'], $product['price']) . '%'; ?>
														</span>
													</p>
												<?php } ?>
                                        </div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

