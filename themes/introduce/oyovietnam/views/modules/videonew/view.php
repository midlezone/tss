<?php if (count($videos)) { ?>
    <div class="video">
        <?php if ($show_widget_title) { ?>
            <div class="title-right">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
        <div class="cont clearfix">
            <?php
            foreach ($videos as $video) {
                ?>
                <iframe width="300" height="268"  frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                </iframe>
            <?php } ?>
        </div>
    </div>
<?php } ?>