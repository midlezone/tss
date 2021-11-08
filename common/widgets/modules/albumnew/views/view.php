<?php if (count($albums)) { ?>
    <div class="panel panel-default menu-vertical">
        <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <div class="title-main">
                    <h3><?php echo $widget_title; ?></h3>
                </div>
            </div>
        <?php } ?>
        <div class="panel-body">
            <?php foreach ($albums as $album) { ?>
               
            <?php } ?>
        </div>
    </div>
<?php } ?>