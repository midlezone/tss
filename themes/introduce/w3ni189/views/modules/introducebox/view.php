<div class="welcome well animated fadeOutDown"  data-sb="fadeInDown" data-sb-hide="fadeOutDown">
    <div class="container">
        <div class="title-w"> 
            <a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title'] ?>"><?php echo $data['title'] ?></a> 
        </div>
        <div class="content-w ">
            <div class="content-w-nd">
                <p><?php echo nl2br($data['sortdesc']); ?></p>
            </div>
            <div class="more-w"> 
                <a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title'] ?>">
                    <span><?php echo Yii::t('common', 'detail'); ?></span>
                </a> 
            </div>
        </div>
    </div>
</div>
