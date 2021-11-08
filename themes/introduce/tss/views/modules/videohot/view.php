<?php if (count($videos)) { ?>
    <div class="box">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <?php echo $widget_title; ?>
                </h2>
            </div>
        <?php } ?>
        <div class="box-cont">
            <div class="videos">
                <?php
                foreach ($videos as $video) {
                    ?>
                    <iframe width="100%" height="100%" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                    </iframe>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>