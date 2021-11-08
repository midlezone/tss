<div class="menu-lever2 all-cart ">
    <div class="panel panel-default categorybox">
        <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h3><?php echo $widget_title ?></h3>
        </div>
        <?php } ?>
        <div class="panel-body">
            <ul class="menu menu-list">
                <li><a href="<?php echo $link; ?>" title="Combi">Sản phẩm : <span>(<?php echo $quantity; ?>)</span></a></li>
                <li><a href="<?php echo $link; ?>" title="Combi">Tổng tiền : <span><?php echo $total_price; ?></span> </a></li>
            </ul>
            <div class="view-cart">
                <a href="<?php echo $link; ?>" title="Xem giỏ hàng">Xem giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
