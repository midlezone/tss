<div class="center-main-center">
    <?php
    foreach ($cateinhome as $cat) {
        if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
            continue;
        ?>
        <div class="centerContent"> 
            <div class="main-list"> 
                <span><?php echo $cat['cat_name']; ?></span> 
                <a href="<?php echo $cat['link']; ?>" class="view-all"><?php echo Yii::t('common', 'viewall'); ?></a>
            </div>
            <div class="product-all">
                <div class="list grid">
                    <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                        <div class="list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                                        </a>
                                    </div>
                                    <div class="list-content-body">
                                        <span class="list-content-title">
                                            <a href="<?php echo $product['link']; ?>">
                                                <?php echo $product['name']; ?>
                                            </a>
                                        </span>
                                        <div class="product-price-all clearfix">
                                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                                <div class="product-price-market">
                                                    <span><?php echo $product['price_market_text']; ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                <div class="product-price product-price-list">
                                                    <span><?php echo $product['price_text']; ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product['price_market'] && $product['price_market'] > 0 && $product['price'] && $product['price'] > 0) { ?>
                                                <div class="sale-of"> <span>-<?php echo ClaProduct::getDiscount($product['price_market'], $product['price']) ?>%</span> </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!--end-list-gird-->
            </div>
        </div>
    <?php } ?>
</div>