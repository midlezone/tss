<div class="product-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
    <?php if (count($data)) { ?>
        <div class="list grid">
            <?php
            foreach ($data as $product) {
                ?>
                <div class="list-item get-product-detail" src="<?php echo Yii::app()->createUrl('/economy/product/getproductinfo', array('id' => $product['id'], 'alias' => $product['alias'])) ?>" target-detail=".hover-list-content .category_product_detail_div" show-loading="true">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="hover-list-content">
                                <div class="category_product_detail_div">
                                </div>
                            </div>
                            <div class="list-content-img">
                                <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                    <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="bg-body-box">
                                <div class="list-content-body">
                                    <h3>
                                        <span class="list-content-title">
                                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                <?php echo $product['name']; ?>                             
                                            </a>
                                        </span>
                                    </h3>
                                </div>
                                <div class="product-price-all">
                                    <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                        <div class="product-price-market">
                                            <?php echo Yii::t('product', 'oldprice'); ?>:
                                            <?php echo $product['price_market_text']; ?>
                                        </div>
                                    <?php } ?>
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