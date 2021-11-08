<?php if (count($news)) { ?>
    <div class="box tt">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <div class="title-cont">
                    <h2>
                        <?php echo $widget_title; ?>
                    </h2>
                </div>
            </div>
        <?php } ?>
        <div class="tt-cont">
            <ul>
                <?php
                $i = 0;
                foreach ($news as $ne) {
                    ?>
                    <li>
                        <a href="<?php echo $ne['link']; ?>" class="clearfix">
                            <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" />
                            <span>
                                <?php echo $ne['news_title']; ?>
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>