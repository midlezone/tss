<div class="cateinhome center-main-center">
    <?php foreach ($cateinhome as $cat) { ?>
        <?php if (isset($data[$cat['cat_id']]['products']) && count($data[$cat['cat_id']]['products'])) { ?>
            <div class="centerContent sale"> 
                <div class="main-list">
                    <h3><?php echo $cat['cat_name']; ?></h3>
                    <a href="<?php echo $cat['link']; ?>">
                        <?php echo Yii::t('common', 'viewall'); ?>
                    </a>
                </div><!--end-main-list-->
                <div class="product-all">
                    <div class="list grid">
                        <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                            <div class="list-item">
                                <div class="list-content clearfix">
                                    <div class="list-content-box">
                                        <div class="list-content-img">
                                            <a class="button a-btn-2 black" href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                <span class="a-btn-2-text">
                                                    <?php echo Yii::t('common', 'view_detail'); ?>
                                                </span>
                                            </a>
                                            <a class="bg-sp" href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                            </a>
                                            <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's300_300/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <div class="list-content-body">
                                            <span class="list-content-title">
                                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                    <?php echo $product['name']; ?>                             
                                                </a>
                                            </span>
                                            <div class="product-price-all clearfix">
                                                <div class="product-price">
                                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                        <span>
                                                            <?php echo $product['price_text']; ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-market"> 
                                                    <?php if (trim($product['code'])) { ?>
                                                        <span><?php echo Yii::t('common', 'code') ?> : <?php echo $product['code']; ?></span> 
                                                    <?php } ?>
                                                </div>
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
    <?php } ?>
</div>