
<div class="cateinhome">
     <div class="container">     
                <div class="center-main-center"> 
                   <div class="main-list">
                        <div class="border-list">
                            <a ><h3 class="product-category"><?php echo $cat['cat_name']; ?></h3></a>
                        </div><!--end-border-list-->
                    </div><!--end-main-list-->
                    <div class="list grid">
							<?php
							foreach ($products as $product) {
								?>

                            <div class="list-item">
                                <div class="list-content clearfix">
                                    <div class="list-content-box">
                                        <div class="list-content-img2">
                                            <a href="<?php echo $product['link']; ?>">
                                                <h3 class="product-name"> <?php echo $product['name']; ?></span></h3>
                                                <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>">
                                            </a>
                                        </div>
                                        <div class="list-content-body">
                                        <div class="product-price-all clearfix">
                                           
                                            
                                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                <div class="product-price">
                                                    <span><?php echo $product['price_text']; ?></span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <a id="link-store-boomtouch-01" class="boomsilk-view-details" href="<?php echo $product['link']; ?>">Xem Chi Ti???t</a>
                                        <a id="link-store-boomtouch-01" class="boomsilk-view-details" href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])); ?>">Mua H??ng</a>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div><!--end-list-gird-->
                </div>
    </div>
</div>