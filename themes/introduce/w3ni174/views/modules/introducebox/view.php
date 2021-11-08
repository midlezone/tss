<div class="welcome">
    <div class="welcome-img">
        <a title="<?php echo $data['title']; ?>" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">
            <img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . $data['image_name'] ?>" alt="<?php echo $data['title'] ?>" />
        </a>
    </div>
    <div class="welcome-info">
        <p><?php echo nl2br($data['sortdesc']); ?></p>
    </div>
</div>
