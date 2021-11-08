<div class="panel panel-default menu-vertical">
    <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h3><?php echo $widget_title; ?></h3>
        </div>
    <?php } ?>
    <?php if ($html) { ?>
        <div class="panel-body">
            <div class="whtml">
                <?php echo $html; ?>
            </div>
        </div>
    <?php } ?>
</div>