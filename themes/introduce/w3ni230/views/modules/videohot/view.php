<?php
if (count($videos)) {
    $link1 = $videos['link'];
    ?>
    <div class="videoinhome">
        <div class="box-all-nd">
            <?php if ($show_widget_title) { ?>
                <div class="header-panel">
                    <a href="<?php echo $link; ?>">
                        <h3><?php echo $widget_title; ?></h3>
                    </a>
                </div>
            <?php } ?>
            <div class="box-nd">
                <div class="nd-nd">
                    <?php
                    foreach ($videos as $video) {
                        ?>
                        <iframe width="100%" height="100%" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                        </iframe>
                    <?php } ?>
                </div>
                <div class="title-box-ng">
                    <a><?php echo $video['video_title']; ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>