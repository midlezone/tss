<div class="product-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
    <?php if (count($data)) { ?>
        <div class="list grid">
            <?php
            foreach ($data as $product) {
                ?>
                <div class="list-item">
                    <div class="list-content clearfix">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <?php
                                Yii::app()->controller->renderPartial('//partial/addtocart_button', array('pid' => $product['id'], 'product' => $product));
                                ?>
                                <a class="bg-sp"><p><?php echo $product['name']; ?></p></a>
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