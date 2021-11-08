<?php $this->beginContent('//layouts/main'); ?>
<?php $this->renderPartial('//layouts/partial/promotion'); ?>
<div class="wrap">
    <div class="pagecontent">
        <?php echo $content; ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
</div>
<?php $this->endContent(); ?>