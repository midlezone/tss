<?php if ($show_widget_title) { ?>
    <div class="panel panel-default menu-vertical">
        <div class="panel-heading">
            <h3><?php echo $widget_title; ?></h3>
        </div>
        <div class="panel-body">
        <?php } ?>
        <?php if ($html) { ?>
            <div class="whtml">
                <?php echo $html; ?>
            </div>
        <?php } ?>
        <?php if ($show_widget_title) { ?>
        </div>
    </div>
<?php } ?>