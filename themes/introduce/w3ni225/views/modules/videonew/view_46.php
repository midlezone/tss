<?php if (count($videos)) { ?>
    <div class="video">
        <?php if($show_widget_title) { ?>
        <div class="title">
            <h2><a href="/video"><?php echo $widget_title ?></a></h2>
        </div>
        <?php } ?>
        <div class="cont">
            <?php
            foreach ($videos as $video) {
                ?>
                <iframe width="326" height="214" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                </iframe>
            <?php } ?>
        </div>
    </div>
<?php } ?>