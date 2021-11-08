<?php if (count($products)) { ?>
    <div class="product-all"> 
        <?php if ($show_widget_title) { ?>
            <div class="widget-title">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="product-result">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <span><?php echo Yii::t('product', 'product_result', array('{result}' => $totalitem)); ?></span>
                        </div>
                        <div class="col-xs-6 col-sm-3 pull-right">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
                            ?>
                        </div>
                        <div class="col-xs-6 col-sm-3 pull-right">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK2));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list grid">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a class="button a-btn-2 black" href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                    <span class="a-btn-2-text">
                                        <?php echo Yii::t('common', 'view_detail'); ?>
                                    </span>
                                </a>
                                <a class="bg-sp" href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>"><p><?php echo $product['name']; ?></p></a>
                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's300_300/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>">
                                </a>
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
    </div>
<?php } ?>