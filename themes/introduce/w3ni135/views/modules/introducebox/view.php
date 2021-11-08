<div class="introducebox">
    <?php if ($show_widget_title) { ?>
        <div class="title-main">
            <h3><?php echo $widget_title; ?></h3>
        </div>
    <?php } ?>    
    <div class="introduce-info">
        <?php $hasImage = ($data['image_path'] && $data['image_name']) ? true : false; ?>
        <?php if ($hasImage) { ?>            
            <img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . 's150_150/' . $data['image_name']; ?>">
        <?php } ?>
        <p class="introduce-content">
            <?php echo $data['sortdesc']; ?>
            <a class="viewmore" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">
                <?php echo Yii::t('common', 'viewmore'); ?>
            </a>
        </p>
    </div>
</div>