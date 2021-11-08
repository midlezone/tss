<?php if (count($news)) { ?>
<div class="customer-reviews">
    <?php if ($show_widget_title) { ?>
    <div class="title">
        <h2>
            <a href="<?php echo $category['link'] ?>"><?php echo $widget_title ?></a>
        </h2>
    </div>
    <?php } ?>
    <div class="cont">
        <?php foreach ($news as $ne) { ?>
        <div class="customer-details">
            <div class="box-img">
                <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's80_80/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                </a>
            </div>
            <div class="box-info">
                <div class="box-title">
                    <h3>
                        <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                            <?php echo $ne['news_title'] ?>
                        </a>
                    </h3>
                </div>
                <div class="box-info-cont">
                    <p><?php echo $ne['news_sortdesc'] ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
