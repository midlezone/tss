<?php if (count($news)) { ?>
    <div class="box-right list-jobs">
        <div class="panel panel-default menu-vertical">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <div class="title-main">
                        <a href="<?php echo $category['link']; ?>"><h3><?php echo $widget_title; ?></h3></a>
                    </div>
                </div>
            <?php } ?>
            <div class="panel-body">
                <ul class="list-nd-box-nd">
                    <?php foreach ($news as $ne) { ?>
                        <li>
                            <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                <?php echo $ne['news_title']; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>