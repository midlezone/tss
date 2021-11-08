<div class="title">
    <?php if ($data['title']) { ?>
        <h2><?php echo $data['title'] ?></h2> 

    <?php } ?>
</div>
<div class="line"></div>
<div class="cont">
    <div class="container ">
        <div class="about">
            <p><?php echo nl2br($data['sortdesc']); ?></p>
        </div>
    </div>
    <div class="ProductAction1 clearfix">
        <div class="ProductActionAdd1"> 
            <a href="<?php echo Yii::app()->createUrl('/economy/product'); ?>" class="a-btn-2-a" title="Xem toàn bộ các tour du lịch">
                <span class="a-btn-2-text-a">Xem toàn bộ các tour du lịch</span>
            </a>
        </div>
    </div>
</div>
