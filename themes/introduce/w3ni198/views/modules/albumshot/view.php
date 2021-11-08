<?php if (count($albums)) { ?>
    <div class="album-anh" style="">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <?php echo $widget_title; ?>
                </h2>
            </div>
        <?php } ?>
        <div class="cont row">
            <?php foreach ($albums as $album) { ?>
                <div class="col-xs-6 album-item" >
                    <div class="box-all-nd">
                        <div class="header-panel">
                            <a title="Tin tức &amp; Sự kiện" href="<?php echo $album['link']; ?>" class="head-title">
                                <h3><?php echo $album['album_name']; ?> </h3>
                            </a>
                        </div>
                        <div class="box-nd">
                            <div class="nd-nd">	
                                <div class="img-box-nd">
                                    <div class="img-box">
                                        <a title="<?php echo $album['album_name']; ?> " href="<?php echo $album['link']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's280_280/' . $album['avatar_name']; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="title-box-ng">
                                    <a class="font-tahoma" title="<?php echo $album['album_name']; ?> " href="<?php echo $album['link']; ?>">
                                        <?php echo $album['album_name']; ?>
                                    </a>
                                </div>
                            </div>	
                        </div><!--end-box-nd-->	
                    </div>
                </div>                
            <?php } ?>
        </div>
    </div>
<?php } ?>