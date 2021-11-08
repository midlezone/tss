<a href="<?php echo $link; ?>" title="<?php echo $widget_title ?>">
    <span class="title-cart">
        <?php
        if ($show_widget_title) {
            echo $widget_title . " ";
        }
        ?>
    </span>
    <span style="color:red">(<?php echo $quantity; ?>)</span>
</a> 