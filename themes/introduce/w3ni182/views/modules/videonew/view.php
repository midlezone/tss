<?php if ($show_widget_title) { ?>
    <div class="box-title">
        <h2>
            <a onclick="javascript:void(0)"><?php echo $widget_title ?></a>
        </h2>
    </div>
<?php } ?>
<?php if (count($videos)) { ?>
    <div class="video">
        <?php
        foreach ($videos as $video) {
            ?>
            <iframe width="350" height="218" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
            </iframe>
        <?php } ?>
    </div>
<?php } ?>

