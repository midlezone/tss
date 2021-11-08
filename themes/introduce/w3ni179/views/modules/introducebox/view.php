<div class="box-title">
    <?php if ($data['title']) { ?>
        <h2><a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title'] ?>"><?php echo $data['title'] ?></a></h2> 
        <div class="line"></div>

    <?php } ?>
</div>
<div class="box-body">
    <div class="box-content"> 
        <p><?php echo nl2br($data['sortdesc']); ?></p>
    </div>
    <div class="introduce-button">
        <a href="<?php echo Yii::app()->createUrl('/economy/product'); ?>" class="box-btn">Xem toàn bộ các tour du lịch</a>
    </div>
</div>