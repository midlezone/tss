<div class="panel panel-default categorybox">
    <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h3><?php echo $widget_title; ?></h3>
        </div>
    <?php } ?>
    <div class="panel-body">
        <?php
        if ($html) {
            echo $html;
        }
        ?>
    </div>
</div>
