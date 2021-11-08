<?php if (count($products)) { ?>
    <div class="post">
        <div class="container">
            <div class="row">
               <?php foreach ($products as $product) { ?>
                    <div class="col-xs-4 well animated fadeOutDown sb-effect-displayed fadeInDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown" style="opacity: 1;">
                        <div class="box-all-nd">
                            <div class="box-nd">
                                <div class="nd-nd clearfix">
                                    <div class="img-box-nd">
                                        <div class="img-box">
                                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['cat_name'] ?>">
                                                <img class="img-zoom"  alt="<?php echo $product['name'] ?>" class="img-zoom" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="header-panel">
                                        <a href="<?php echo $product['link'] ?>">
												<h3> <?php echo $product['name']; ?></h3>
                                        </a> 
                                    </div>
									<?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price">
                                                <?php echo Yii::t('product', 'price'); ?>:
                                                <?php echo $product['price_text']; ?>
                                            </div>
                                     <?php } ?>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
