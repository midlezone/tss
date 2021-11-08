<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
?>
<div class="center-main-center">

    
        <div class="centerContent"> 
            <div class="main-list"> 
                <span>TOYOTA VINH NGHỆ AN</span> 
            </div>
			<?php
				foreach ($cateinhome as $cat) {
					if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
						continue;
					?>
			 <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>

            <div class="product-all">
                <div class="list grid">
                        <div class="list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <button onclick="get_html_quickview('<?php echo $product['id'] ?>', this)" type="button" class="btn btn-primary btn-quickview" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $product['id'] . $cat['cat_id'] ?>">
                                            <span>Xem nhanh</span>
                                        </button>
                                        <div class="modal fade bs-example-modal-sm<?php echo $product['id'] . $cat['cat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                    
                </div><!--end-list-gird-->
            </div>
			<?php } ?>
        </div>
    <?php } ?>
</div>
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