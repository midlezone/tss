<?php
//    $pandc_all = Product::getAllProductAndCat();
$categories = ProductCategories::getAllCategory();
?>
<?php if (isset($categories) && count($categories) > 0) { ?>
    <div>

        <ul class="nav nav-tabs nav-choose-foods" role="tablist">
            <?php $i = 0; foreach ($categories as $category) { $i++; ?>
                <li role="presentation" class="<?php echo $i == 1 ? 'active' : '' ?>">
                    <a href="#category<?php echo $category['cat_id'] ?>" aria-controls="category<?php echo $category['cat_id'] ?>" role="tab" data-toggle="tab"><?php echo $category['cat_name']; ?></a>
                </li>
            <?php } ?>
        </ul>

        <div class="tab-content">
            <?php $i = 0; foreach ($categories as $category) { $i++; ?>
                <div role="tabpanel" class="tab-pane <?php echo $i == 1 ? 'active' : '' ?>" id="category<?php echo $category['cat_id'] ?>">
                    <?php 
                    $products = Product::getProductsInCate($category['cat_id'], array('limit' => 1000));
                    if ($products && count($products) > 0) {
                    ?>
                    <ul>
                        <?php foreach($products as $product) { ?>
                        <li class="item-choose-foods">
                            <a class="img">
                                <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's80_80/' . $product['avatar_name'] ?>">
                            </a>
                            <div class="r">
                                <h3><?php echo $product['name'] ?></h3>
                                <?php if ($product['price'] && $product['price'] > 0) { ?>
                                <p class="price"><?php echo $product['price_text']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <a href="javascript:void(0);" class="btn_add_food" name="<?php echo $product['id'] ?>" title="<?php echo Yii::t('common', 'add_food') ?>"><?php echo Yii::t('common', 'add_food') ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div>
<?php } ?>
<div class="loading-shoppingcart">Loading...</div>
<script type="text/javascript">
    jQuery('.btn_add_food').click(function() {
        $('.loading-shoppingcart').show();
        var url = '<?php echo Yii::app()->createUrl('/economy/shoppingcart/updateAjax') ?>';
        var pid = $(this).attr('name');
        jQuery.getJSON(
            url,
            {pid: pid, type: 'add'},
            function(data) {
                console.log(data)
                $('#wrapper-pack').html(data.html);
                $('.wrapper_btn_buy').html('<a class="btn btn-sm btn-primary pull-right" href="/economy/shoppingcart/checkout">Thanh toán</a>');
                $('.loading-shoppingcart').hide();
            }
        );
    });
    
    function deleteFood(thisTag) {
        $('.loading-shoppingcart').show();
        var url = $(thisTag).attr('href');
        jQuery.getJSON(
            url,
            {type: 'delete'},
            function(data) {
                console.log(data)
                if (data.code == '200') {
                    $('#wrapper-pack').html(data.html);
                    if(data.count_product >= 1) {
                        $('.wrapper_btn_buy').html('<a class="btn btn-sm btn-primary pull-right" href="/economy/shoppingcart/checkout">Thanh toán</a>');
                    } else {
                        $('.wrapper_btn_buy').html('');
                    }
                    $('.loading-shoppingcart').hide();
                }
            }
        );
        return false;
    }
    
    function updateQuantityAjax(key, qty) {
        $('.loading-shoppingcart').show();
        jQuery.getJSON(
            '<?php echo Yii::app()->createUrl('/economy/shoppingcart/updateAjax') ?>',
            {pid: key, qty: qty, type: 'update'},
            function(data) {
                console.log(data)
                if (data.code == '200') {
                    $('#wrapper-pack').html(data.html);
                    $('.wrapper_btn_buy').html('<a class="btn btn-sm btn-primary pull-right" href="/economy/shoppingcart/checkout">Thanh toán</a>');
                    $('.loading-shoppingcart').hide();
                }
            }
        );
        return false;
    }
</script>