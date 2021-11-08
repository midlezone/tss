<a href="<?php echo $link; ?>" class="cart-link">
    <?php
        if ($show_widget_title) {
            echo $widget_title . " ";
        }
    ?>   
    <?php echo 'Sản phẩm: ';?>
    <span class="cart-quantity"><?php echo $quantity ?></span>
</a>
