<?php if (count($products)) { ?>
    <div id="demo">
        <div class="container">
            <div class="row">
                <div class="box-title">   
                    <div class="title"> 
                        <?php if ($show_widget_title) { ?>
                            <a><?php echo $widget_title ?></a> 
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div id="owl-demo" class="owl-carousel">
                        <?php foreach ($products as $product) { ?>
                            <div class="item">
                                <div class="list-item">
                                    <div class="list-content clearfix">
                                        <div class="list-content-box">
                                            <div class="list-content-img">
                                                <div class="hover-sp">
                                                    <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])); ?>" title="Đặt món" class="a-btn-2 black buttom-dm"> 
                                                        <span class="a-btn-2-text">Đặt món</span>
                                                    </a>
                                                    <a href="<?php echo $product['link'] ?>" title="Chi tiết" class="a-btn-2 black">
                                                        <span class="a-btn-2-text">Chi tiết</span> </a>
                                                    <a href="<?php echo $product['link'] ?>" class="bg-sp"></a>
                                                </div>
                                                <a class="hot-wrap-image" href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                                    <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's180_180/' . $product['avatar_name'] ?>"> 
                                                </a>
                                            </div>
                                            <div class="list-content-body">
                                                <h3 class="list-content-title">
                                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a>
                                                </h3>
                                                <div class="product-price-all clearfix">
                                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                    <div class="product-price">
                                                        <span class="gia"><?php echo $product['price_text']; ?></span>
                                                        <span> / Xuất</span> 
                                                    </div>
                                                    <?php } ?>
                                                    <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                                    <div class="product-price-market"> 
                                                        <?php echo $product['price_market_text']; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            autoPlay: 3000,
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            autoPlay: false,
        });

    });
</script>
