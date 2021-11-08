<?php if (count($products)) { ?>
    <div class="product">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
        <div class="line"></div>
        <div class="product-cont">
            <div class="list grid">
                <?php foreach ($products as $product) { ?>
                    <div class="list-item  ">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's250_250/' . $product['avatar_name'] ?>" />
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <div class="list-content-title">
                                        <h3><a href="<?php echo $product['link'] ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a>
                                        </h3>
                                    </div>
                                    <div class="product-price-all clearfix clearfix">
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price"> 
                                                <?php echo $product['price_text']; ?> 
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="button">
                                        <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])) ?>">Chọn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

