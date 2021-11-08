<div class="cateinhome">
    <?php
    foreach ($cateinhome as $cat) {
        if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
            continue;
        ?>
        <div class="center-main-center"> 
			<div class="title clearfix">
                <h2><?php echo $cat['cat_name']; ?></h2>
                <div class="line"></div>			
            </div>
           
            <div class="list grid">
                <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $product['link']; ?>">
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                                    </a>
                                </div>
                                <div class="list-content-body">
                                <div class="product-price-all clearfix">
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
                                <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div><!--end-list-gird-->
        </div>
    <?php } ?>
</div>