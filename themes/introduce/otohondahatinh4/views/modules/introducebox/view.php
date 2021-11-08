<?php if ($data['title']) { ?>
    <div class="title">  
        <h3><a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title'] ?>"><?php echo $data['title'] ?></a> </h3>
    </div>
<?php } ?>
<div class="body">
    <?php echo nl2br($data['sortdesc']); ?>
</div>
