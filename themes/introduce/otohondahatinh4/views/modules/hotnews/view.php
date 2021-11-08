<?php if (count($hotnews)) { ?>
<div class="tt-inferior">
    <div class="box tt">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <div class="title-cont">
                    <h3>
                        <?php echo $widget_title; ?>
                    </h3>
                </div>
            </div>
        <?php } ?>
        <div class="tt-cont">
            <ul>
                <?php
                $i = 0;
                foreach ($hotnews as $ne) {
                    ?>
                    <li>
                        <a href="<?php echo $ne['link']; ?>" class="clearfix">
                            <span>
                                <?php echo $ne['news_title']; ?>
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php } ?>