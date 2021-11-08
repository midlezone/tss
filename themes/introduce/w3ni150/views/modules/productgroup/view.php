<?php if (count($products)) { ?>
    <div class="box-main-one"> 
        <div class="main-list">
            <div class="border-list clearfix">
                <h2>
                    <?php if ($show_widget_title) { ?>
                        <span class="title-list-list">
                            <?php echo $widget_title; ?>
                        </span>
                    <?php } ?>
                </h2>
            </div><!--end-border-list-->
            <hr>

        </div><!--end-main-list-->
        <div class="list grid clearfix">
            <?php foreach ($products as $product) { ?>
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
                                        <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>" />
                                    </a>
                                <?php } ?>
                                <a href="<?php echo $product['link']; ?>" class="view-detail">
                                    <span><?php echo Yii::t('common', 'view_detail'); ?></span>
                                </a>
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
        </div><!--end-list-gird-->
    </div>
<?php } ?>