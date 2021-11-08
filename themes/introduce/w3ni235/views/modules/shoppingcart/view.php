<div class="cart">
    <a href="<?php echo $link; ?>">
        <i class="icon-cart"></i>
        <span class="slsp"><?php echo $quantity; ?></span>
        <span><?php echo Yii::t('shoppingcart', 'Shopcart'); ?></span>
        <span class="red">
            <?php
            echo ($total_price);
            ?>
        </span>

    </a>
</div>