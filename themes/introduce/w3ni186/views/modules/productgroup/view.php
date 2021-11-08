<?php if (count($products)) { ?>
    <div id="" class="fullwidth_slider everslider fullwidth-slider field-training">
        <div class="title">
            <div class="title-cont">
                <?php if ($show_widget_title) { ?>
                    <h2><?php echo $widget_title; ?></h2>
                <?php } ?>
            </div>
        </div>
        <ul class="es-slides">
            <?php foreach ($products as $product) { ?>
                <li> 
                    <div class="list-item  ">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img"> 
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                        <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>"> 
                                    </a> 
                                </div>
                                <div class="list-content-body"> 
                                    <span class="list-content-title"> 
                                        <h3>
                                            <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                        </h3>
                                    </span>
                                    <div class="product-price-all clearfix clearfix">
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price">
                                                <span><?php echo $product['price_text']; ?></span>
                                            </div>
                                        <?php } ?>
                                        <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                            <div class="product-price-market">
                                                <?php echo $product['price_market_text']; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="ProductAction clearfix">
                                        <div class="ProductActionAdd"> 
                                            <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])); ?>" title="Giỏ hàng" class="a-btn-2">
                                                <span class="a-btn-2-text">Giỏ hàng</span> 
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php $themUrl = Yii::app()->theme->baseUrl;?>
<script type="text/javascript" src="<?=$themUrl?>/js/jquery.everslider.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        /* Fullwidth slider */
        $('.fullwidth_slider').everslider({
            mode: 'carousel',
            moveSlides: 1,
            slideEasing: 'easeInOutCubic',
            slideDuration: 1000,
            navigation: true,
            keyboard: true,
            nextNav: '<span class="alt-arrow">Next</span>',
            prevNav: '<span class="alt-arrow">Next</span>',
            ticker: true,
            tickerAutoStart: true,
            tickerHover: true,
            tickerTimeout: 5000
        });

        /* Fullwidth slider with "fade" effect */

    });
</script>