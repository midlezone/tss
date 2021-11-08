<?php if (count($jobs)) { ?>
    <div class="col-xs-4">
        <div class="box-all-nd">
            <?php if ($show_widget_title) { ?>
                <div class="header-panel">
                    <a class="head-title" href="<?php echo Yii::app()->createUrl('/work/job'); ?>">
                        <h3><?php echo $widget_title; ?></h3>
                    </a>
                </div>
            <?php } ?>
            <?php foreach ($jobs as $job) { ?>
                <div class="box-nd">
                    <div class="nd-nd">	
                        <?php if ($job['image_path'] && $job['image_name']) { ?>
                            <div class="img-box-nd">
                                <div class="img-box">
                                    <a href="<?php echo $job['link']; ?>" title="<?php echo $job['position']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $job['image_path'] . 's280_280/' . $job['image_name']; ?>" alt="<?php echo $job['news_title']; ?>" />
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <p>
                            <a href="<?php echo $job['link']; ?>" title="<?php echo $job['position']; ?>">
                                <?php echo $job['position']; ?>
                            </a>
                        </p>
                    </div>
                </div><!--end-box-nd-->	
            <?php } ?>
        </div>
    </div>
<?php } 