<div class="cateinhome">
    <?php
    foreach ($cateinhome as $cat) {
        if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
            continue;
        ?>
        <div class="center-main-center"> 
            <div class="title-main">
                <div class="border-list clearfix">
                    <h3> 
                        <a href="<?php echo $cat['link']; ?>"><?php echo $cat['cat_name']; ?></a>
                        <a href="<?php echo $cat['link']; ?>" class="view-all"><?php echo Yii::t('common', 'viewall'); ?></a>
                    </h3>
                </div><!--end-border-list-->
            </div><!--end-main-list-->
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
                                    <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                        <div class="product-price-market">
                                            <?php echo $product['price_market_text']; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                        <div class="product-price">
                                            <span><?php echo $product['price_text']; ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div><!--end-list-gird-->
        </div>
    <?php } ?>
</div>