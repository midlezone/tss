<?php $this->beginContent('//layouts/main'); ?>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>



<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>


<?php
echo $content;
?>
<?php $this->endContent(); ?>