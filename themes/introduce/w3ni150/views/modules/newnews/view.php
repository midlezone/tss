<div class="all-box-news">
    <div class="main-list">
        <div class="border-list clearfix">
            <h2>
                <?php if ($show_widget_title) { ?>
                    <span class="title-list-list">
                        <?php echo $widget_title; ?>
                    </span>
                <?php } ?>
                <span class="more-a">
                    <a href="<?php echo Yii::app()->createUrl('/news/news'); ?>">
                        <?php echo Yii::t('common', 'viewall'); ?>
                    </a>
                </span>
            </h2>
        </div><!--end-border-list-->
        <hr>
    </div>
    <div class="list">
        <?php foreach ($news as $ne) { ?>
            <div class="list-item">
                <div class="list-content">
                    <div class="list-content-box">
                        <?php if ($ne['image_path'] && $ne['image_name']) { ?>
                            <div class="list-content-img">
                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name']; ?>" alt="<?php echo $ne['news_title']; ?>" />
                                </a>
                            </div>
                        <?php } ?>
                        <div class="list-content-body">
                            <span class="list-content-title">
                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                    <?php echo $ne['news_title']; ?>
                                </a>
                            </span>
                            <div class="list-content-detail">
                                <p>
                                    <?php
                                    echo $ne['news_sortdesc'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>