<?php if (count($products)) { ?>
    <div class="list-product-relation">
        <?php if ($show_widget_title) { ?>
            <div class="title-main product-relation-title">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <ul class="list grid">
            <?php
            $i=0;
            foreach ($products as $product) {
                $i++;
                $price = number_format(floatval($product['price']));
                if ($price == 0)
                    $price_label = Product::getProductPriceNullLabel();
                else
                    $price_label = $price . Product::getProductUnit($product);
                ?>
                <div class="list-item <?php echo ($i%4==0)?"last-item":'';?>">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's220_220/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>">
                                </a>
                                <div class="over-hover">                                
                                    <a class="btn-mr" href="<?php echo $product['link']; ?>">Read More</a>
                                </div>
                            </div>
                            <div class="list-content-body">
                                <span class="list-content-title">
                                    <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                </span>
                                <?php if ($price) { ?>
                                    <div class="product-price">
                                        <label>Price: </label><span><?php echo $price_label; ?></span>
                                    </div> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </ul>
    </div>
<script>
    jQuery(function(){
        $(".list-product-relation .list-content-box" ).hover(
            function() {
                $( this ).addClass("box-hover");
            }, function() {
                $( this ).removeClass( "box-hover" );
            }
        );
    })
</script>
<?php } ?>