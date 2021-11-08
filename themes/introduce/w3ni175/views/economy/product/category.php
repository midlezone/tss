<?php if (count($products)) { ?>
    <div class="product-category">
        <div class="list grid">
            <?php foreach ($products as $product) { ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
        <!--                                <button onclick="get_html_quickview('<?php echo $product['id'] ?>', this)" type="button" class="btn btn-primary btn-quickview" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $product['id'] ?>">
                                    <span>Xem nhanh</span>
                                </button>-->
                                <div class="modal fade bs-example-modal-sm<?php echo $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Content QuickView -->
                                    </div>
                                </div>
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
                                <?php if ($product['code']) { ?>
                                                    <span class="product-detail-sku">
                                                        <?php echo Yii::t('product', 'product_code_short'); ?>: <?php echo $product['code']; ?>
                                                    </span>
                                                <?php } ?>
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
                                    <?php // if ($product['price_market'] && $product['price_market'] > 0 && $product['price'] && $product['price'] > 0) { ?>
                                        <!--<div class="sale-of"> <span>-<?php // echo ClaProduct::getDiscount($product['price_market'], $product['price']) ?>%</span> </div>-->
                                    <?php //} ?>
                                    <div class="more_detail">
                                        <a href="<?php echo $product['link']; ?>" class="btn btn-primary">
                                            <?php echo Yii::t('common', 'detail'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><!--end-list-gird-->
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

<script type="text/javascript">

    function get_html_quickview(id, this_tag) {
        var wq = jQuery(this_tag).next().children('.modal-dialog');
        if (!wq.hasClass('has_quickview')) {
            jQuery.getJSON(
                    '<?php echo Yii::app()->createUrl('/economy/product/quickview'); ?>',
                    {id: id},
            function (data) {
                wq.html(data.html);
                wq.addClass('has_quickview');
            }
            );
        }
    }

</script>