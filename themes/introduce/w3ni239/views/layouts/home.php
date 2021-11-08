
<?php $this->beginContent('//layouts/main'); ?>
<?php
echo $content;
?>
<div class="main-warper">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
</div>
<?php $this->endContent(); ?>