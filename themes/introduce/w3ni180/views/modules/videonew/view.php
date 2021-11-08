<?php if (count($videos)) { ?>
    <div class="col-sm-3">
        <?php if ($show_widget_title) { ?>
            <h3><?php echo $widget_title ?></h3>
        <?php } ?>
        <?php
        foreach ($videos as $video) {
            ?>
            <iframe width="270" height="218" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
            </iframe>
        <?php } ?>
    </div>
<?php } ?>
