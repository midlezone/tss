<?php $link = Yii::app()->createUrl('/site/site/introduce'); ?>
<div class="welcome">
    <div class="title-w">
        <a href="<?php echo $link; ?>" title="<?php echo $widget_title; ?>">
            <?php echo $widget_title; ?>
        </a>
    </div>
    <div class="content-w ">
        <div class="img-content-w">
            <img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . 's200_200/' . $data['image_name']; ?>">
        </div>
        <div class="content-w-nd">
            <?php echo $data['sortdesc']; ?>
        </div>
        <div class="more-w">
            <a href="<?php echo $link; ?>"><i><?php echo Yii::t('common', 'viewmore'); ?></i></a>
        </div>
    </div>
</div>