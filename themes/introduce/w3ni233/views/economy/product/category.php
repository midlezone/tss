<?php if (count($products)) { ?>
    <div class="product-cont"> 
        <div class="list grid">
            <?php
            foreach ($products as $product) {
                ?>
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
                                            <div class="product-price">
                                                <?php echo $product['price_text']; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                            <div class="product-price-market">
                                                <?php echo $product['price_market_text']; ?>                                   
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
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
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>