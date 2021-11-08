<?php if (count($images)) { ?>
    <div class="box gallery clearfix">
        <?php if ($show_widget_title) { ?>
            <div class="box-title">
                <h2><?php echo $widget_title; ?></h2>
            </div>
        <?php } ?>
        <div class="list grid">
            <?php foreach ($images as $image) { ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo Yii::app()->createUrl('/media/album/detail', array('id' => $image['album_id'])); ?>">
                                    <img alt="<?php echo $image['name'] ?>" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's150_150/' . $image['name']; ?>"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>    
    </div>
<?php } ?>
