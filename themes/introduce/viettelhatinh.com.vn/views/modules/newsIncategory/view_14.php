<?php if (count($news)) { ?>

    <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h2>
                <a href="jvascript::void(0)">
                    <?php echo $widget_title; ?>
                </a>
            </h2>
        </div>
    <?php } ?>
    <div class="site-map-cont">
        <ul>
            <?php foreach ($news as $new) { ?>
                <li>
                    <a href="<?php echo $new['link'] ?>" title="<?php echo $new['news_title']; ?>">
                        <i class="icon-tt"></i> <?php echo $new['news_title']; ?>
                    </a>
                </li>  
            <?php } ?>
        </ul>
    </div>
<?php } ?>