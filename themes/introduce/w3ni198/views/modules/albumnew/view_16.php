<?php if (count($albums)) { ?>
    <div class="box gallery clearfix">
        <?php if ($show_widget_title) { ?>
            <div class="box-title">
                <h2><?php echo $widget_title; ?></h2>
            </div>
        <?php } ?>
        <div class="list grid">
            <?php foreach ($albums as $album) { ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $album['link']; ?>" title="<?php echo $album['album_name']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's150_150/' . $album['avatar_name']; ?>"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>