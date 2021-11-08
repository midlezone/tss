<a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title']; ?>" class="img-introduce">
    <img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . $data['image_name']; ?>">
</a>
<div class="content-introduce">
    <h2>
        <a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>"><?php echo $data['title']; ?></a>
    </h2>
    <p class="sort-desc"><?php echo $data['sortdesc']; ?></p>
    <a class="view_more" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">
        <?php echo Yii::t('common', 'viewmore'); ?>
    </a>
</div>
