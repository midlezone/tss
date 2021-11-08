<?php $this->beginContent('//layouts/main'); ?>
<?php $this->renderPartial('//layouts/partial/promotion'); ?>
<div class="container">
    <div id="content">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>