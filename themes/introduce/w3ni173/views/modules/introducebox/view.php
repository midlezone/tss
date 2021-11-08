<div class="box-title">
    <?php if ($data['title']) { ?>
    <div class="title"> 
        <a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title'] ?>"><?php echo $data['title'] ?></a> 
    </div>
    <?php } ?>
</div>
<div class="content-w ">
    <div class="content-w-nd">
        <p><?php echo nl2br($data['sortdesc']); ?></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-4"> </div>
</div>