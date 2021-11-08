<?php $this->beginContent('//layouts/main'); ?>
<?php $this->renderPartial('//layouts/partial/promotion'); ?>
<div class="wrap">
    <div class="pagecontent">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>