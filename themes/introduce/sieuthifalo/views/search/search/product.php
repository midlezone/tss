<div class="product-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
    <?php if (count($data)) { ?>
        <div class="list grid">
            <?php
            foreach ($data as $product) {
                $price = number_format(floatval($product['price']));
                $price_market = number_format(floatval($product['price_market']));
                ?>
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
                                <span class="icon-km">-<?php echo $discount; ?>%</span>
                            <?php } ?>
                            <div class="hover-sp"> 
                                <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])); ?>" title="Thêm vào giỏ hàng" class="addcart"></a>
                                <a href="<?php echo $product['link'] ?>" title="Xem chi tiết" class="a-btn-2 black"> 
                                    <span class="a-btn-2-text">xem chi tiết</span> 
                                </a>
                                <a href="<?php echo $product['link'] ?>" class="bg-sp"></a> </div>
                            <div class="list-content-img"> 
                                <a href="<?php echo $product['link'] ?>"> 
                                    <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's150_150/' . $product['avatar_name'] ?>">
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
        </div>
        <div class="wpager">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    <?php } ?>
</div>