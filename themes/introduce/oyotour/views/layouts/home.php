
<?php $this->beginContent('//layouts/main'); ?>
<?php
echo $content;
?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>

<?php $this->endContent(); ?>