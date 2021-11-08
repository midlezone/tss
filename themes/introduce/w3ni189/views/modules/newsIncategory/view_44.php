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
                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's130_0/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
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
<div class="view-all">
    <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo Yii::t('common', 'viewall') ?>...</a>
</div>