<?php if (count($news)) {
    ?>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <div class="bottom-center-main-left">
        <?php if ($show_widget_title) { ?>

            <div class="question">
                <a href="<?php echo $category['link']; ?>" title="#"> <img src="<?php echo $themUrl; ?>/css/img/aa.png" alt="#">Câu hỏi thường gặp</a>
            </div>
        <?php } ?>

        <div class="title-question">
            <ul>
                <?php foreach ($news as $new) { ?>
                    <li>
                        <img src="<?php echo $themUrl; ?>/css/img/-den.png" alt="#">
                        <a href="<?php echo $new['link']; ?>" title="<?php echo $new['news_title']; ?>">
                            <?php echo $new['news_title']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>