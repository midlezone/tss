<?php if (count($products)) { ?>
    <div class="list grid">
        <?php
        foreach ($products as $product) {
            ?>
            <div class="list-item">
                <div class="list-content clearfix">
                    <div class="list-content-box">
                        <div class="list-content-img">
                            <div class="hover-sp">
                                <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])) ?>" title="Đặt món" class="a-btn-2 black buttom-dm"> 
                                    <span class="a-btn-2-text">Đặt món</span>
                                </a>
                                <a href="<?php echo $product['link'] ?>" title="Chi tiết" class="a-btn-2 black">
                                    <span class="a-btn-2-text">Chi tiết</span> 
                                </a>
                                <a href="<?php echo $product['link'] ?>" class="bg-sp"></a>
                            </div>
                            <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                            </a>
                        </div>
                        <div class="list-content-body"> 
                            <h3 class="list-content-title"> 
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                            </h3>
                            <div class="product-price-all clearfix">
                                <?php if ($product['price'] && $product['price'] > 0) { ?>
                                    <div class="product-price">
                                        <span class="gia"><?php echo $product['price_text']; ?></span>
                                        <span> / Xuất</span> 
                                    </div>
                                <?php } ?>
                                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                    <div class="product-price-market"> 
                                        <span><?php echo $product['price_market_text']; ?></span> 
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class='product-page'>
        <?php
        $this->widget('common.extensions.LinkPager.LinkPager', array(
            'itemCount' => $totalitem,
            'pageSize' => $limit,
            'header' => '',
            'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
            'selectedPageCssClass' => 'active',
        ));
        ?>
    </div>
<?php } ?>

