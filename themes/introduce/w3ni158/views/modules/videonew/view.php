<?php if (count($videos)) { ?>
    <div class="box-right">
        <div class="panel panel-default menu-vertical">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <div class="title-main">
                        <a href="<?php echo $link; ?>"><h3><?php echo $widget_title; ?></h3></a>
                    </div>
                </div>
            <?php } ?>
            <div class="panel-body">
                <?php
                $first = ClaArray::getFirst($videos);
                $videos = ClaArray::removeFirstElement($videos);
                ?>
                <a class="img" href="<?php echo $first['link']; ?>">
                    <div class="videos">
                        <iframe width="100%" height="100%" frameborder="0" src="<?php echo $first['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                        </iframe>
                    </div>
                    <p><?php echo $first['video_title']; ?></p>
                </a>
                <?php if (count($videos)) { ?>
                    <ul>
                        <?php foreach ($videos as $video) { ?>
                            <li><a href="<?php echo $video['link']; ?>"><?php echo $video['video_title']; ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>