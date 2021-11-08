<div class="phone">
    <a href="<?php echo $link; ?>" class="icon"></a>
    <a href="<?php echo $link; ?>" class="cart-link">
        <span style="color:#7eb636">
            <?php
            if ($show_widget_title) {
                echo $widget_title;
            }
            ?>
        </span>
    </a>
    <span class="countProduct" style="<?php if($quantity==0) echo 'display:none;'; ?>"><?php echo $quantity; ?></span>
</div>