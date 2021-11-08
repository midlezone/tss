<div class="chitiet-sp">
    <div class="sp-chitiet-sp">
        <?php if ($product['product_desc']) { ?>
            <div class="title-ttsp">
                <span class="title-ttsp-title">
                    <?php echo $product['name'] ?>
                </span>
                <?php
                $price = floatval($product['price']);
                if ($price > 0) {
                    ?>
                    <p class="price">Giá: <span class="gia-moi"><?php echo number_format($price) . 'đ'; ?></span><p>
                    <?php } ?>
                <div class="ttsp">
                    <?php
                    echo $product['product_desc'];
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>