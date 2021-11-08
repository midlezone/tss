<?php if (count($albums)) { ?>
    <div class="album">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><a onclick="javascript:void(0)"><?php echo $widget_title ?></a></h2>
            </div>
        <?php } ?>
        <div class="cont">
            <div class="row">
                <?php foreach ($albums as $album) { ?>
                    <div class="col-xs-4">
                        <div class="box-img">
                            <a class="img" href="<?php echo $album['link']; ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's80_80/' . $album['avatar_name']; ?>" />
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>