<?php if ($news) { ?>
    <div class = "need">
        <?php if ($show_widget_title) {
            ?>
            <div class="title-bt">
                <span>
                    <?php echo $widget_title ?>
                </span>
            </div>
            <div class="cont">
                <ul>
                    <?php foreach ($news as $ne) { ?>
                        <li>
                            <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                <?php echo $ne['news_title'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>                                
            </div>
        <?php }
        ?>
    </div>
    <?php
}
?>

