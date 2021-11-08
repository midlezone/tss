<div id="tt">
    <div id="boder-bot-tt">
        <p><?php echo $widget_title; ?></p>
    </div>
    <ul id="link">
        <?php
        foreach ($news as $ne) {
            ?>
            <li>
                <a href="<?php echo $ne['link']; ?>"><i class="icon-link"></i><?php echo $ne['news_title']; ?></a>
            </li>
        <?php } ?>
    </ul>
    <div id="next-link">
        <a href="<?php echo Yii::app()->createUrl('/news/news'); ?>"> Xem tất Cả...</a>
    </div>
</div> <!--end-tt-->