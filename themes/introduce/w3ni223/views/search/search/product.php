<div class="product-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
    <?php if (count($data)) { ?>
        <div class="list grid">
            <?php
            foreach ($data as $pro) {
                $price = number_format(floatval($pro['price']));
                $price_market = number_format(floatval($pro['price_market']));
                ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $pro['link']; ?>">
                                    <img alt="<?php echo $pro['name']; ?>" src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's200_200/' . $pro['avatar_name'] ?>">
                                </a>
                            </div>
                            <div class="list-content-body">
                                <span class="list-content-title">
                                    <h3>
                                        <a href="<?php echo $pro['link']; ?>">
                                            <?php echo $pro['name']; ?>
                                        </a>
                                    </h3>
                                </span>
                                <div class="product-price-all clearfix">
                                    <?php if ($pro['price'] && $pro['price'] > 0) { ?>
                                        <div class="product-price">
                                            <span><?php echo $pro['price_text']; ?></span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($pro['price_market'] && $pro['price_market'] > 0) { ?>
                                        <div class="product-price-market">
                                            <?php echo $pro['price_market_text']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
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