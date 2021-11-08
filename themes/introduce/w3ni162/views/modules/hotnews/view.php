<?php if (count($hotnews)) { ?>
    <div class="center-main-center">
        <?php if ($show_widget_title) { ?>
            <span><?php echo $widget_title; ?></span>
        <?php } ?>
        <div class="main-center">
            <div class="post-main-center">
                <?php foreach ($hotnews as $news) { ?>
                    <div class="post-main">
                        <div class="main-post-main">
                            <a class="nimg" href="<?php echo $news['link']; ?>">
                                <img src="<?php echo ClaHost::getImageHost().$news['image_path'].'s250_250/'.$news['image_name'];?>">
                            </a>

                            <p class="ntitle">
                                <a href="<?php echo $news['link']; ?>">
                                    <?php echo $news['news_title']; ?>
                                </a>
                            </p>
                            <p class="nsordes">
                                <?php echo $news['news_sortdesc']; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div><!--end-main-center-->
    </div>
<?php } ?>