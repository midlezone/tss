<?php if (count($products)) { ?>

    <div class="panel hotproduct-detail">
        <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="product-all">
            <div class="list grid">
                <?php foreach ($products as $product) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box"> 
                                <?php
                                $discount = 0;
                                if ($product['price_market'] && $product['price_market'] > 0 && $product['price'] && $product['price'] > 0) {
                                    $discount = ClaProduct::getDiscount($product['price_market'], $product['price']);
                                }
                                if ($discount > 0) {
                                    ?>
                                    <span class="icon-km">-<?php echo $discount ?>%</span>
                                <?php } ?>
                                <div class="hover-sp"> 
                                    <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])); ?>" title="Thêm vào giỏ hàng" class="addcart"></a>
                                    <a href="<?php echo $product['link'] ?>" title="Xem chi tiết" class="a-btn-2 black"> 
                                        <span class="a-btn-2-text">xem chi tiết</span> 
                                    </a>
                                    <a href="<?php echo $product['link'] ?>" class="bg-sp"></a> </div>
                                <div class="list-content-img"> 
                                    <a href="<?php echo $product['link'] ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                                    </a> 
                                </div>
                                <div class="list-content-body">
                                    <h3 class="list-content-title"> 
                                        <a href="#" title="#"><?php echo $product['name'] ?></a> 
                                    </h3>
                                    <div class="product-price-all clearfix">
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price">
                                                <?php echo Yii::t('product', 'price'); ?>:
                                                <?php echo $product['price_text']; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php } ?>